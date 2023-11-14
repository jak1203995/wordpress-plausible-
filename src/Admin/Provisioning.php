<?php
/**
 * Plausible Analytics | Provisioning.
 * @since      2.0.0
 * @package    WordPress
 * @subpackage Plausible Analytics
 */

namespace Plausible\Analytics\WP\Admin;

use Plausible\Analytics\WP\Client;

class Provisioning {
	/**
	 * @var Client $client
	 */
	private $client;

	/**
	 * @var string[] $custom_event_goals
	 */
	private $custom_event_goals = [
		'404'            => '404',
		'outbound-links' => 'Outbound Link: Click',
		'file-downloads' => 'File Download',
	];

	/**
	 * Build class.
	 */
	public function __construct() {
		$this->client = new Client();

		$this->init();
	}

	/**
	 * Action & filter hooks.
	 * @return void
	 */
	private function init() {
		add_action( 'update_option_plausible_analytics_settings', [ $this, 'create_shared_link' ], 10, 2 );
		add_action( 'update_option_plausible_analytics_settings', [ $this, 'create_goals' ], 10, 2 );
		add_action( 'update_option_plausible_analytics_settings', [ $this, 'maybe_delete_goals' ], 11, 2 );
	}

	/**
	 * Create shared link when Enable Analytics Dashboard option is enabled.
	 *
	 * @param $old_settings
	 * @param $settings
	 *
	 * @return void
	 */
	public function create_shared_link( $old_settings, $settings ) {
		if ( empty( $settings['enable_analytics_dashboard'][0] ) ) {
			return;
		}

		$this->client->create_shared_link();
	}

	/**
	 * Create Custom Event Goals for enabled Enhanced Measurements.
	 *
	 * @param $old_settings
	 * @param $settings
	 *
	 * @return void
	 */
	public function create_goals( $old_settings, $settings ) {
		$enhanced_measurements = array_filter( $settings['enhanced_measurements'] );

		if ( empty( $enhanced_measurements ) ) {
			return;
		}

		$custom_event_keys = array_keys( $this->custom_event_goals );
		$create_request    = new Client\Model\GoalCreateRequestBulkGetOrCreate();
		$goals             = [];

		foreach ( $enhanced_measurements as $measurement ) {
			if ( ! in_array( $measurement, $custom_event_keys ) ) {
				continue;
			}

			$goals[] = new Client\Model\GoalCreateRequestCustomEvent(
				[
					'goal'      => [
						'event_name' => $this->custom_event_goals[ $measurement ],
					],
					'goal_type' => 'Goal.CustomEvent',
				]
			);
		}

		$create_request->setGoals( $goals );
		$response = $this->client->create_goals( $create_request );

		if ( $response->valid() ) {
			$goals = $response->getGoals();
			$ids   = [];

			foreach ( $goals as $goal ) {
				$goal                  = $goal->getGoal();
				$ids[ $goal->getId() ] = $goal->getDisplayName();
			}

			if ( ! empty( $ids ) ) {
				update_option( 'plausible_analytics_enhanced_measurements_goal_ids', $ids );
			}
		}
	}

	/**
	 * Delete Custom Event Goals when an Enhanced Measurement is disabled.
	 *
	 * @param $old_settings
	 * @param $settings
	 *
	 * @return void
	 */
	public function maybe_delete_goals( $old_settings, $settings ) {
		$enhanced_measurements_old = array_filter( $old_settings['enhanced_measurements'] );
		$enhanced_measurements     = array_filter( $settings['enhanced_measurements'] );
		$disabled_settings         = array_diff( $enhanced_measurements_old, $enhanced_measurements );

		if ( empty( $disabled_settings ) ) {
			return;
		}

		$goals = get_option( 'plausible_analytics_enhanced_measurements_goal_ids', [] );

		foreach ( $goals as $id => $name ) {
			$key = array_search( $name, $this->custom_event_goals );

			if ( ! in_array( $key, $disabled_settings ) ) {
				continue;
			}

			$this->client->delete_goal( $id() );
		}
	}
}

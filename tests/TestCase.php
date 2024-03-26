<?php

namespace Plausible\Analytics\Tests;

use Yoast\WPTestUtils\BrainMonkey\TestCase as YoastTestCase;

class TestCase extends YoastTestCase {
	public function __construct() {
		/**
		 * During local unit testing this constant is required.
		 */
		if ( ! defined( 'ABSPATH' ) ) {
			define( 'ABSPATH', true );
		}

		/**
		 * Required for loading assets.
		 */
		if ( ! defined( 'PLAUSIBLE_TESTS_ROOT' ) ) {
			define( 'PLAUSIBLE_TESTS_ROOT', __DIR__ . '/' );
		}

		parent::__construct();
	}

	/**
	 * Enable the proxy.
	 *
	 * @param $settings
	 *
	 * @return mixed
	 */
	public function enableProxy( $settings ) {
		$settings[ 'proxy_enabled' ] = 'on';

		return $settings;
	}

	/**
	 * Set domain_name option.
	 *
	 * @param $settings
	 *
	 * @return mixed
	 */
	public function setDomain( $settings ) {
		$settings[ 'domain_name' ] = 'test.dev';

		return $settings;
	}
}

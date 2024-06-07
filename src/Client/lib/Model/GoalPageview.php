<?php
/**
 * GoalPageview
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  Plausible\Analytics\WP\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Plausible Plugins API
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * The version of the OpenAPI document: 1.0-rc
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 7.0.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Plausible\Analytics\WP\Client\Model;

use \ArrayAccess;
use \Plausible\Analytics\WP\Client\ObjectSerializer;

/**
 * GoalPageview Class Doc Comment
 *
 * @category    Class
 * @description Pageview Goal object
 * @package     Plausible\Analytics\WP\Client
 * @author      OpenAPI Generator team
 * @link        https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class GoalPageview implements ModelInterface, ArrayAccess, \JsonSerializable {
	public const DISCRIMINATOR = null;

	/**
	 * The original name of the model.
	 *
	 * @var string
	 */
	protected static $openAPIModelName = 'Goal.Pageview';

	/**
	 * Array of property to type mappings. Used for (de)serialization
	 *
	 * @var string[]
	 */
	protected static $openAPITypes = [
		'goal_type' => 'string',
		'goal'      => '\Plausible\Analytics\WP\Client\Model\GoalPageviewAllOfGoal',
	];

	/**
	 * Array of property to format mappings. Used for (de)serialization
	 *
	 * @var string[]
	 * @phpstan-var array<string, string|null>
	 * @psalm-var array<string, string|null>
	 */
	protected static $openAPIFormats = [
		'goal_type' => null,
		'goal'      => null,
	];

	/**
	 * Array of nullable properties. Used for (de)serialization
	 *
	 * @var boolean[]
	 */
	protected static array $openAPINullables = [
		'goal_type' => false,
		'goal'      => false,
	];

	/**
	 * Array of attributes where the key is the local name,
	 * and the value is the original name
	 *
	 * @var string[]
	 */
	protected static $attributeMap = [
		'goal_type' => 'goal_type',
		'goal'      => 'goal',
	];

	/**
	 * Array of attributes to setter functions (for deserialization of responses)
	 *
	 * @var string[]
	 */
	protected static $setters = [
		'goal_type' => 'setGoalType',
		'goal'      => 'setGoal',
	];

	/**
	 * Array of attributes to getter functions (for serialization of requests)
	 *
	 * @var string[]
	 */
	protected static $getters = [
		'goal_type' => 'getGoalType',
		'goal'      => 'getGoal',
	];

	/**
	 * If a nullable field gets set to null, insert it here
	 *
	 * @var boolean[]
	 */
	protected array $openAPINullablesSetToNull = [];

	/**
	 * Associative array for storing property values
	 *
	 * @var mixed[]
	 */
	protected $container = [];

	/**
	 * Constructor
	 *
	 * @param mixed[] $data Associated array of property values
	 *                      initializing the model
	 */
	public function __construct( array $data = null ) {
		$this->setIfExists( 'goal_type', $data ?? [], null );
		$this->setIfExists( 'goal', $data ?? [], null );
	}

	/**
	 * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
	 * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
	 * $this->openAPINullablesSetToNull array
	 *
	 * @param string $variableName
	 * @param array  $fields
	 * @param mixed  $defaultValue
	 */
	private function setIfExists( string $variableName, array $fields, $defaultValue ): void {
		if ( self::isNullable( $variableName ) && array_key_exists( $variableName, $fields ) && is_null( $fields[ $variableName ] ) ) {
			$this->openAPINullablesSetToNull[] = $variableName;
		}

		$this->container[ $variableName ] = $fields[ $variableName ] ?? $defaultValue;
	}

	/**
	 * Checks if a property is nullable
	 *
	 * @param string $property
	 *
	 * @return bool
	 */
	public static function isNullable( string $property ): bool {
		return self::openAPINullables()[ $property ] ?? false;
	}

	/**
	 * Array of nullable properties
	 *
	 * @return array
	 */
	protected static function openAPINullables(): array {
		return self::$openAPINullables;
	}

	/**
	 * Array of property to type mappings. Used for (de)serialization
	 *
	 * @return array
	 */
	public static function openAPITypes() {
		return self::$openAPITypes;
	}

	/**
	 * Array of property to format mappings. Used for (de)serialization
	 *
	 * @return array
	 */
	public static function openAPIFormats() {
		return self::$openAPIFormats;
	}

	/**
	 * Array of attributes where the key is the local name,
	 * and the value is the original name
	 *
	 * @return array
	 */
	public static function attributeMap() {
		return self::$attributeMap;
	}

	/**
	 * Array of attributes to setter functions (for deserialization of responses)
	 *
	 * @return array
	 */
	public static function setters() {
		return self::$setters;
	}

	/**
	 * Array of attributes to getter functions (for serialization of requests)
	 *
	 * @return array
	 */
	public static function getters() {
		return self::$getters;
	}

	/**
	 * Checks if a nullable property is set to null.
	 *
	 * @param string $property
	 *
	 * @return bool
	 */
	public function isNullableSetToNull( string $property ): bool {
		return in_array( $property, $this->getOpenAPINullablesSetToNull(), true );
	}

	/**
	 * Array of nullable field names deliberately set to null
	 *
	 * @return boolean[]
	 */
	private function getOpenAPINullablesSetToNull(): array {
		return $this->openAPINullablesSetToNull;
	}

	/**
	 * The original name of the model.
	 *
	 * @return string
	 */
	public function getModelName() {
		return self::$openAPIModelName;
	}

	/**
	 * Validate all the properties in the model
	 * return true if all passed
	 *
	 * @return bool True if all properties are valid
	 */
	public function valid() {
		return count( $this->listInvalidProperties() ) === 0;
	}

	/**
	 * Show all the invalid properties with reasons.
	 *
	 * @return array invalid properties with reasons
	 */
	public function listInvalidProperties() {
		$invalidProperties = [];

		if ( $this->container[ 'goal_type' ] === null ) {
			$invalidProperties[] = "'goal_type' can't be null";
		}
		if ( $this->container[ 'goal' ] === null ) {
			$invalidProperties[] = "'goal' can't be null";
		}

		return $invalidProperties;
	}

	/**
	 * Gets goal_type
	 *
	 * @return string
	 */
	public function getGoalType() {
		return $this->container[ 'goal_type' ];
	}

	/**
	 * Sets goal_type
	 *
	 * @param string $goal_type goal_type
	 *
	 * @return self
	 */
	public function setGoalType( $goal_type ) {
		if ( is_null( $goal_type ) ) {
			throw new \InvalidArgumentException( 'non-nullable goal_type cannot be null' );
		}
		$this->container[ 'goal_type' ] = $goal_type;

		return $this;
	}

	/**
	 * Gets goal
	 *
	 * @return \Plausible\Analytics\WP\Client\Model\GoalPageviewAllOfGoal
	 */
	public function getGoal() {
		return $this->container[ 'goal' ];
	}

	/**
	 * Sets goal
	 *
	 * @param \Plausible\Analytics\WP\Client\Model\GoalPageviewAllOfGoal $goal goal
	 *
	 * @return self
	 */
	public function setGoal( $goal ) {
		if ( is_null( $goal ) ) {
			throw new \InvalidArgumentException( 'non-nullable goal cannot be null' );
		}
		$this->container[ 'goal' ] = $goal;

		return $this;
	}

	/**
	 * Returns true if offset exists. False otherwise.
	 *
	 * @param integer $offset Offset
	 *
	 * @return boolean
	 */
	public function offsetExists( $offset ): bool {
		return isset( $this->container[ $offset ] );
	}

	/**
	 * Gets offset.
	 *
	 * @param integer $offset Offset
	 *
	 * @return mixed|null
	 */
	#[\ReturnTypeWillChange]
	public function offsetGet( $offset ) {
		return $this->container[ $offset ] ?? null;
	}

	/**
	 * Sets value based on offset.
	 *
	 * @param int|null $offset Offset
	 * @param mixed    $value  Value to be set
	 *
	 * @return void
	 */
	public function offsetSet( $offset, $value ): void {
		if ( is_null( $offset ) ) {
			$this->container[] = $value;
		} else {
			$this->container[ $offset ] = $value;
		}
	}

	/**
	 * Unsets offset.
	 *
	 * @param integer $offset Offset
	 *
	 * @return void
	 */
	public function offsetUnset( $offset ): void {
		unset( $this->container[ $offset ] );
	}

	/**
	 * Serializes the object to a value that can be serialized natively by json_encode().
	 *
	 * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
	 *
	 * @return mixed Returns data which can be serialized by json_encode(), which is a value
	 * of any type other than a resource.
	 */
	#[\ReturnTypeWillChange]
	public function jsonSerialize() {
		return ObjectSerializer::sanitizeForSerialization( $this );
	}

	/**
	 * Gets the string presentation of the object
	 *
	 * @return string
	 */
	public function __toString() {
		return json_encode(
			ObjectSerializer::sanitizeForSerialization( $this ),
			JSON_PRETTY_PRINT
		);
	}

	/**
	 * Gets a header-safe presentation of the object
	 *
	 * @return string
	 */
	public function toHeaderValue() {
		return json_encode( ObjectSerializer::sanitizeForSerialization( $this ) );
	}

	/**
	 * Setter - Array of nullable field names deliberately set to null
	 *
	 * @param boolean[] $openAPINullablesSetToNull
	 */
	private function setOpenAPINullablesSetToNull( array $openAPINullablesSetToNull ): void {
		$this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
	}
}



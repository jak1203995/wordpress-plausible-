<?php
/**
 * PaginationMetadata
 * PHP version 7.4
 * @category Class
 * @package  Plausible\Analytics\WP\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Plausible Plugins API
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
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
 * PaginationMetadata Class Doc Comment
 * @category    Class
 * @description Pagination meta data
 * @package     Plausible\Analytics\WP\Client
 * @author      OpenAPI Generator team
 * @link        https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaginationMetadata implements ModelInterface, ArrayAccess, \JsonSerializable {
	public const DISCRIMINATOR = null;

	/**
	 * The original name of the model.
	 * @var string
	 */
	protected static $openAPIModelName = 'PaginationMetadata';

	/**
	 * Array of property to type mappings. Used for (de)serialization
	 * @var string[]
	 */
	protected static $openAPITypes = [
		'has_next_page' => 'bool',
		'has_prev_page' => 'bool',
		'links'         => '\Plausible\Analytics\WP\Client\Model\Link[]',
	];

	/**
	 * Array of property to format mappings. Used for (de)serialization
	 * @var string[]
	 * @phpstan-var array<string, string|null>
	 * @psalm-var array<string, string|null>
	 */
	protected static $openAPIFormats = [
		'has_next_page' => null,
		'has_prev_page' => null,
		'links'         => null,
	];

	/**
	 * Array of nullable properties. Used for (de)serialization
	 * @var boolean[]
	 */
	protected static array $openAPINullables = [
		'has_next_page' => false,
		'has_prev_page' => false,
		'links'         => false,
	];

	/**
	 * Array of attributes where the key is the local name,
	 * and the value is the original name
	 * @var string[]
	 */
	protected static $attributeMap = [
		'has_next_page' => 'has_next_page',
		'has_prev_page' => 'has_prev_page',
		'links'         => 'links',
	];

	/**
	 * Array of attributes to setter functions (for deserialization of responses)
	 * @var string[]
	 */
	protected static $setters = [
		'has_next_page' => 'setHasNextPage',
		'has_prev_page' => 'setHasPrevPage',
		'links'         => 'setLinks',
	];

	/**
	 * Array of attributes to getter functions (for serialization of requests)
	 * @var string[]
	 */
	protected static $getters = [
		'has_next_page' => 'getHasNextPage',
		'has_prev_page' => 'getHasPrevPage',
		'links'         => 'getLinks',
	];

	/**
	 * If a nullable field gets set to null, insert it here
	 * @var boolean[]
	 */
	protected array $openAPINullablesSetToNull = [];

	/**
	 * Associative array for storing property values
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
		$this->setIfExists( 'has_next_page', $data ?? [], null );
		$this->setIfExists( 'has_prev_page', $data ?? [], null );
		$this->setIfExists( 'links', $data ?? [], null );
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
	 * @return array
	 */
	protected static function openAPINullables(): array {
		return self::$openAPINullables;
	}

	/**
	 * Array of property to type mappings. Used for (de)serialization
	 * @return array
	 */
	public static function openAPITypes() {
		return self::$openAPITypes;
	}

	/**
	 * Array of property to format mappings. Used for (de)serialization
	 * @return array
	 */
	public static function openAPIFormats() {
		return self::$openAPIFormats;
	}

	/**
	 * Array of attributes where the key is the local name,
	 * and the value is the original name
	 * @return array
	 */
	public static function attributeMap() {
		return self::$attributeMap;
	}

	/**
	 * Array of attributes to setter functions (for deserialization of responses)
	 * @return array
	 */
	public static function setters() {
		return self::$setters;
	}

	/**
	 * Array of attributes to getter functions (for serialization of requests)
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
	 * @return boolean[]
	 */
	private function getOpenAPINullablesSetToNull(): array {
		return $this->openAPINullablesSetToNull;
	}

	/**
	 * The original name of the model.
	 * @return string
	 */
	public function getModelName() {
		return self::$openAPIModelName;
	}

	/**
	 * Validate all the properties in the model
	 * return true if all passed
	 * @return bool True if all properties are valid
	 */
	public function valid() {
		return count( $this->listInvalidProperties() ) === 0;
	}

	/**
	 * Show all the invalid properties with reasons.
	 * @return array invalid properties with reasons
	 */
	public function listInvalidProperties() {
		$invalidProperties = [];

		if ( $this->container['has_next_page'] === null ) {
			$invalidProperties[] = "'has_next_page' can't be null";
		}
		if ( $this->container['has_prev_page'] === null ) {
			$invalidProperties[] = "'has_prev_page' can't be null";
		}

		return $invalidProperties;
	}

	/**
	 * Gets has_next_page
	 * @return bool
	 */
	public function getHasNextPage() {
		return $this->container['has_next_page'];
	}

	/**
	 * Sets has_next_page
	 *
	 * @param bool $has_next_page has_next_page
	 *
	 * @return self
	 */
	public function setHasNextPage( $has_next_page ) {
		if ( is_null( $has_next_page ) ) {
			throw new \InvalidArgumentException( 'non-nullable has_next_page cannot be null' );
		}
		$this->container['has_next_page'] = $has_next_page;

		return $this;
	}

	/**
	 * Gets has_prev_page
	 * @return bool
	 */
	public function getHasPrevPage() {
		return $this->container['has_prev_page'];
	}

	/**
	 * Sets has_prev_page
	 *
	 * @param bool $has_prev_page has_prev_page
	 *
	 * @return self
	 */
	public function setHasPrevPage( $has_prev_page ) {
		if ( is_null( $has_prev_page ) ) {
			throw new \InvalidArgumentException( 'non-nullable has_prev_page cannot be null' );
		}
		$this->container['has_prev_page'] = $has_prev_page;

		return $this;
	}

	/**
	 * Gets links
	 * @return \Plausible\Analytics\WP\Client\Model\Link[]|null
	 */
	public function getLinks() {
		return $this->container['links'];
	}

	/**
	 * Sets links
	 *
	 * @param \Plausible\Analytics\WP\Client\Model\Link[]|null $links links
	 *
	 * @return self
	 */
	public function setLinks( $links ) {
		if ( is_null( $links ) ) {
			throw new \InvalidArgumentException( 'non-nullable links cannot be null' );
		}
		$this->container['links'] = $links;

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
	 * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
	 * @return mixed Returns data which can be serialized by json_encode(), which is a value
	 * of any type other than a resource.
	 */
	#[\ReturnTypeWillChange]
	public function jsonSerialize() {
		return ObjectSerializer::sanitizeForSerialization( $this );
	}

	/**
	 * Gets the string presentation of the object
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



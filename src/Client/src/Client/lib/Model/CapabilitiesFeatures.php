<?php
/**
 * CapabilitiesFeatures
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  PlausibleAnalyticsWPClient
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
 * OpenAPI Generator version: 7.3.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace PlausibleAnalyticsWPClient\Model;

use \ArrayAccess;
use \PlausibleAnalyticsWPClient\ObjectSerializer;

/**
 * CapabilitiesFeatures Class Doc Comment
 *
 * @category Class
 * @package  PlausibleAnalyticsWPClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CapabilitiesFeatures implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Capabilities_features';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'funnels' => 'bool',
        'goals' => 'bool',
        'props' => 'bool',
        'revenue_goals' => 'bool',
        'stats_api' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'funnels' => null,
        'goals' => null,
        'props' => null,
        'revenue_goals' => null,
        'stats_api' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'funnels' => false,
        'goals' => false,
        'props' => false,
        'revenue_goals' => false,
        'stats_api' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'funnels' => 'Funnels',
        'goals' => 'Goals',
        'props' => 'Props',
        'revenue_goals' => 'RevenueGoals',
        'stats_api' => 'StatsAPI'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'funnels' => 'setFunnels',
        'goals' => 'setGoals',
        'props' => 'setProps',
        'revenue_goals' => 'setRevenueGoals',
        'stats_api' => 'setStatsApi'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'funnels' => 'getFunnels',
        'goals' => 'getGoals',
        'props' => 'getProps',
        'revenue_goals' => 'getRevenueGoals',
        'stats_api' => 'getStatsApi'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


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
    public function __construct(array $data = null)
    {
        $this->setIfExists('funnels', $data ?? [], null);
        $this->setIfExists('goals', $data ?? [], null);
        $this->setIfExists('props', $data ?? [], null);
        $this->setIfExists('revenue_goals', $data ?? [], null);
        $this->setIfExists('stats_api', $data ?? [], null);
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
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['funnels'] === null) {
            $invalidProperties[] = "'funnels' can't be null";
        }
        if ($this->container['goals'] === null) {
            $invalidProperties[] = "'goals' can't be null";
        }
        if ($this->container['props'] === null) {
            $invalidProperties[] = "'props' can't be null";
        }
        if ($this->container['revenue_goals'] === null) {
            $invalidProperties[] = "'revenue_goals' can't be null";
        }
        if ($this->container['stats_api'] === null) {
            $invalidProperties[] = "'stats_api' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets funnels
     *
     * @return bool
     */
    public function getFunnels()
    {
        return $this->container['funnels'];
    }

    /**
     * Sets funnels
     *
     * @param bool $funnels funnels
     *
     * @return self
     */
    public function setFunnels($funnels)
    {
        if (is_null($funnels)) {
            throw new \InvalidArgumentException('non-nullable funnels cannot be null');
        }
        $this->container['funnels'] = $funnels;

        return $this;
    }

    /**
     * Gets goals
     *
     * @return bool
     */
    public function getGoals()
    {
        return $this->container['goals'];
    }

    /**
     * Sets goals
     *
     * @param bool $goals goals
     *
     * @return self
     */
    public function setGoals($goals)
    {
        if (is_null($goals)) {
            throw new \InvalidArgumentException('non-nullable goals cannot be null');
        }
        $this->container['goals'] = $goals;

        return $this;
    }

    /**
     * Gets props
     *
     * @return bool
     */
    public function getProps()
    {
        return $this->container['props'];
    }

    /**
     * Sets props
     *
     * @param bool $props props
     *
     * @return self
     */
    public function setProps($props)
    {
        if (is_null($props)) {
            throw new \InvalidArgumentException('non-nullable props cannot be null');
        }
        $this->container['props'] = $props;

        return $this;
    }

    /**
     * Gets revenue_goals
     *
     * @return bool
     */
    public function getRevenueGoals()
    {
        return $this->container['revenue_goals'];
    }

    /**
     * Sets revenue_goals
     *
     * @param bool $revenue_goals revenue_goals
     *
     * @return self
     */
    public function setRevenueGoals($revenue_goals)
    {
        if (is_null($revenue_goals)) {
            throw new \InvalidArgumentException('non-nullable revenue_goals cannot be null');
        }
        $this->container['revenue_goals'] = $revenue_goals;

        return $this;
    }

    /**
     * Gets stats_api
     *
     * @return bool
     */
    public function getStatsApi()
    {
        return $this->container['stats_api'];
    }

    /**
     * Sets stats_api
     *
     * @param bool $stats_api stats_api
     *
     * @return self
     */
    public function setStatsApi($stats_api)
    {
        if (is_null($stats_api)) {
            throw new \InvalidArgumentException('non-nullable stats_api cannot be null');
        }
        $this->container['stats_api'] = $stats_api;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}



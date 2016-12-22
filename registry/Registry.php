<?php

/**
 * Created by PhpStorm.
 * User: ksv
 * Date: 21.12.16
 * Time: 22:59
 */

namespace CatalogOfPhpPatterns;

/**
 * Class Registry
 * @package CatalogOfPhpPatterns
 */
class Registry
{
    /**
     * @var array
     */
    private static $instances = [];

    /**
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    public static function get($key, $default = null)
    {
        if (isset(self::$instances[$key])) {
            return self::$instances[$key];
        }

        return $default;
    }

    /**
     * @param $key
     * @param null $instance
     */
    public static function set($key, $instance = null)
    {
        self::$instances[$key] = $instance;
    }

    /**
     * @param $key
     */
    public static function erase($key)
    {
        unset(self::$instances[$key]);
    }
}
<?php
namespace App;
class Session
{
    const BASE_KEY = 'slim3session';

    /**
     * Session constructor.
     */
    function __construct()
    {
        if (!is_array($_SESSION[self::BASE_KEY])) {
            $_SESSION[self::BASE_KEY] = [];
        }
    }

    /**
     * @param $name
     * @param $default
     * @return mixed|null
     */
    function get($name, $default = null)
    {
        return isset($_SESSION[self::BASE_KEY][$name]) ? $_SESSION[self::BASE_KEY][$name] : $default;
    }

    /**
     * @param $name
     * @param $value
     */
    function set($name, $value)
    {
        $_SESSION[self::BASE_KEY][$name] = $value;
    }
}
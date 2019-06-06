<?php

namespace App;

class SessionManager
{
    public static function put (string $variable, $value)
    {
        $_SESSION[$variable] = serialize($value);
    }

    public static function get(string $variable)
    {
        return unserialize($_SESSION[$variable]);
    }

    public static function remove(string $variable)
    {
        unset($_SESSION[$variable]);
    }
}
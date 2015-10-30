<?php
namespace IMooc;

/**
* Register
*/
class Register
{
    protected static $objects;

    public static function set($alias, $objects)
    {
        self::$objects[$alias] = $objects;
    }

    public static function get($alias)
    {
        return self::$objects[$alias];
    }

    public static function _unset($alias)
    {
        unset(self::$objects[$alias]);
    }

}
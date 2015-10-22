<?php
namespace IMooc;

/**
* use
*/
class Test
{
    use Hello; // 使用trait特性

    public static function test()
    {
        echo __CLASS__;

        self::Hello();
    }
}
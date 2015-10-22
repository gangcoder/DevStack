<?php

/**
* A
*/
class A
{
    public static function who()
    {
        echo __CLASS__;
    }
    public static function test()
    {
        self:: who();
    }
}

/**
* B
*/
class B extends A
{
    public static function who()
    {
        echo __CLASS__;
    }
}

B::test();
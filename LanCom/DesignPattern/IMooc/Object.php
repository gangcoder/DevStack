<?php
namespace IMooc;
use App\Controller\Home\Index;
/**
* 
*/
class Object
{
    
    protected $array = array();

    public static function test()
    {
        echo "Object\n";
        Index::test();
    }

    function __set($key, $value)
    {
        var_dump(__METHOD__);
        $this->array[$key] = $value;
    }

    function __get($key)
    {
        return $this->array[$key];
    }

    function __call($func, $param)
    {
        var_dump($func, $param);
        return 'magic function\n';
    }

    public static function __callStatic($func, $param)
    {
        return 'static magic function';
    }

    function __toString()
    {
        return __CLASS__;
    }

    function __invoke()
    {
        return 'invoke';
    }
}
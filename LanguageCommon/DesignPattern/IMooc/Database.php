<?php
namespace IMooc;

interface IDatabase
{
    function connect($host, $user, $passwd, $dbname);
    function query($sql);
    function close();
}

/**
* 
*/
class Database
{
    protected static $db;

    private function __construct()
    {
        #code...
    }

    private function __clone(){}

    // 单例模式
    public static function getInstance()
    {
        if (self::$db instanceof Database) {
            return self::$db;
        } else {
            self::$db = new self();
            return self::$db;
        }
    }

    // 单例模式的另一种写法
    public static function get()
    {
        static $db = null;
        if ( $db == null ) $db = new Database();
        return $db;
    }
    
    public function where($where)
    {
        return $this;
    }

    public function order($order)
    {
        return $this;
    }

    public function limit($limit)
    {
        return $this;
    }

    public function __call($func, $param)
    {
        var_dump($func, $param);
        return "magic function\n";
    }

    public function __toString()
    {
        return __CLASS__;
    }
}
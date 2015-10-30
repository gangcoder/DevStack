<?php
namespace IMooc\Database;

use IMooc\Database\IDatabase;

/**
* mysql
*/
class MySQL implements IDatabase
{
    protected $conn;

    public static function test()
    {
        echo 'hello';
    }

    public function connect($host, $user, $passwd, $dbname)
    {
        $conn = mysql_connect($host, $user, $passwd);
        mysql_select_db($dbname, $conn);
        $this->conn = $conn;
    }

    public function query($sql)
    {
        $res = mysql_query($sql, $this->conn);
        return $res;
    }

    public function close()
    {
        mysql_close($this->conn);
    }

}
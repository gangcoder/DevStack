<?php
namespace IMooc\Databasee;

use use IMooc\Database\IDatabase;
/**
* MySQLi
*/
class MySQLi implements IDatabase
{
    protected $conn;

    public function connect($host, $user, $passwd, $dbname)
    {
        $conn = mysqli_connect($host, $user, $passwd, $dbname);
        $this->conn = $conn
    }

    public function query($sql)
    {
        return mysqli_query($this->conn, $sql);
    }

    public function close()
    {
        mysqli_close($this->conn);
    }
}
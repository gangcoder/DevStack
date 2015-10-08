<?php
/**
* mysqli
*/
class DBDrive
{
    private $_dbhandler;
    
    function __construct()
    {
        $dsn  = 'mysql:host=127.0.0.1;port=3306;dbname=my_db';
        $user = 'root';
        $pwd  = '123';
        try {
            $this->_dbhandler = new PDO($dsn, $user, $pwd, 
                [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
                PDO::ATTR_PERSISTENT => true]
            );
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insert($value, $str)
    {
        $sql = "insert into tbl1 (value, string) values(?, ?)";
        $stat = $this->_dbhandler->prepare($sql);
        $stat->execute([$value, $str]);

        if ($this->_dbhandler->errorCode() != '0000') {
            print_r($this->_dbhandler->errorInfo());
        }
    }
}
$db = new DBDrive();
$i = 1;
while ($i <= 100000) {
    $db->insert($i, (string)base_convert($i, 10, 26));
    $i++;
}
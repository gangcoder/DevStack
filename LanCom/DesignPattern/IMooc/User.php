<?php
namespace IMooc;

/**
* 将对象和数据存储映射起来，对一个对象的操作会映射到对数据存储的操作
*/
class User
{
    public $id;
    public $name;
    public $mobile;
    public $regtime;

    protected $db;

    function __construct(argument)
    {
        $this->db = new \IMooc\Database\MySQLi();
        $this->db->connect('127.0.0.1', 'root', 'root', 'test');
        $result = $this->db->query("select * from user limit 1");
        $data = $result->fetch_assoc();
        $this->id      = $data['id'];
        $this->name    = $data['name'];
        $this->mobile  = $data['mobile'];
        $this->regtime = $data['regtime'];
    }

    function __destruct()
    {
        $this->db-query("update user set
            name = `{$this->name}`,
            mobile = `{$this->mobile}`,
            regtime = `{$this->regtime}`
            where id = {$this->id} limit 1");
    }
}
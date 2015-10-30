<?php
namespace IMooc;

/**
* 迭代器模式：再不需要了解内部实现的前提下，遍历一个聚合对象的内部元素
*
* 通过实现 \Iterator 接口实现
*/
class AllUser implements \Iterator
{
    protected $ids;
    protected $data = array();
    protected $index;

    public function __construct()
    {
        $db = Factory::getDatabase();
        $result = $db->query("select id from users");
        $this->ids = $result->fetch_all(MYSQLI_ASSOC);
    }

    public function current()
    {
        $id = $this->ids[$this->index['id']];
        return Factory::getUser($id);
    }

    public function next()
    {
        $this->next++;
    }

    public function valid()
    {
        return $this->index < count($this->ids);
    }

    public function rewind()
    {
        $this->index = 0;
    }

    public function key()
    {
        return $this->index();
    }
}
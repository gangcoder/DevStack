<?php
namespace IMooc;

/**
* 在客户端与实体之间建立一个代理对象，客户端对实体进行操作全部委派给代理对象，隐藏实体的具体实现细节
*/
class Proxy implements IUserProxy
{
    public function getUserName($id)
    {
        $db = Factory::getDatabase('slave');
        $db->query("select name from user where id = $id limit 1");
    }

    public function setUserName($id, $name)
    {
        $db = Factory::getDatabase('master');
        $db->query("update user set name = $name where id = $id limit 1");
}
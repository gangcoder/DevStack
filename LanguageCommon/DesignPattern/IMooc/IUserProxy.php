<?php
namespace IMooc;

/**
* 在客户端与实体之间建立一个代理对象，客户端对实体进行操作全部委派给代理对象，隐藏实体的具体实现细节
*/
interface IUserProxy
{
    function getUserName($id);
    function setUserName($id, $name);
}
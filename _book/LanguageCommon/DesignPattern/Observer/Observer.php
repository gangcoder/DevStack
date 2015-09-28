<?php
//定义观察者行为
interface IObserver
{
    function onChanged( $sender, $args );
}
//可被观察的对象
interface IObservable
{
    function addObserver( $observer );
}
//实现可被观察对象
//负责维护关注列表，并发送消息
class UserList implements IObservable
{
    private $_observers = array();

    public function addCustomer( $name )
    {
        foreach( $this->_observers as $obs )
            $obs->onChanged( $this, $name );
    }

    public function addObserver( $observer )
    {
        $this->_observers []= $observer;
        }
    }
//实现一个观察者
class UserListLogger implements IObserver
{
    public function onChanged( $sender, $args )
    {
        echo( "'$args' added to user list\n" );
    }
}

$ul = new UserList();//观察者列表
$ul->addObserver( new UserListLogger() );//添加观察者至观察者列表
$ul->addCustomer( "Jack" );//添加用户，并将消息发送给观察者
?>

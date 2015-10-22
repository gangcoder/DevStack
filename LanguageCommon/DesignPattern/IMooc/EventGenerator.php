<?php
namespace IMooc;

// 观察者模式：当一个对象状态发生改变时，依赖它的对象全部会收到通知

abstract class EventGenerator
{
    private $observers = array();

    function addObserver(Observer $obsever){
        $this->observers[] = $observer;
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}
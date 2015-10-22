<?php

/**
* base
*/
class Base
{
    public function sayHello()
    {
        echo 'Hello';
    }
}

trait SayWorld {
    public function sayHello()
    {
        parent::sayHello();
        echo 'World';
    }
}

/**
* My
*/
class MyHelloWorld extends Base
{
    use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();
<?php

trait HelloWorld {
    public static function sayHello()
    {
        echo 'Hello World!';
    }
}

/**
* x
*/
class MyClass1
{
    use HelloWorld {sayHello as protected;}
}

/**
* x
*/
class MyClass2
{
    use HelloWorld {sayHello as private myPrivateHello;}

    public function say()
    {
        $this->myPrivateHello();
    }
}

/**
* x
*/
class MyClass3 extends MyClass1
{
    
    public static function say()
    {
        self::sayHello();
    }
}

MyClass3::say();

$myclass = new MyClass2();
$myclass->say();
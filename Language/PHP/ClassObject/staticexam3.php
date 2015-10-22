<?php

/**
* A
*/
class A
{
    private function foo()
    {
        echo "success!\n";
    }

    public function test()
    {
        $this->foo();
        static::foo();
    }
}

/**
* B
*/
class B extends A
{
}

/**
* C
*/
class C extends A
{
    private function foo()
    {
    }
}

$b = new B();
$b->test();
$c = new C();
$c->test();
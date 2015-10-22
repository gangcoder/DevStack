<?php

trait A {
    
    public function smallTalk()
    {
        echo 'a';
    }

    public function bigTalk()
    {
        echo 'A';
    }
}

trait B {

    public function smallTalk()
    {
        echo 'b';
    }

    public function bigTalk()
    {
        echo 'B';
    }
}

/**
* talk
*/
class Talk
{

    use A, B {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
    }

}

/**
* al
*/
class AliasedTalk
{

    use A, B{
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
        B::bigTalk as talk;
    }
}

$t = new Talk();
$t->smallTalk();
$t->bigTalk();

echo "\r\n";

$aT = new AliasedTalk();
$aT->smallTalk();
$aT->bigTalk();
$aT->talk();


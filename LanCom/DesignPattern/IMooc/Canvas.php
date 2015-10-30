<?php
namespace IMooc;

/**
* 原型模式与工厂模式类似，都是用来创建对象。与工厂模式不同，原型模式是先创建好原型对象，然后通过clone原型对象来创建新的对象。这样能免去类创建时重复的初始化操作。
*/
class Canvas
{
    public $data;
    protected $decorators = array();

    //Decorator
    function init($width = 20, $height = 10)
    {
        $data = array();
        for($i = 0; $i < $height; $i++)
        {
            for($j = 0; $j < $width; $j++)
            {
                $data[$i][$j] = '*';
            }
        }
        $this->data = $data;
    }

    function addDecorator(DrawDecorator $decorator)
    {
        $this->decorators[] = $decorator;
    }

    function beforeDraw()
    {
        foreach($this->decorators as $decorator)
        {
            $decorator->beforeDraw();
        }
    }

    function afterDraw()
    {
        $decorators = array_reverse($this->decorators);
        foreach($decorators as $decorator)
        {
            $decorator->afterDraw();
        }
    }

    function draw()
    {
        $this->beforeDraw();
        foreach($this->data as $line)
        {
            foreach($line as $char)
            {
                echo $char;
            }
            echo "<br />\n";
        }
        $this->afterDraw();
    }

    function rect($a1, $a2, $b1, $b2)
    {
        foreach($this->data as $k1 => $line)
        {
            if ($k1 < $a1 or $k1 > $a2) continue;
            foreach($line as $k2 => $char)
            {
                if ($k2 < $b1 or $k2 > $b2) continue;
                $this->data[$k1][$k2] = '&nbsp;';
            }
        }
    }
}


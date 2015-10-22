<?php
namespace IMooc;

/**
* Decorator
*/
class ColorDrawDecorator implements DrawDecorator
{
    protected $color;

    public function __construct($color = 'red')
    {
        $this->color = $color;
    }

    public function beforeDraw()
    {
        echo "<div style = 'color:{$this->color};'>";
    }

    public function afterDraw()
    {
        echo "</div>";
    }
}
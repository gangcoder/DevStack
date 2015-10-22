<?php
$fruits = array(
    "apple" => "yummy",
    "orange" => "ah ya, nice",
    "grape" => "wow, I love it!",
    "plum" => "nah, not me"
);
$obj = new ArrayIterator( $fruits );

foreach ($obj as $key => $value) {
    echo $value;
}

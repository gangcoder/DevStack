<?php

/*** a simple array ***/
$array = array('koala', 'kangaroo', 'wombat', 'wallaby', 'emu', 'kiwi', 'kookaburra', 'platypus');

/*** create the array object ***/
$arrayObj = new ArrayObject($array);

/*** iterate over the array ***/
foreach ($arrayObj as $key => $value) {
    echo $value, "\n";
}

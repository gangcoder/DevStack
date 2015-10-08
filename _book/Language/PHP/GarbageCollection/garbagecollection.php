<?php
// $a = 'new string';
// $b = $c = $a;
// xdebug_debug_zval('a');
// // a: (refcount=3, is_ref=0)='new string'
// unset($b, $c);
// xdebug_debug_zval('a');
// // a: (refcount=1, is_ref=0)='new string'
// $a  = array('meaning'=>'life', 'number'=>42);
// xdebug_debug_zval (  'a'  );

$a = array('one');
$a[] =& $a;
xdebug_debug_zval('a');

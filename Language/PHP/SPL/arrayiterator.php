<?php 
	$fruits = [
		'apple' => 'apple value',
		'orange' => 'orange value',
		'grange' => 'grange value',
		'plum' => 'plum value',
	];
	// print_r($fruits);

	
	// echo "*****use fruits*****";
	foreach ($fruits as $key => $value) {
		// echo $key.":".$value."\n";
	}

	// echo "*****use arrayiterator*****";
	$obj = new ArrayObject($fruits);
	$it = $obj->getIterator();
	var_dump($it);
	foreach ($it as $key => $value) {
		// echo $key.":".$value."\n";
	}
	$b = array('name'=>'mengzhi','age'=>'12','city'=>'shanghai');
	$a = new ArrayIterator($b);
	var_dump($a);
 ?>
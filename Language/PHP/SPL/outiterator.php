<?php 
	/**
	* outiter
	*/
	class outerIt extends IteratorIterator
	{
		public function current()
			{
				return parent::current()."_tail";
			}
		public function key()
			{
				return "pre:".parent::key();
			}	
	}

	$array = ['1','2','3','4','5'];
	$outerobj = new outerIt(new ArrayIterator($array));
	var_dump($outerobj);die();
	foreach ($outerobj as $key => $value) {
		echo $key,$value,"<br/>";
	}
 ?>
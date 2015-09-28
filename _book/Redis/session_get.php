<?php 
	require '../Predis/src/Autoloader.php';

	Predis\Autoloader::register();

	include("SessionManager.php");
	new SessionManager();
	echo $_SESSION['username'];
 ?>
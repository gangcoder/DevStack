<?php 
	require '../Predis/src/Autoloader.php';

	Predis\Autoloader::register();

	include("SessionManager.php");
	new SessionManager();

	$_SESSION['username'] = "xugang";

	echo "<a href = './session_get.php'>session</a>";
 ?>

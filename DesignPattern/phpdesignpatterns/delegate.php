<?php

require_once('classes.php');

$pkg = new Package("Heavy Package");
$pkg->setWeight(100);

$shipper = new ShippingDelegate();

if ($pkg->getWeight() > 99)
{
	$shipper->useRail();
}

$shipper->deliver($pkg);

?>
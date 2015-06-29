<?php

require('classes.php');

$auto = new Automobile();

$model = new BaseAutomobileModel();

$model = new SportAutomobileModel($model);

$model = new TouringAutomobileModel($model);

$auto->setModel($model);

$auto->printDescription();

?>
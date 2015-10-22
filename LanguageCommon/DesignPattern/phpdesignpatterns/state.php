<?php

interface RobotState
{
	public function powerUp();
	public function powerDown();
	public function turnIntoVehicle();
	public function turnIntoRobot();
}

class PoweredDownRobotState implements RobotState
{
	private $robot;

	public function __construct($robot)
	{
		$this->robot = $robot;
	}

	public function powerUp()
	{
		echo("Robot is powering up now!");
		$this->robot->setState(new PoweredUpRobotState($this->robot));
	}
	public function powerDown()  
	{
		echo("Already powered down now.");
	}
	
	public function turnIntoVehicle()  
	{
		echo("Can't turn into a vehicle if I'm powered down...");
	}
	
	public function turnIntoRobot() 
	{
		echo("Can't turn into a robot if I'm powered down...");
	}
}

class PoweredUpRobotState implements RobotState
{
	private $robot;

	public function __construct($robot)
	{
		$this->robot = $robot;
	}

	public function powerUp()
	{
		echo("I'm already powered up!");
	}
	public function powerDown()  
	{
		echo("Powering down now...");
		$robot->setState(new PoweredDownRobotState($this->robot));
	}
	public function turnIntoVehicle()  
	{
		
	}
	public function turnIntoRobot() 
	{
		echo("Robot mode coming up!... zzzh, crunk, whizz, snap, snap, foomp...");
		$this->robot->setState(new NormalRobotState($this->robot));	
	}
}

class VehicleRobotState implements RobotState
{
	private $robot;

	public function __construct($robot)
	{
		$this->robot = $robot;
	}

	public function powerUp()
	{
		echo("I'm already powered up!");
	}
	
	public function powerDown()  
	{
		echo("Powering down now...");
		$this->robot->setState(new PoweredDownRobotState($this->robot));
	}
	
	public function turnIntoVehicle()  
	{
		echo("I'm already a vehicle!");
	}
	
	public function turnIntoRobot() 
	{
		echo("Just a minute... zzzh, crunk, whizz, snap, snap, foomp...");
		$this->robot->setState(new NormalRobotState($this->robot));	
	}
}

class NormalRobotState implements RobotState
{
	private $robot;

	public function __construct($robot)
	{
		$this->robot = $robot;
	}

	public function powerUp()
	{
		echo("I'm already powered up!");
	}
	public function powerDown()
	{
		echo("Powering down now...");
		$this->robot->setState(new PoweredDownRobotState($this->robot));		
	}
	
	public function turnIntoVehicle()  
	{
		echo("Turning into vehicle now... chunk, whizz, whirr, zzzhh, snap.");
		$this->robot->setState(new VehicleRobotState($this->robot));
	}
	
	public function turnIntoRobot() 
	{
		echo("I'm already a robot!!");
	}
}

class Robot implements RobotState
{
	private $currentState;

	public function __construct()
	{
		$this->currentState = new PoweredDownRobotState($this);
	}

	public function setState($state)
	{
		$this->currentState = $state;
	}

	public function getState()
	{
		return $this->currentState;
	}

	public function powerUp()
	{
		$this->currentState->powerUp();
	}

	public function powerDown()
	{
		$this->currentState->powerDown();
	}

	public function turnIntoVehicle()
	{
		$this->currentState->turnIntoVehicle();
	}

	public function turnIntoRobot()
	{
		$this->currentState->turnIntoRobot();
	}
}

$robot = new Robot();
echo("\n");
$robot->powerUp();
echo("\n");
$robot->turnIntoRobot();
echo("\n");
$robot->turnIntoRobot(); /* This one will just give me a message */
echo("\n");
$robot->turnIntoVehicle();
echo("\n");

?>
<?php
class AddressDisplay
{
	private $addressType;
	private $addressText;

	public function setAddressType($addressType)
	{
		$this->addressType = $addressType;
	}

	public function getAddressType()
	{
		return $this->addressType;
	}

	public function setAddressText($addressText)
	{
		$this->addressText = $addressText;
	}

	public function getAddressText()
	{
		return $this->addressText;
	}
}

class EmailAddress
{
	private $emailAddress;
	
	public function getEmailAddress()
	{
		return $this->emailAddress;
	}
	
	public function setEmailAddress($address)
	{
		$this->emailAddress = $address;
	}
}

class PhysicalAddress
{
	private $streetAddress;
	private $city;
	private $state;
	private $postalCode;
	
	public function __construct($streetAddress, $city, $state, $postalCode)
	{
		$this->streetAddress = $streetAddress;
		$this->city = $city;
		$this->state = $state;
		$this->postalCode = $postalCode;
	}
	
	public function getStreetAddress()
	{
		return $this->streetAddress;
	}

	public function getCity()
	{
		return $this->city;
	}
	
	public function getState()
	{
		return $this->state;			
	}
	public function getPostalCode()
	{
		return $this->postalCode;			
	}

	public function setStreetAddress($streetAddress)
	{
		$this->streetAddress = $streetAddress;
	}

	public function setCity($city)
	{
		$this->city = $city;			
	}
	
	public function setState($state)
	{
		$this->state = $state;
	}
	public function setPostalCode($postalCode)
	{
		$this->postalCode = $postalCode;
	}
}

class EmailAddressDisplayAdapter extends AddressDisplay
{
	public function __construct($emailAddr)
	{
		$this->setAddressType("email");
		$this->setAddressText($emailAddr->getEmailAddress());
	}
}

class PhysicalAddressDisplayAdapter extends AddressDisplay
{
	public function __construct($physicalAddress)
	{
		$this->setAddressType("physical");
		$this->setAddressText($physicalAddress->getStreetAddress() . " " . $physicalAddress->getCity() . ", " . 
			$physicalAddress->getState());
	}
}

class Person
{
	private $emailAddresses;
	private $physicalAddresses;
	
	public function getEmailAddresses()
	{
		return $this->emailAddresses;
	}
	
	public function setEmailAddresses($eaddresses)
	{
		$this->emailAddresses = $eaddresses;
	}
	
	public function getPhysicalAddresses()
	{
		return $this->physicalAddresses;
	}
	
	public function setPhysicalAddresses($paddresses)
	{
		$this->physicalAddresses = $paddresses;
	}
	
}

interface AddressIterator
{
	public function hasNext();
	public function next();
}

class EmailAddressIterator implements AddressIterator
{
	private $emailAddresses;
	private $position;
	
	public function __construct($emailAddresses)
	{
		$this->emailAddresses = $emailAddresses;
		$this->position = 0;
	}
	
	public function hasNext()
	{
		if ($this->position >= count($this->emailAddresses) || 
			$this->emailAddresses[$this->position] == null) {
			return false;
		} else {
			return true;
		}
	}
	
	public function next()
	{
		$item = $this->emailAddresses[$this->position];
		$this->position = $this->position + 1;
		return new EmailAddressDisplayAdapter($item);
	}
}

class PhysicalAddressIterator implements AddressIterator
{
	private $physicalAddresses;
	private $position;
	
	public function __construct($physicalAddresses)
	{
		$this->physicalAddresses = $physicalAddresses;
		$this->position = 0;
	}
	
	public function hasNext()
	{
		if ($this->position >= count($this->physicalAddresses) || 
			$this->physicalAddresses[$this->position] == null) {
			return false;
		} else {
			return true;
		}
	}
	
	public function next()
	{
		$item = $this->physicalAddresses[$this->position];
		$this->position = $this->position + 1;
		return new PhysicalAddressDisplayAdapter($item);
	}
}

class PersonAddressIterator implements AddressIterator
{
	private $emailItr;
	private $physicalAddressItr;
	
	public function __construct($emailAddresses, $physicalAddresses)
	{
		$this->emailItr = new EmailAddressIterator($emailAddresses);
		$this->physicalAddressItr = new PhysicalAddressIterator($physicalAddresses);
	}
	
	public function hasNext()
	{
		return ($this->emailItr->hasNext() || $this->physicalAddressItr->hasNext());
	}
	
	public function next()
	{
		if ($this->emailItr->hasNext()) {
			return $this->emailItr->next();
		} else {
			return $this->physicalAddressItr->next();
		}
	}
	
}

class Automobile
{
	private $model;
	
	public function getModel()
	{
		return $this->model;
	}
	
	public function setModel($model)
	{
		$this->model = $model;
	}
	
	public function printDescription()
	{
		foreach ($this->getModel()->getFeatures() as $option=>$description)
		{
			echo("$option:  $description <br />");
		}
		
		echo("Final cost:  " . $this->getModel()->getAutomobileCost());
	}
}

interface AutomobileModel
{
	function getAutomobileCost();
	function getFeatures();
}

class BaseAutomobileModel implements AutomobileModel 
{
	public function getAutomobileCost()
	{
		return 2500;
	}
	
	public function getFeatures()
	{
		return array(
			'security' => 'Manual Locks', 
			'engine' => '1.8L 150HP Engine', 
			'transmission' => '5 Speed Manual Transmission'
		);
	}
}

class SportAutomobileModel implements AutomobileModel
{
	private $model;
	
	public function __construct($model)
	{
		$this->model = $model;
	}
	
	public function getAutomobileCost()
	{
		$cost = $this->model->getAutomobileCost();
		$cost += 1000; /* The sport model is more expensive! */	
		return $cost;
	}
	
	public function getFeatures()
	{
		$features = $this->model->getFeatures();
		
		$features['engine'] = '2.2L 300 HP Turbocharged Engine';
		$features['transmission'] = '6 Speed Manual Transmission';
		$features['shifter knob'] = 'Titanium';
		
		return $features;
	}
}

class TouringAutomobileModel implements AutomobileModel
{
	private $model;
	
	public function __construct($model)
	{
		$this->model = $model;
	}
	
	public function getAutomobileCost()
	{
		$cost = $this->model->getAutomobileCost();
		$cost += 2000;
		return $cost;
	}
	
	public function getFeatures()
	{
		$features = array('audio' => '18 Speaker Premium SoundSystem');
		
		foreach($this->model->getFeatures() as $option=>$description)
		{
			if ($option != 'shifter knob')
			{
				$features[$option] = $description;
			}
		}
		
		$features['transmission'] = '5 Speed Automatic Transmission';
		$features['engine'] = '2.2L 300 HP Turbocharged Engine';
		$features['security'] = 'Power locks w/ remote.';
		
		return $features;
	}
}

class Package
{
	private $description;
	private $weight;
	
	public function __construct($description)
	{
		$this->description = $description;
	}
	
	public function setDescription($description)
	{
		$this->description = $description;
	}
	
	public function getDescription()
	{
		return $this->description;
	}
	
	public function setWeight($weight)
	{
		$this->weight = $weight;
	}
	
	public function getWeight()
	{
		return $this->weight;
	}
}

interface Shipper
{
	public function deliver($package);
}

class BasicShipper implements Shipper
{
	public function deliver($package)
	{
		echo("Shipping " . $package->getDescription() . " by truck");
	}
}

class RailShipper implements Shipper
{
	public function deliver($package)
	{
		echo( "Shipping " . $package->getDescription() . " by rail.");
	}
}

class ShippingDelegate implements Shipper
{
	private $shipper;
	
	public function __construct()
	{
		$shipper = new BasicShipper();	
	}
	
	public function deliver($package)
	{
		$this->shipper->deliver($package);
	}
	
	public function useRail()
	{
		$this->shipper = new RailShipper();
	}
	
	public function useTruck()
	{
		$this->shipper = new BasicShipper();
	}
}

?>

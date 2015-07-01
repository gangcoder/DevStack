<?php
class PersonAddressIterator implements AddressIterator
{
    private $emailAddresses;
    private $physicalAddresses;
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
        return $item;
    }
    
}

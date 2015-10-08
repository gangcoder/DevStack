<?php

require('classes.php');

$email = new EmailAddress();
$email->setEmailAddress("user@example.com");

$address = new EmailAddressDisplayAdapter($email);

echo($address->getAddressType() . "<br/>") ;
echo($address->getAddressText());


?>
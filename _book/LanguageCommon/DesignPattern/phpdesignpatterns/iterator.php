<?php

require_once('classes.php');

$email1 = new EmailAddress();
$email1->setEmailAddress("user1@example.com");

$email2 = new EmailAddress();
$email2->setEmailAddress("user2@example.com");

$email3 = new EmailAddress();
$email3->setEmailAddress("user3@example.com");

$emailAddresses = array(
	$email1,
	$email2,
	$email3
);

echo("\nEmail Addresses:  \n\n");

$itr = new EmailAddressIterator($emailAddresses);

while ($itr->hasNext())
{
	$item = $itr->next();
	echo($item->getAddressText() . "\n");
}

echo("\nPhysical Addresses:  \n\n");

/* Now add physical addresses... */

$pa1 = new PhysicalAddress("123 Any St.", "Anytown", "NE", "00000");
$pa2 = new PhysicalAddress("123 Any Blvd.", "Anytropolis", "MN", "00000");

$physicalAddresses = array( $pa1, $pa2 );

$itr2 = new PhysicalAddressIterator($physicalAddresses);

while ($itr2->hasNext())
{
	$item = $itr2->next();
	echo($item->getAddressText() . "\n");
}

/* Now the compound iterator! */
echo("\nIterating through both types of addresses:\n\n");

$itr3 = new PersonAddressIterator($emailAddresses, $physicalAddresses);

while ($itr3->hasNext())
{
	$item = $itr3->next();
	echo($item->getAddressText() . "\n");
}


?>
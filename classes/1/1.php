<?php

//require ("gsxlib.php");
require ("../getInstance.php");


			$gsx = getInstance('0000677222','mrcarson2','Minimr2car!');


echo 'ok';

$serialnumber ='351985062656043';
if(strlen($serialnumber)<15){
            $info = $gsx->warrantyStatus($serialnumber);
	echo $info->productDescription;
        }else{
            $info = $gsx->warrantyStatus(array('alternateDeviceId' => $serialnumber));
	echo $info->productDescription;
}



//$info = $gsx->warrantyStatus(F18LMQDEFFG9);// hadi bech ytala3 info 3adi 3aserial



/*$info = $gsx->createCarryInRepair($serialnumber);

var_dump($info)*/



function testCreateCarryInRepair() {



	$repairData = array(

		'shipTo' => '6191',

		'serialNumber' => 'RM6501PXU9C',

		'diagnosedByTechId' => 'USA022SN',

		'symptom' => 'Sample symptom',

		'diagnosis' => 'Sample diagnosis',

		'unitReceivedDate' => '07/02/13',

		'unitReceivedTime' => '12:40 PM',

		'notes' => 'A sample notes',

		'poNumber' => '11223344',

		'popFaxed' => false,

		'orderLines' => array(

			'partNumber' => '076-1080',

			'comptiaCode' => '660',

			'comptiaModifier' => 'A',

			'abused' => false

		),

		'customerAddress' => array(

			'addressLine1' => 'Address line 1',

			'country' => 'US',

			'city' => 'Cupertino',

			'state' => 'CA',

			'street' => 'Valley Green Dr',

			'zipCode' => '95014',

			'regionCode' => '005',

			'companyName' => 'Apple Inc',

			'emailAddress' => 'test@example.com',

			'firstName' => 'Customer Firstname',

			'lastName' => 'Customer lastname',

			'primaryPhone' => '4088887766'

		),

	);



	$this->$gsx->createCarryinRepair($repairData);

}





$test = testCreateCarryInRepair();

?>










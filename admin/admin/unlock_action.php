  <?php



session_start();

 if (isset($_SESSION['pseudoadmin']) AND isset($_SESSION['passadmin']))



 {



 	require 'header.php';



	include '../../classes/getInstance.php';



	include '../../classes/client.php';
	include '../../classes/admin.php';



	include '../../classes/connexion.php';



	include '../../classes/gsx.php';



	$bdd=getconnexion();
	$g=new admin($bdd);

$i=0;

?>	



<head>



<title>CHECK MODEL</title>



<meta name="robots" content="noindex,follow" />



<LINK REL=StyleSheet HREF="../../css/style_generateur.css" TYPE="text/css" MEDIA=screen>







</head>



<body>



<div class="widget-content" style="display: block;">







            <h1>CHECK MODEL</h1>







<?php



//*****************CREATE FILE RESPONSE**********************//



			$gs=new gsx($bdd);



			$res=$gs->get_gsx();



			$row =mysql_fetch_array ($res);



			$gsx = getInstance($row['sold'],$row['username'],$row['pass']);



			//if($gsx)



			//{



				if(!empty($_POST['textarea'])&& isset($_POST['textarea']))//&& is_numeric ($_POST['textarea']))



				{



					$texte = $_POST['textarea'];



					$ligne = preg_split("/[\n]+/", $texte);



					foreach( $ligne as $row => $imeii ) 



							{



			



								$serial=$imeii;



								$imeii=preg_replace('/[^A-Za-z0-9-]/', '',$imeii);



								//$info = $gsx->fetchiOsActivation($imeii);



								//$serial=$info->serialNumber;



								//$info1 = $gsx->warrantyStatus($serial);



								//if( $info  && $info1)



								//{

									$repairData = array(
            'shipTo' => '6191',
            'accidentalDamage' => false,
            'addressCosmeticDamage' => false,
            'comptia' => array(
                'comptiaCode' => 'X01',
                'comptiaModifier' => 'D',
                'comptiaGroup' => 1,
                'technicianNote' => 'sample technician notes'
            ),
            'requestReviewByApple' => false,
            'serialNumber' => $imeii,
            'diagnosedByTechId' => 'USA022SN',
            'symptom' => 'Sample symptom',
            'diagnosis' => 'Sample diagnosis',
            'unitReceivedDate' => '31/03/15',
            'unitReceivedTime' => '1:40 PM',
            'notes' => 'EQUIPO SE REINICIA DE MANERA CONSECUTIVA SE REQUIERE CAMBIO',
            'purchaseOrderNumber' => 'AB12345',
            'trackingNumber' => 'P03700000183890',
            'shipper' => 'XDHL',
            'soldToContact' => 'Cupertino',
            'popFaxed' => false,
            'orderLines' => array(
                'partNumber' => 'B661-02220',
                'comptiaCode' => '660',
                'comptiaModifier' => 'A',
                'abused' => false,
		'markCompleteFlag'=>'Y',
		'replacementImeiNumber'=>'358763052650000'
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
                'emailAddress' => 'bouha51@gmail.com',
                'firstName' => 'victoor',
                'lastName' => 'hugoo',
                'primaryPhone' => '4088887766'
            ),
        );

$gsx->createCarryInRepair($repairData);


//********************************************************************
function testCreateMailInRepair() {
        $repairData = array(
            'shipTo' => '6191',
            'accidentalDamage' => false,
            'addressCosmeticDamage' => false,
            'comptia' => array(
                'comptiaCode' => 'X01',
                'comptiaModifier' => 'D',
                'comptiaGroup' => 1,
                'technicianNote' => 'sample technician notes'
            ),
            'requestReviewByApple' => false,
            'serialNumber' => 'RM6501PXU9C',
            'diagnosedByTechId' => 'USA022SN',
            'symptom' => 'Sample symptom',
            'diagnosis' => 'Sample diagnosis',
            'unitReceivedDate' => '07/02/13',
            'unitReceivedTime' => '12:40 PM',
            'notes' => 'A sample notes',
            'purchaseOrderNumber' => 'AB12345',
            'trackingNumber' => '12345',
            'shipper' => 'XDHL',
            'soldToContact' => 'Cupertino',
            'popFaxed' => false,
            'orderLines' => array(
                'partNumber' => '076-1080',
                'comptiaCode' => '660',
                'comptiaModifier' => 'A',
                'abused' => false,
				'markCompleteFlag'=>'Y',
				'replacementImeiNumber'=>'0194568965854'
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

        $this->gsx->createMailinRepair($repairData);

    }

									

									
								


								//}	



								//else



								//{



								?>



								<!--<strong>Invalid IMEI / SN :</strong> <?= $serial ?> <br> -->





								<?php



								//}	



							



							}	



			//	}



				//else



				//{



					//echo '<script>alert("svp remplir le champs imei")</script>';



					//print("<script type=\"text/javascript\">setTimeout('location=(\"unlock.php\")' ,0);</script>");



				//}



			



			}



			else



			{



				echo "SERVER DOWN";



				$gs->gsx_desable($row['username']);



			}







?>



</div>







<?php



require'footer.php';



}



	else



	{



	print("<script type=\"text/javascript\">setTimeout('location=(\"../connexion/erreur.php\")' ,0);</script>");



		



	}



?>








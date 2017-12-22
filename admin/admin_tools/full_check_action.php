 <?php
session_start();

 if (isset($_SESSION['pseudoadmintools']) AND isset($_SESSION['passadmintools']))

 {

 	require 'header.php';

	include '../../classes/getInstance.php';

	include '../../classes/connexion.php';

	include '../../classes/gsx.php';

	$bdd=getconnexion();

?>	

<head>

<title>Check Specific Carrier</title>

<meta name="robots" content="noindex,follow" />

<LINK REL=StyleSheet HREF="../../css/style_generateur.css" TYPE="text/css" MEDIA=screen>



</head>

<body>

<div class="widget-content" style="display: block;">



            <h1>CHECK BULK IMEI</h1>



<?php

//*****************CREATE FILE RESPONSE**********************//

			$gs=new gsx($bdd);

			$res=$gs->get_gsx();

			$row =mysql_fetch_array ($res);

			$gsx = getInstance($row['sold'],$row['username'],$row['pass']);

			if($gsx)

			{

				if(!empty($_POST['textarea'])&& isset($_POST['textarea']))//&& is_numeric ($_POST['textarea']))

				{

					$texte = $_POST['textarea'];

					$ligne = preg_split("/[\n]+/", $texte);

					foreach( $ligne as $row => $imeii ) 

							{

			

								$serial=$imeii;

								$imeii=preg_replace('/[^A-Za-z0-9-]/', '',$imeii);

								$info = $gsx->fetchiOsActivation($imeii);

								$serial=$info->serialNumber;

								$info1 = $gsx->warrantyStatus($serial);

								if( $info  && $info1)

								{

									$icloud=$info1->activationLockStatus;



										//if(!icloud)

										//{	?>



												<br>

												*************************************************************************<br>

												<center><strong>Serial Number:</strong> <?= $info->imeiNumber ?></center><br>

												*************************************************************************<br><br>

												<strong>Serial Number:</strong> <?= $info->serialNumber ?><br>

												<strong>Initial Activation Policy ID:</strong> <?= $info->initialActivationPolicyDetails ?><br>

												<strong>MEID:</strong> <?= $info->meid ?><br>

												<strong>Activation Policy Description:</strong> <?= $info->appliedActivationDetails ?><br>

												<strong>IMEI:</strong> <?= $info->imeiNumber ?><br>

												<strong>Applied Activation Policy ID:</strong> <?= $info->appliedActivationPolicyID ?><br>

												<strong>Part Description:</strong> <?= $info1->configDescription ?><br>

												<strong>Applied Activation Description:</strong> <?= $info->appliedActivationDetails ?><br>

												<strong>Product Version:</strong> <?= $info->productVersion ?><br>

												<strong>Next Tether Policy ID:</strong> <?= $info->nextTetherPolicyID ?><br>

												<strong>Last Restore Date:</strong> <br>

												<strong>Next Tether Activation Policy Description:</strong> <?= $info->nextTetherPolicyDetails ?><br>

												<strong>Bluetooth MAC address:</strong> <?= $info->bluetoothMacAddress ?><br>

												<strong>First Unbrick Date:</strong> <?= $info->firstUnbrickDate ?><br>

												<strong>MAC address:</strong> <?= $info->macAddress ?><br>

												<strong>ICCID:</strong> <?= $info->iccID ?><br>

												<strong>Last Unbrick Date:</strong> <?= $info->lastUnbrickDate ?><br>

												<strong>Unbricked:</strong> <?= $info->unbricked ?><br>

												<strong>Unlocked:</strong> <?= $info->unlocked ?><br>

												<strong>Find My Phone:</strong> <?= $info1->activationLockStatus ?> <?php if($info1->activationLockStatus) { $icloud="ON"; } else { $icloud="OFF"; } ?>

												<strong>Find My Phone:</strong> <? if($icloud=="ON"){ echo '(<font color=red>ON</font>)'; } else { echo '(<font color= green>OFF</font>)'; } ?><br>



<?php

										//}
										//else
										//{
										//echo '<strong>FIND MY PHONE <font color="red">ON</font> : </strong>'.$imeii.'<br>';
	
										
										//}

								}

								else

								{

								?>
								<strong>INVALID IMEI/SN :</strong>
								<strong> <?=  $serial.$imeii ?></strong> <br>

								

								<?php

								}			

				

							}

				}

				else

				{

					echo '<script>alert("svp remplir le champs imei")</script>';

					print("<script type=\"text/javascript\">setTimeout('location=(\"full_check_imei_sn.php\")' ,0);</script>");

				}

			

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



								
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



            <h1>Check Specific Carrier</h1>



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



												**************************************************************<br>

												<strong>SN/IMEI:</strong> <?= $imeii ?><br>

												<strong>Serial Number:</strong><?= $info->serialNumber ?><br>

												<strong>IMEI:</strong> <?= $info->imeiNumber ?><br>

												<strong>Applied Activation Policy ID:</strong> <?= $info->appliedActivationPolicyID ?><br>

												<strong>Part Description:</strong> <?=  $info1->configDescription ?><br>

												<?php

												if($info1->activationLockStatus)

												{

												$icloud="ON";

												}

												else

												{

												$icloud="OFF";

												}



												?>

												<strong>Find My Phone:</strong> <? if($icloud=="ON"){ echo '(<font color=red>ON</font>)'; } else { echo '(<font color= green>OFF</font>)'; } ?><br>



<?php

										//}

								}

								else

								{

								?>

								<strong>IMEI:</strong> <?= $serial ?> <br> 

								<strong>INVALID</strong><br>

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



								
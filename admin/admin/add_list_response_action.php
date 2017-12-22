  <?php

session_start();

 if (isset($_SESSION['pseudoadmin']) AND isset($_SESSION['passadmin']))

 {

 	require 'header.php';

	include '../../classes/getInstance.php';

	include '../../classes/connexion.php';

	include '../../classes/gsx.php';

	include '../../classes/admin.php';

	$bdd=getconnexion();

?>	

<head>

<title>ADD LISTE RESPONSE COSTUMER</title>

<meta name="robots" content="noindex,follow" />

<LINK REL=StyleSheet HREF="../../css/style_generateur.css" TYPE="text/css" MEDIA=screen>



</head>

<body>

<div class="widget-content" style="display: block;">



            <h1>ADD LISTE RESPONSE COSTUMER</h1>



<?php

//*****************CREATE FILE RESPONSE**********************//

			$gs=new gsx($bdd);

			$res=$gs->get_gsx();

			$row =mysql_fetch_array ($res);

			$gsx = getInstance($row['sold'],$row['username'],$row['pass']);

			$g=new admin($bdd);

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

								

								$g->set_imei($imeii);

								$g->set_sn($info->serialNumber);

								$g->set_initi_acti_policy ($info->initialActivationPolicyDetails);

								$g->set_meid($info->meid);

								$g->set_policy_description($info->appliedActivationDetails);

								$g->set_policy_id($info->appliedActivationPolicyID);

								$g->set_part_description($info1->configDescription);

								$g->set_activation_description($info->appliedActivationDetails);

								$g->set_product_version($info->productVersion);

								$g->set_next_policy_id($info->nextTetherPolicyID);

								$g->set_next_policy_description($info->nextTetherPolicyDetails);

								$g->set_blutooth($info->bluetoothMacAddress);

								$g->set_first_unbrick($info->firstUnbrickDate);

								$g->set_mac($info->macAddress);

								$g->set_ICCID($info->iccID);

								$g->set_last_unbrick($info->lastUnbrickDate);

								$g->set_unbricked($info->unbricked);

								$g->set_unlocked ($info->unlocked);

								if($info1->activationLockStatus) { $icloud="ON"; } else { $icloud="OFF"; }

								$g->set_icloud ($icloud);

								$g->add_info();

								$g->add_info_order($imeii);

								



										

								}

								else

								{

								$g->add_erreur($imeii);

								$g->add_erreur_order($imeii);

								}			

				

							}

				}

				else

				{

					echo '<script>alert("svp remplir le champs imei")</script>';

					print("<script type=\"text/javascript\">setTimeout('location=(\"add_list_response.php\")' ,0);</script>");

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



								
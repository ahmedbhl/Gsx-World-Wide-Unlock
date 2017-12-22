  <?php

session_start();
 if (isset($_SESSION['pseudoadmin']) AND isset($_SESSION['passadmin']))

 {

 	require 'header.php';

	include '../../classes/getInstance.php';

	include '../../classes/client.php';

	include '../../classes/connexion.php';

	include '../../classes/gsx.php';

	$bdd=getconnexion();
$i=0;

?>	

<head>

<title>CHECK IMEI WITH POLICY ID</title>

<meta name="robots" content="noindex,follow" />

<LINK REL=StyleSheet HREF="../../css/style_generateur.css" TYPE="text/css" MEDIA=screen>



</head>

<body>

<div class="widget-content" style="display: block;">



            <h1>CHECK IMEI WITH POLICY ID</h1>



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

									//if($info->appliedActivationPolicyID)
									//{
									//$policy_id=$info->appliedActivationPolicyID;
									//}
									//else
									//{
									$policy_id=$info->nextTetherPolicyID;		
									//}
									//$policy_id=preg_replace('/[^A-Za-z0-9-]/', '',$policy_id);

									$g=new client($bdd);

									$row=$g->policy_id($policy_id);

									if($row)

									{
										if($info1->activationLockStatus)
										 { $icloud="ON"; } 
										else 
										{ $icloud="OFF"; }
										
										$model=$info1->configDescription;

										if($icloud=="OFF")

										{	
											$search=$g->search_imei_generer($info->imeiNumber);
											if($search==0)
											{	
											$i++;									
											echo $info->imeiNumber.'<br>';
											$g->insert_imei($info->imeiNumber,$model,$info->initialActivationPolicyDetails);
											}
											

										}
 
									}



									



								}	

								else

								{

								?>

								<strong>Invalid IMEI/SN :</strong> <?= $serial ?> <br> 

								<?php

								}	

							

							}	
echo 'Operation Terminer avec le nombre des imei Traiter :'.$i.'<br>';

				}

				else

				{

					echo '<script>alert("svp remplir le champs imei")</script>';

					print("<script type=\"text/javascript\">setTimeout('location=(\"check_policy_id.php\")' ,0);</script>");

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




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



										if(!icloud)

										{	

											if($info->appliedActivationDetails)

											{

												$res=$info->appliedActivationDetails;

												$res=preg_replace('/[^A-Za-z0-9-]/', '',$res);

											}

											else

											{

												$res=$info->nextTetherPolicyDetails;

												$res=preg_replace('/[^A-Za-z0-9-]/', '',$res);

											}

													

													if($_REQUEST['Retail'])

														{

															$Retail=false;

															$rt=$_REQUEST['Retail'];

															$tt=preg_match("/$rt/i", $res);

															if($tt)

																{

																echo $info->imeiNumber."===>".$_REQUEST['Retail'].'<br>';

																$Retail=true;

																}

														 }

													 if($_REQUEST['Multi-Mode'])



														{

															$multie=false;

															$mt=$_REQUEST['Multi-Mode'];

															$tt=preg_match("/$mt/i", $res);

															if($tt)

																{

															echo $info->imeiNumber."===>".$_REQUEST['Multi-Mode'].'<br>';

															$multie=true;

																}



														}



													 if($_REQUEST['Hong_Kong'])



														{

															$hong=false;

															$hk=$_REQUEST['Hong_Kong'];

															$tt=preg_match("/$hk/i", $res);

															if($tt)

																{

															echo $info->imeiNumber."===>".$_REQUEST['Hong_Kong'].'<br>';

															$hong=true;

																}



														}

													if($_REQUEST['China'])

													{

															$china=false;

															$ch=$_REQUEST['China'];

															$tt=preg_match("/$ch/i", $res);

															if($tt)

																{

															echo $info->imeiNumber."===>".$_REQUEST['China'].'<br>';

															$china=true;

																}

													}

													 if($_REQUEST['France_Bouygues_Unlocked'])

													{

															$bouygues=false;

															$bgf=$_REQUEST['France_Bouygues_Unlocked'];

															$tt=preg_match("/$bgf/i", $res);

															if($tt)

																{

															echo $info->imeiNumber."===>".$_REQUEST['France_Bouygues_Unlocked'].'<br>';

															$bouygues=true;

																}

													}

													if($_REQUEST['France_Free_Unlocked'])

													{

															$free=false;

															$frf=$_REQUEST['France_Free_Unlocked'];

															$tt=preg_match("/$frf/i", $res);

															if($tt)

																{

															echo $info->imeiNumber."===>".$_REQUEST['France_Free_Unlocked'].'<br>';

															$free=true;

																}

													}

													if($_REQUEST['Unassigned_factory'])

													{

															$free=false;

															$frf=$_REQUEST['Unassigned_factory'];

															$tt=preg_match("/$frf/i", $res);

															if($tt)

																{

															echo $info->imeiNumber."===>".$_REQUEST['Unassigned_factory'].'<br>';

															$free=true;

																}

													}





										



										} 



								}	

							}	

				}

				else

				{

					echo '<script>alert("svp remplir le champs imei")</script>';

					print("<script type=\"text/javascript\">setTimeout('location=(\"check_specific_carrier.php\")' ,0);</script>");

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




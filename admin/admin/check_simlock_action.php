 <?php
session_start();

 if (isset($_SESSION['pseudoadmin']) AND isset($_SESSION['passadmin']))

 {

 	require 'header.php';

	include '../../classes/getInstance.php';

	include '../../classes/connexion.php';

	include '../../classes/gsx.php';

	$bdd=getconnexion();

?>	

<head>

<title>CHECK SIMLOCK</title>

<meta name="robots" content="noindex,follow" />

<LINK REL=StyleSheet HREF="../../css/style_generateur.css" TYPE="text/css" MEDIA=screen>



</head>

<body>

<div class="widget-content" style="display: block;">



            <h1>CHECK SIMLOCK</h1>



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

									$simlock=$info->unlocked;
										if($simlock==true)
										{
										?>
										<?= $info->imeiNumber ?><font color="green"> Unlocked :<?= $info->unlocked ?></font><br>
										<?php
										}
										else
										{ ?>
										<?= $info->imeiNumber ?><font color="red"> Unlocked :<?= $info->unlocked ?></font><br>
										<?php
										}





										

								}

								else

								{

								?>
								<strong>INVALID IMEI/SN :</strong> <?=  $serial.$imeii ?></strong> <br>

								

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

				echo '<strong><font color="red">SERVER DOWN</font></strong>';

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



								
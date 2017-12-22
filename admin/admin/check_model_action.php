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



									

									$model=$info1->configDescription;

									

									



										
											echo $info->imeiNumber.'  '.$model.'<br>';
								


								}	



								else



								{



								?>



								<strong>Invalid IMEI / SN :</strong> <?= $serial ?> <br> 





								<?php



								}	



							



							}	



				}



				else



				{



					echo '<script>alert("svp remplir le champs imei")</script>';



					print("<script type=\"text/javascript\">setTimeout('location=(\"check_model.php\")' ,0);</script>");



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








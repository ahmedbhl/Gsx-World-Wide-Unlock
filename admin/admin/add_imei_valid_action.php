  <?php

session_start();
 if (isset($_SESSION['pseudoadmin']) AND isset($_SESSION['passadmin']))

 {

 	require 'header.php';

	include '../../classes/admin.php';

	include '../../classes/connexion.php';

	$bdd=getconnexion();
$i=0;

?>	

<head>

<title>ADD IMEI NOT USED</title>

<meta name="robots" content="noindex,follow" />

<LINK REL=StyleSheet HREF="../../css/style_generateur.css" TYPE="text/css" MEDIA=screen>



</head>

<body>

<div class="widget-content" style="display: block;">



            <h1>ADD IMEI NOT USED</h1>



<?php

//*****************CREATE FILE RESPONSE**********************//

			if(!empty($_POST['textarea'])&& isset($_POST['textarea']))//&& is_numeric ($_POST['textarea']))

				{

					$texte = $_POST['textarea'];

					$ligne = preg_split("/[\n]+/", $texte);

					foreach( $ligne as $row => $imeii ) 

							{


			
									$i++;
									$serial=$imeii;
									$imeii=preg_replace('/[^A-Za-z0-9-]/', '',$imeii);
									$g=new admin ($bdd);
									$g->addimei_valid($imeii);

	

							

							}	
							echo 'Operation Completed Successfully imei are added :'.$i.'<br>';

				}

				else

				{

					echo '<script>alert("svp remplir le champs imei")</script>';

					print("<script type=\"text/javascript\">setTimeout('location=(\"add_imei_valid.php\")' ,0);</script>");

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




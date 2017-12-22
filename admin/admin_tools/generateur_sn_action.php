<?php
session_start();

 if (isset($_SESSION['pseudoadmintools']) AND isset($_SESSION['passadmintools']))

 {

 	require 'header.php';
	include "../../classes/class_gen_sn.php";
	include '../../classes/connexion.php';
	$bdd=getconnexion();

	$g=new gensn($bdd);


?>	

<html>

<head>






<meta http-equiv="content-type" content="text/html; charset=UTF-8">

		<meta charset="UTF-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 

		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

		<title>GENERATE SN</title>

		<meta name="author" content="Codrops">

		<link rel="shortcut icon" href="#">

		<link rel="stylesheet" type="text/css" href="../../css/acceuil_admin/tasble.css">

		<link rel="stylesheet" type="text/css" href="../../css/acceuil_admin/compsonent.css">

		<LINK REL=StyleSheet HREF="../../css/style_generateur.css" TYPE="text/css" MEDIA=screen>

		<!--<script src="../../js/activation.js"></script>-->

		<!--<script type="text/javascript" src="../../js/jquery_gen_sn.js"></script>-->

</head>

<body>

<br><br>

<div class="widget-content" style="display: block;">



    <div class="logsin">

            <h1>Generer Votre SN</h1>
<hr>

	  <div id="login_error">

	    	 

		</div>
<?php

      $g->sup();
$tag1=preg_replace('/[^A-Za-z0-9-]/','',$_REQUEST["tag1"]);

$tag2=preg_replace('/[^A-Za-z0-9-]/','',$_REQUEST["tag2"]);

$nb =$_REQUEST["nb"];

for($i=0;$i<$nb;$i++)

{

	

$imei =$g->genesn($i);

$imei=preg_replace('/[^A-Za-z0-9-]/', '',$imei);

$sn=$tag1.$imei.$tag2;

$g->write($sn);

echo '<b><size="5">'.$sn.'</b><br>';


}
?>

    </div>

</div>

    <div class="login-help">

	<p>Telecharger : <a href="sn.txt" download="SN"> Cliquez ici pour Telecharger fichier texte.</a></p>    </div>











</body>

</html>







<?php

require'footer.php';

}

	else

	{

	print("<script type=\"text/javascript\">setTimeout('location=(\"../connexion/erreur.php\")' ,0);</script>");

		

	}

?>



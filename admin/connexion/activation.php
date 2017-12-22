<?php

require("../../classes/session.class.php");

require("../../classes/session_start.php");

	$session_start=new session_str();

$session=new session();

?>

<!DOCTYPE html>

<html>

<head>



  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Activation</title>

<LINK REL=StyleSheet HREF="../../css/style_login.css" TYPE="text/css" MEDIA=screen>

<meta name="robots" content="noindex,follow" />

<script src="../../js/activation.js"></script>

<script type="text/javascript" src="../../js/jquery_activation.js"></script>

</head>

<body> 

<a href="login.php" class="retour">Retour</a>

  <div class="container">

 

    <div class="login">

      <h1>Activation & Changer Mot de passe</h1>

	  <div id="activation">

	  <span class="mail">

				 <div id="login_error">

	    	 <?php $session->msg_log();  ?>

				</div>

		</div>

      <form method="post" action="activation_action.php">

	



        <p><span class="id_cl"><input type="text" name="pseudo" id="id_cl" placeholder="Identifiant"></span></p>

        <p ><span class="info"><input type="text" name="cle_activation" value="" placeholder="Clé activation "></span></p>

		

        <p class="submit"><input type="submit" name="button" value="valider"></p>

      </form>

    </div>

 </div>

 



</body>

</html>


 <?php

session_start();

if (isset($_SESSION['pseudo']) AND isset($_SESSION['pass']))

{



// echo'<div class="retoure"><center><a href=deconnexion.php>déconnexion</a></div>';

?>

<html>

<head>

<meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Activation</title>

<LINK REL=StyleSheet HREF="../../css/style_login.css" TYPE="text/css" MEDIA=screen>

<meta name="robots" content="noindex,follow" />

<title>Changer mot de passe</title>

</head>

<body>



<div class="container">

<h5><a href="deconnexion.php" class="verif">Deconnexion</a></h1>

<h5><a href="#" class="retour"><?php echo 'BONJOUR : '. $_SESSION['nom'] ?></a></h5>

<div class="login">

 <h1>Changer mot de passe</h1>



<form action="change_mot_passe_action.php" method="post">

<p class="imei"><input type=password name="mot_de_passe"  placeholder="Nouveau Mot de passe" ></p>

<p class="imei"><input type=password name="mot_de_passe1" placeholder="Confirme votre mot de passe "></p>

<p class="submit"><input type="submit" name="bn_psw_change"></div>

</form>

</div></div>

<?php

}

else

{

header ("Refresh:1;URL=activation.php");

print("<script type=\"text/javascript\">setTimeout('location=(\"activation.php\")' ,0);</script>");



}

?>

</body>

</html>
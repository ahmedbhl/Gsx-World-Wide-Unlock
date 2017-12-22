 <?php

session_start();

if (isset($_SESSION['pseudo']) AND isset($_SESSION['pass']))

{



include "../../classes/client.php";

include "../../classes/tentative.php";

include "../../classes/connexion.php";

$bdd=getconnexion();

if (($_REQUEST["mot_de_passe"])==($_REQUEST["mot_de_passe1"]))

{

  if (!empty($_REQUEST["mot_de_passe"]) && !empty($_REQUEST["mot_de_passe1"]))

	{

		$g=new client($bdd);

		$g->set_pseudo($_SESSION['pseudo']);

		$g->set_pass(sha1($_REQUEST["mot_de_passe"]));

		$g->modifier_pswd();

		$g->etat('client');

		$y= new tentative($bdd);

		$y->set_pseudo($_SESSION['pseudo']);

		$y->etat();

		

		

		header ("Refresh:0;URL=login.php");

		print("<script type=\"text/javascript\">setTimeout('location=(\"activation.php\")' ,0);</script>");



	}

	else

	{

		echo'<script>alert("svp remplir les champ")</script>';

		header ("Refresh:0;URL=change_mot_passe.php");

		print("<script type=\"text/javascript\">setTimeout('location=(\"change_mot_passe.php\")' ,0);</script>");



	}

}

else

{

echo'<script>alert("le mot de passe nest pas identique")</script>';

header ("Refresh:0;URL=change_mot_passe.php");

print("<script type=\"text/javascript\">setTimeout('location=(\"change_mot_passe.php\")' ,0);</script>");



}





}

else

{

header ("Refresh:1;URL=activation.php");

print("<script type=\"text/javascript\">setTimeout('location=(\"activation.php\")' ,0);</script>");



}

?>
<?php

require("../../classes/session.class.php");

require("../../classes/session_start.php");

$session_start=new session_str();

$session=new session();

if (isset($_REQUEST['pseudo']) && isset($_REQUEST['cle_activation']))

{



include "../../classes/client.php";

include "../../classes/connexion.php";

$bdd=getconnexion();



$cle_activation=$_REQUEST["cle_activation"];

$pseudo=$_REQUEST['pseudo'];



if(!empty($pseudo) && !empty($cle_activation))

	{

		$g=new client($bdd);

		$g->set_pseudo($_REQUEST["pseudo"]);

		

		$row=$g->activation($_REQUEST["pseudo"]);

		$nom=$row['nom'];

		$etat=$row['etat'];
		$password=$row['pass'];
		$ps=$row['pseudo'];	

			if(($cle_activation==$password) && ($pseudo==$ps))

			{

			    // if(!$etat)

				// {

				

				$_SESSION['pseudo'] = $_REQUEST['pseudo'];

				$_SESSION['nom'] =$nom;

				$_SESSION['pass']=$cle_activation;

				echo'activation ok';

				//$g->etat('client');

				//$g->etat('compte_bancaire');

				//mise a jour de la date de creation

				//$g->compte();

				

				//header ("Location:change_mot_passe.php");

				print("<script type=\"text/javascript\">setTimeout('location=(\"change_mot_passe.php\")' ,0);</script>");



				die();

				

			}

			else

			{

				

				$msg='cle activation ou identifiant invalide,recommencer';

			}

					

	}

	

		else

		{

				

				$msg='svp remplir les champs';

				

		}





				$session->set_msg_login($msg);

				//header ("Location:activation.php");

				print("<script type=\"text/javascript\">setTimeout('location=(\"activation.php\")' ,0);</script>");



}				

else

{

//header ("Refresh:1;URL=activation.php");

print("<script type=\"text/javascript\">setTimeout('location=(\"activation.php\")' ,0);</script>");



}

	

	

?>
<?php

function getconnexion()

{

							include "Mysql.php";

							$bdd=new Mysql();

							$bdd->set_login("root");

							$bdd->set_mdp("");

							$bdd->set_bdd("igcjioxt_worldwide");

							$bdd-> set_serveur("127.0.0.1");

							$bdd->connexion();

							return ($bdd);

							

							

							// include "Mysql.php";

							 // $bdd=new Mysql();

							 // $bdd->set_login("igcjioxt");

							// $bdd->set_mdp("8IM47imoh3");

							 // $bdd->set_bdd("igcjioxt_worldwide");

							 // $bdd-> set_serveur("localhost");

							 // $bdd->connexion();

							 // return ($bdd);

}							
?>
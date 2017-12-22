  <?php

session_start();

 if (isset($_SESSION['pseudoadmin']) AND isset($_SESSION['passadmin']))

 {

	if(($_REQUEST['pseudo'])&&($_REQUEST['nom'])&&($_REQUEST['prenom'])&&($_REQUEST['password'])&&($_REQUEST['mail']))

	{

		

			include "../../classes/admin.php";

			include "../../classes/connexion.php";

			$bdd=getconnexion();

			$g=new admin($bdd);

			$g->set_pseudo($_REQUEST['pseudo']);

			$res=$g->verif_pseudo();

		if($res==0)

			{

 

					$g->set_pseudo($_REQUEST['pseudo']);

					$g->set_nom($_REQUEST['nom']);

					$g->set_prenom($_REQUEST['prenom']);

					$g->set_pass($_REQUEST['password']);

					$g->set_mail($_REQUEST['mail']);

					$g->add_admin();

					echo '<script>alert("Operation was performed successfully")</script>';

					print("<script type=\"text/javascript\">setTimeout('location=(\"add_admin.php\")' ,0);</script>");

			}

			else

			{

			echo '<script>alert("pseudo used try with another")</script>';

			print("<script type=\"text/javascript\">setTimeout('location=(\"add_admin.php\")' ,0);</script>");

			

			}

				    

	}

	else

	{

	echo '<script>alert("All fields are required")</script>';

	print("<script type=\"text/javascript\">setTimeout('location=(\"add_admin.php\")' ,0);</script>");

	

	}

					

}



	else

	{

	print("<script type=\"text/javascript\">setTimeout('location=(\"../connexion/erreur.php\")' ,0);</script>");

		

	}

?>








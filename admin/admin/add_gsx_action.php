   <?php

session_start();
 if (isset($_SESSION['pseudoadmin']) AND isset($_SESSION['passadmin']))

 {

	if(($_REQUEST['sold'])&&($_REQUEST['username'])&&($_REQUEST['password']))

	{

		

			include "../../classes/gsx.php";

			include "../../classes/connexion.php";

			$bdd=getconnexion();

			$g=new gsx($bdd);

			$g->set_sold($_REQUEST['sold']);

			$g->set_username($_REQUEST['username']);

			$g->set_pass($_REQUEST['password']);

			$g->add_gsx();

			echo '<script>alert("COUNT GSX ADDED")</script>';

			print("<script type=\"text/javascript\">setTimeout('location=(\"add_gsx.php\")' ,0);</script>");

			

				    

	}

	else

	{

	echo '<script>alert("All fields are required")</script>';

	print("<script type=\"text/javascript\">setTimeout('location=(\"add_gsx.php\")' ,0);</script>");

	

	}

					

}



	else

	{

	print("<script type=\"text/javascript\">setTimeout('location=(\"../connexion/erreur.php\")' ,0);</script>");

		

	}

?>








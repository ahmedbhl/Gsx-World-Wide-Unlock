   <?php

session_start();

 if (isset($_SESSION['pseudoadmin']) AND isset($_SESSION['passadmin']))

 {

include "../../classes/admin.php";

include "../../classes/connexion.php";

$bdd=getconnexion();

$g=new admin($bdd);



 

					$g->set_pseudo($_REQUEST['id']);

					$g->activer_admin(0);

					//header ("Refresh:0;URL=modifier_admin.php");

					print("<script type=\"text/javascript\">setTimeout('location=(\"modifier_admin.php\")' ,0);</script>");



				    

					

					

}



	else

	{

	print("<script type=\"text/javascript\">setTimeout('location=(\"../connexion/erreur.php\")' ,0);</script>");

		

	}

?>








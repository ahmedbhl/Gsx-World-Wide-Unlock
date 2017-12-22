  <?php

session_start();

 if (isset($_SESSION['pseudoadmin']) AND isset($_SESSION['passadmin']))

 {

include "../../classes/admin.php";

include "../../classes/connexion.php";

$bdd=getconnexion();

$g=new admin($bdd);

				if($_REQUEST['credit'])

				{

					$g->set_pseudo($_REQUEST['id']);

					$g->set_credit($_REQUEST['credit']);

					$g->add_acredit();

					print("<script type=\"text/javascript\">setTimeout('location=(\"add_credit.php\")' ,0);</script>");

				}

				else

				{

				echo'<script>alert("svp remplir champ credit ")</script>';

				print("<script type=\"text/javascript\">setTimeout('location=(\"add_credit.php\")' ,0);</script>");

				}

				    

					

					

}



	else

	{

	print("<script type=\"text/javascript\">setTimeout('location=(\"../connexion/erreur.php\")' ,0);</script>");

		

	}

?>








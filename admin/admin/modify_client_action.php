 <?php
session_start();

 if (isset($_SESSION['pseudoadmin']) AND isset($_SESSION['passadmin']))

 {



include "../../classes/admin.php";

include "../../classes/connexion.php";

$bdd=getconnexion();

$g=new admin($bdd);



 

		if($_REQUEST)

		{ 

				if(isset($_REQUEST['id']) and !empty($_REQUEST['id']) )

				{

					if($_REQUEST['activation']=='ACTIVER')

					{

								

								foreach($_REQUEST['id'] as $id)

								{								

									$g->set_pseudo($id);

									$g->activer(1);

								}

								print("<script type=\"text/javascript\">setTimeout('location=(\"modify_client.php\")' ,0);</script>");



								

					}

					else if($_REQUEST['activation']=='DESACTIVER')

					{								

								foreach($_REQUEST['id'] as $id)

								{

								

									$g->set_pseudo($id);

									$g->activer(0);

								}

								print("<script type=\"text/javascript\">setTimeout('location=(\"modify_client.php\")' ,0);</script>");

					}

					else

					{								

								foreach($_REQUEST['id'] as $id)

								{

								

									$g->set_pseudo($id);

									$g->supprimer();

								}

								print("<script type=\"text/javascript\">setTimeout('location=(\"modify_client.php\")' ,0);</script>");



					}

					

				}

				else

				{

					echo'<script>alert("aucun client selectionner")</script> ';

					print("<script type=\"text/javascript\">setTimeout('location=(\"modify_client.php\")' ,0);</script>");



				}

		}		

				

		else

		{

				echo'<script>alert("aucun client selectionner")</script> ';

				print("<script type=\"text/javascript\">setTimeout('location=(\"modify_client.php\")' ,0);</script>");

		}

		

		

		

}

else

	{

	print("<script type=\"text/javascript\">setTimeout('location=(\"../connexion/erreur.php\")' ,0);</script>");

		

	}

?>
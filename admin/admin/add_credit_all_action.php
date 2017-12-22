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

					if($_REQUEST['creditt'])

					{

								

								foreach($_REQUEST['id'] as $id)

								{								

									$g->set_pseudo($id);

									echo $_REQUEST['creditt'];

									$g->set_credit($_REQUEST['creditt']);

									$g->add_acredit();

									echo $_REQUEST['creditt'];

									echo $id;

								}

													echo'<script>alert("ssssssss ")</script>';



								print("<script type=\"text/javascript\">setTimeout('location=(\"add_credit.php\")' ,0);</script>");

								

					}

					else

					{

					echo'<script>alert("svp remplir champ credit")</script> ';

					print("<script type=\"text/javascript\">setTimeout('location=(\"add_credit.php\")' ,0);</script>");

					}

					

					

					

				}

				else

				{

					echo'<script>alert("aucun client selectionner")</script> ';

					print("<script type=\"text/javascript\">setTimeout('location=(\"add_credit.php\")' ,0);</script>");

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
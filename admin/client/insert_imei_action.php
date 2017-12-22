<?php

session_start();

if (isset($_SESSION['pseudo']) AND isset($_SESSION['pass']))

	{



		if(!empty($_REQUEST['type']) && !empty($_REQUEST['imei']))

		{

			include "../../classes/connexion.php";

			include "../../classes/client.php";

			$bdd=getconnexion();

			$g=new client($bdd);

			$g->set_pseudo($_SESSION['pseudo']);

			$g->set_type($_REQUEST['type']);

			$g->set_commentaire($_REQUEST['commentaire']);

			$g->set_date(date('y-m-d H:i:s'));

			$texte=$_REQUEST['imei'];

			$ligne = preg_split("/[\n]+/", $texte);

			foreach($ligne as $row => $imei)

			{	

				//$imeii=preg_replace('/[^A-Za-z0-9-]/', '',$imei);
				$imeii=trim($imei);

				$l=strlen($imeii);

				if($l==15)

				{

				$g->set_imei($imei);

				$s=$g->search_imei();

				$g->insert_order($s,$imeii);

				}

				else

				{

				echo'<script>alert("invalid size imei inserted")</script>';

				print("<script type=\"text/javascript\">setTimeout('location=(\"insert_imei.php\")' ,0);</script>");

				}

			}

			echo'<script>alert("the operation to be performed")</script>';

			print("<script type=\"text/javascript\">setTimeout('location=(\"insert_imei.php\")' ,0);</script>");

		}

		else

		{

		echo'<script>alert("remplir les champs")</script>';

		print("<script type=\"text/javascript\">setTimeout('location=(\"insert_imei.php\")' ,0);</script>");		

		}





	}

	else

	{

	

	print("<script type=\"text/javascript\">setTimeout('location=(\"../connexion/erreur.php\")' ,0);</script>");

		

	}



?>




















































<?php
					session_start();

	require("../../classes/session.class.php");

	//require("../../classes/session_start.php");

	

	$session=new session();

	if (isset($_REQUEST['id_log']) AND isset($_REQUEST['pswd']))

	 {

		

		include "../../classes/client.php";

		include "../../classes/tentative.php";

		include "../../classes/connexionpdo.php";

		include "../../classes/connexion.php";



		$bdd=getconnexion();

		//********************************************************

		$pseudo=$_POST['id_log'];

		$pass=$_POST['pswd'];

		$g=new client($bdd);

		if(!empty($pseudo) && !empty($pass) )//&& (is_numeric($pseudo)))

		{

			//$res=$g->chercher_id($pseudo);

			$login=strlen($pseudo); 

			if ($login==5)

			{

				try

				{

					$bd =getpdo();





				}

				catch(Exception $e)

				{

					die('Erreur : '.$e->getMessage());

				}

					// Hachage du mot de passe

					$pass_hache = $_POST['pswd'];//sha1($_POST['pswd']);

					// Vérification des identifiants

					$req = $bd->prepare('SELECT * FROM admin WHERE pseudo = :pseudo AND pass = :pass');

					$req->execute(array('pseudo' => $pseudo,'pass' => $pass_hache));

					$resultat = $req->fetch();

					

				if (!$resultat)

				{		

					$msg='Mauvais identifiant ou mot de passe';

					

				}	

				else

				{

					//$session_start=new session_str();
			
			
					$_SESSION['pseudoadmin'] = $resultat['pseudo'];

					$_SESSION['passadmin'] = $resultat['pass'];

					$_SESSION['nomadmin'] = $resultat['nom'];

					$_SESSION['prenomadmin'] = $resultat['prenom'];

					echo 'Vous êtes connecté !';

					print("<script type=\"text/javascript\">setTimeout('location=(\"../admin/accueil_admin.php\")' ,0);</script>");

					die();

						

				}

						

			}

	//*********************************************************************************************************************



			else if ($login>6)

			{

				try

				{

					$bd =getpdo();



				}

				catch(Exception $e)

				{

					die('Erreur : '.$e->getMessage());

				}

					// Hachage du mot de passe

					//$pass_hache =$_POST['pswd'];// sha1($_POST['pswd']);

					$pass_hache = sha1($_POST['pswd']);

					// Vérification des identifiants

					$req = $bd->prepare('SELECT * FROM client WHERE pseudo = :pseudo AND pass = :pass');

					$req->execute(array('pseudo' => $pseudo,'pass' => $pass_hache));

					$resultat = $req->fetch();

					//creation dun objet client

					$g=new client($bdd);

					$g->set_pseudo($pseudo);

					$g->set_pass($pass);

					$etat=$resultat['etat'];

					$etatadmin=$g->verif_etatadmin();

				if($etatadmin==1)

				{

					// creation dun objet tentativité

					$y=new tentative($bdd);

					$y->set_pseudo($pseudo);

					$y->set_date_histo(date('y-m-d H:i:s'));

					$y->set_ip($_SERVER['REMOTE_ADDR']);

					$y->set_tentative_chec(0);

				

				if (!$resultat)

					{

						$v=$g->verif($pseudo);

						if($v)

						{

							$tt=$y->tentativ($pseudo);

								if($tt==4)

								{	

									$msg='votre identifiant bloquer  svp ressayer plus tard!!';

									// print("<script type=\"text/javascript\">setTimeout('location=(\"login.php\")' ,0);</script>");

								}

								else

								{

									$msg='Mauvais identifiant ou mot de passe !';

									// print("<script type=\"text/javascript\">setTimeout('location=(\"login.php\")' ,0);</script>");

								}

						}

						else

						{

							$msg='Mauvais identifiant ou mot de passe !';

							// print("<script type=\"text/javascript\">setTimeout('location=(\"login.php\")' ,0);</script>");

						}

					}	

					else

					{

						if(!$etat)

						{

							$tt=$y->tentativ($pseudo);

								if($tt==3)

								{	

								

										$msg='votre identifiant bloquer  svp ressayer plus tard!';

										// print("<script type=\"text/javascript\">setTimeout('location=(\"login.php\")' ,0);</script>");

									

								}

								else

								{

									$msg='votre compte nest pas active!';
									// print("<script type=\"text/javascript\">setTimeout('location=(\"login.php\")' ,0);</script>");

								}

						}

						else

						{	

							$y-> histo_con($pseudo);

							//session_start();

							$_SESSION['pseudo'] = $resultat['pseudo'];

							$_SESSION['pass'] = $resultat['pass'];

							$_SESSION['nom'] = $resultat['nom'];

							$_SESSION['prenom'] = $resultat['prenom'];

							$_SESSION['credit'] = $resultat['credit'];

							echo 'Vous êtes connecté !';

						 print("<script type=\"text/javascript\">setTimeout('location=(\"../client/accueil_client.php\")' ,0);</script>");

							die();

						}

					}

				}

				else

				{

				$msg='votre identifiant bloquer  Contacter l\'administrateur ';

				}

			}

			else if($login==6)

			{

						try

				{

					$bd =getpdo();



				}

				catch(Exception $e)

				{

					die('Erreur : '.$e->getMessage());

				}

					// Hachage du mot de passe

					$pass_hache =$_POST['pswd'];// sha1($_POST['pswd']);

					// Vérification des identifiants

					$req = $bd->prepare('SELECT * FROM admin_tools WHERE pseudo = :pseudo AND pass = :pass');

					$req->execute(array('pseudo' => $pseudo,'pass' => $pass_hache));

					$resultat = $req->fetch();

					//creation dun objet client

					//$g=new client($bdd);

					//$g->set_pseudo($pseudo);

					//$g->set_pass($pass);

					//$etat=$resultat['etat'];

					//creation dun objet tentativité

					//$y=new tentative($bdd);

					//$y->set_pseudo($pseudo);

					//$y->set_date_histo(date('y-m-d H:i:s'));

					//$y->set_ip($_SERVER['REMOTE_ADDR']);

					//$y->set_tentative_chec(0);

				

				if (!$resultat)

					{

						//$v=$g->verif($pseudo);

						//if($v)

						//{

							//$tt=$y->tentativ($pseudo);

							//	if($tt==3)

								//{	

								//	$msg='votre identifiant bloquer  svp ressayer plus tard!lool';

								//								print("<script type=\"text/javascript\">setTimeout('location=(\"login.php\")' ,0);</script>");

								//}

								//else

								//{

								//	$msg='Mauvais identifiant ou mot de passe !';

								//								print("<script type=\"text/javascript\">setTimeout('location=(\"login.php\")' ,0);</script>");

								//}

						//}

						//else

						//{

							$msg='Mauvais identifiant ou mot de passe !';

							print("<script type=\"text/javascript\">setTimeout('location=(\"login.php\")' ,0);</script>");

						//}

					}	

					else

					{

						//if(!$etat)

						//{

							//$tt=$y->tentativ($pseudo);

							//	if($tt==3)

							//	{	

								

								//		$msg='votre identifiant bloquer  svp ressayer plus tard!';

								//									print("<script type=\"text/javascript\">setTimeout('location=(\"login.php\")' ,0);</script>");

									

							//	}

								//else

								//{

								//	$msg='votre compte nest pas active!';

								//								print("<script type=\"text/javascript\">setTimeout('location=(\"login.php\")' ,0);</script>");

								//}

						//}

						//else

						//{	

						//	$y-> histo_con($pseudo);

							//session_start();

							$_SESSION['pseudoadmintools'] = $resultat['pseudo'];

							$_SESSION['passadmintools'] = $resultat['pass'];

							$_SESSION['nomadmintools'] = $resultat['nom'];

							$_SESSION['prenomadmintools'] = $resultat['prenom'];

							echo 'Vous êtes connecté !';

							print("<script type=\"text/javascript\">setTimeout('location=(\"../admin_tools/accueil_admin_tools.php\")' ,0);</script>");

							die();

						}

					//}

			

			}



			else

			{

				$msg='Mauvais identifiant ou mot de passe';

				

			}	

			

			

		//**************************************************************************************************************************	

			

		}

		else

		{

			

			$msg='Mauvais identifiant ou mot de passe';

			

			



		}

	

		

	

	

			$session->set_msg_login($msg);


			print("<script type=\"text/javascript\">setTimeout('location=(\"./login.php\")' ,0);</script>");

		}	



	 else

		{

		print("<script type=\"text/javascript\">setTimeout('location=(\"./erreur.php\")' ,0);</script>");

		}

	

?>

	








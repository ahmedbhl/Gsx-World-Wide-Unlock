<?php

include "../../classes/client.php";

include "../../classes/connexion.php";

$bdd=getconnexion();





$pseudo=$_REQUEST['pseudo'];











		

if(!empty($pseudo))

	{

		$g=new client($bdd);

		$g->set_pseudo($pseudo);

		

		$row=$g->activation($pseudo);

		$cle=$row['pass'];

		$mail=$row['mail'];	

		$subject="ACTIVATION & RENITIALISATION DE MOT DE PASSE ";

		$message="votre cle d'\activation est :<br>".$cle;

		$headers  = 'MIME-Version: 1.0' . "\r\n";

		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		$headers .= 'From: www.i-unlock-worldwide.com <ADMIN@I-UNLOCK-WORLD-WIDE.COM>' . "\r\n";

		





	

			if($pseudo==$row['pseudo'])

			{	

				//shell_exec('echo "zz" |mail -s "zzz" bouha51@gmail.com'); 

				echo "1";

					//$m='(echo "votre cle dactivation est : '.$cle.'" |mail -s "cle dactivation" '.$mail.')';

				// shell_exec($m);	

				mail($mail, $subject, $message, $headers);

				

			}

			else

			{

				echo "0";

			}



		}

		else

		{

			echo"svp remplir le champ";

		}

	

?>
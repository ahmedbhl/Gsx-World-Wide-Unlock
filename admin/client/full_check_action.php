  <?php

	session_start();

	if (isset($_SESSION['pseudo']) AND isset($_SESSION['pass'])) 

{

require'header.php';

$i=0;

?>		



<html>

<head>

<script type="text/javascript">

function cocherDecocher(obj, controle)

      {

        var checked = (obj.checked) ? "checked" : "";

        for (cle in controle)

        {

          controle[cle].checked = checked;

        }

      }

    </script>



<meta http-equiv="content-type" content="text/html; charset=UTF-8">

		<meta charset="UTF-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 

		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

		<title>ACTIVER DESACTIVER</title>

		<meta name="author" content="Codrops">

		<link rel="shortcut icon" href="#">

		<link rel="stylesheet" type="text/css" href="../../css/acceuil_admin/tasble.css">

		<link rel="stylesheet" type="text/css" href="../../css/acceuil_admin/compsonent.css">

</head>

<body>

	

<?php

//**********************************************************************************************************************//

include "../../classes/client.php";

include "../../classes/connexion.php";

$bdd=getconnexion();

$g=new client($bdd);

$session=$g->check_credit($_SESSION['pseudo']);

echo'<div class="credit"><h3>VOTRE CREDIT DE CHECK:  '.$session.'</h3></div><br>';

?><br><br>





<div class="widget-content" style="display: block;">

<?php



			

				if((isset($_REQUEST['id']) and !empty($_REQUEST['id'])))

					{	

									$count = count($_REQUEST['id']);

									if(!is_array($_REQUEST['id']))

									{

										

										$g->set_pseudo($_SESSION['pseudo']);

										$imei=preg_replace('/[^A-Za-z0-9-]/','',$_REQUEST['id']);

										$g->set_imei($imei);

										$res=$g->full_check();

										$etat=$g->etatimei($_REQUEST['id']);

										if($etat==1)

											{
											$g->credit($_SESSION['pseudo']);
										
										while($row = mysql_fetch_array ($res))

										{

 ?>

											<table>

												<tr>

													<td><strong>Serial Number:</strong> <?= $row['sn'] ?></td>

													<td><strong>Initial Activation Policy ID:</strong> <?= $row['policy_id'] ?></td>

												</tr>

												<tr>

													<td><strong>MEID:</strong> <?= $row['meid'] ?></td>

													<td><strong>Activation Policy Description:</strong> <?= $row['policy_description'] ?></td>

												</tr>

												<tr>

													<td><strong>IMEI:</strong> <?= $row['imei'] ?></td>

													<td><strong>Applied Activation Policy ID:</strong> <?= $row['activation_policy_id'] ?></td>

												</tr>

												<tr>

													<td><strong>Part Description:</strong> <?= $row['part_description'] ?></td>

													<td><strong>Applied Activation Description:</strong> <?= $row['activation_description'] ?></td>

												</tr>

												<tr>

													<td><strong>Product Version:</strong> <?= $row['product_version'] ?></td>

													<td><strong>Next Tether Policy ID:</strong> <?= $row['next_policy_id'] ?></td>

												</tr>

												<tr>

													<td><strong>Last Restore Date:</strong> <?= $row['last_restore_date'] ?></td>

													<td><strong>Next Tether Activation Policy Description:</strong> <?= $row['next_activation_policy'] ?></td>

												</tr>

												<tr>

													<td><strong>Bluetooth MAC address:</strong> <?= $row['blutooth'] ?></td>

													<td><strong>First Unbrick Date:</strong> <?= $row['first_unbrick'] ?></td>

												</tr>

												<tr>

													<td><strong>MAC address:</strong> <?= $row['mac_address'] ?></td>

													<td><strong>ICCID:</strong> <?= $row['iccid'] ?></td>

												</tr>

												<tr>

													<td><strong>Last Unbrick Date:</strong> <?= $row['last_unbrick'] ?></td>

													<td><strong>Unbricked:</strong> <?= $row['unbricked'] ?></td>

												</tr>

												<tr>

													<td><strong>Unlocked:</strong> <?= $row['unlocked'] ?></td>

													<td></td>

												</tr>

												<tr>

													<td><strong>Find My Phone:</strong> <?= $row['find_my_phone'] ?></td>

													<td></td>

												</tr>

											 </table>		

									

									

									

									

										<?php

											

										}

											}

											else if($etat==0)

											{

												echo'YOUR IMEI IN PROCESS<br>';

											}

											else

											{

												echo'YOUR IMEI REJECTED<br>';

											}	



									}

									

									

									

									else

									{

										if($_REQUEST['creditt']>=$count)

										{

											foreach($_REQUEST['id'] as $id)

											{

											

												$g->set_pseudo($_SESSION['pseudo']);

												$g->set_imei($id);

												$res=$g->full_check();

												$etat=$g->etatimei($id);

										if($etat==1)

											{

												$g->credit($_SESSION['pseudo']);

												while($row =mysql_fetch_array ($res))

												{ ?>

													<table>

															<tr>

																<td><strong>Serial Number:</strong> <?= $row['sn'] ?></td>

																<td><strong>Initial Activation Policy ID:</strong> <?= $row['policy_id'] ?></td>

															</tr>

															<tr>

																<td><strong>MEID:</strong> <?= $row['meid'] ?></td>

																<td><strong>Activation Policy Description:</strong> <?= $row['policy_description'] ?></td>

															</tr>

															<tr>

																<td><strong>IMEI:</strong> <?= $row['imei'] ?></td>

																<td><strong>Applied Activation Policy ID:</strong> <?= $row['activation_policy_id'] ?></td>

															</tr>

															<tr>

																<td><strong>Part Description:</strong> <?= $row['part_description'] ?></td>

																<td><strong>Applied Activation Description:</strong> <?= $row['activation_description'] ?></td>

															</tr>

															<tr>

																<td><strong>Product Version:</strong> <?= $row['product_version'] ?></td>

																<td><strong>Next Tether Policy ID:</strong> <?= $row['next_policy_id'] ?></td>

															</tr>

															<tr>

																<td><strong>Last Restore Date:</strong> <?= $row['last_restore_date'] ?></td>

																<td><strong>Next Tether Activation Policy Description:</strong> <?= $row['next_activation_policy'] ?></td>

															</tr>

															<tr>

																<td><strong>Bluetooth MAC address:</strong> <?= $row['blutooth'] ?></td>

																<td><strong>First Unbrick Date:</strong> <?= $row['first_unbrick'] ?></td>

															</tr>

															<tr>

																<td><strong>MAC address:</strong> <?= $row['mac_address'] ?></td>

																<td><strong>ICCID:</strong> <?= $row['iccid'] ?></td>

															</tr>

															<tr>

																<td><strong>Last Unbrick Date:</strong> <?= $row['last_unbrick'] ?></td>

																<td><strong>Unbricked:</strong> <?= $row['unbricked'] ?></td>

															</tr>

															<tr>

																<td><strong>Unlocked:</strong> <?= $row['unlocked'] ?></td>

																<td></td>

															</tr>

															<tr>

																<td><strong>Find My Phone:</strong> <?= $row['find_my_phone'] ?></td>

																<td></td>

															</tr>

														 </table>		

										

										

										

										

										<?php 

												}

	

												}

											else if($etat==0)

											{

												echo $id.'<br>';

												echo'YOUR IMEI IN PROCESS<br>';

											}

											else

											{	

												echo $id.'<br>';

												echo'YOUR IMEI REJECTED<br>';

											}

											echo'----------------------------------------------------------------------------<br>';

	

											}

												

												

										}

									

										else

										{

											echo'<script>alert("YOUR CREDIT CHECK Insufficient ")</script> ';

											print("<script type=\"text/javascript\">setTimeout('location=(\"full_check.php\")' ,0);</script>");

											

										}

									}

								

								// echo'<script>alert("les comptes desactiver")</script>';

								// header ("Refresh:0;URL=activer_desactiver.php");

				}

					

				else

				{

						echo'<script>alert("aucun imei selectionner")</script> ';

						print("<script type=\"text/javascript\">setTimeout('location=(\"full_check.php\")' ,0);</script>");

				}

			

		































































?>

</div>

</body>

</html>



























<?php

require'footer.php';

}

	else

	{

	print("<script type=\"text/javascript\">setTimeout('location=(\"../connexion/erreur.php\")' ,0);</script>");

		

	}

?>






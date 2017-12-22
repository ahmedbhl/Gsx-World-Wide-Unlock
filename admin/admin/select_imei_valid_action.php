 <?php
session_start();

 if (isset($_SESSION['pseudoadmin']) AND isset($_SESSION['passadmin']))

 {

 	require 'header.php';

	include '../../classes/getInstance.php';

	include '../../classes/connexion.php';

	include '../../classes/admin.php';

	$bdd=getconnexion();

?>	

<head>

<title>Check Specific Carrier</title>

<meta name="robots" content="noindex,follow" />

<LINK REL=StyleSheet HREF="../../css/style_generateur.css" TYPE="text/css" MEDIA=screen>



</head>

<body>

<div class="widget-content" style="display: block;">



            <h1>Generer IMEI VALID</h1>



<?php

//*****************CREATE FILE RESPONSE**********************//
			$nb=$_REQUEST['nb'];
			$mod=$_REQUEST['model'];
			$cap=$_REQUEST['capacite'];
			$col=$_REQUEST['color'];
			$type=$_REQUEST['type'];
			if($type=='SPECIAL')
			{

			$multi='%Multi-Mode%';
			$china='%China%';
			}
			else
			{
			$multi='%';
			$china='%';

			}

			
			

			$g=new admin($bdd);

			

				if((!empty($_REQUEST['nb'])) && (isset($_REQUEST['nb'])))

				{
					$res=$g->get_list_imei($nb,$mod,$cap,$col,$multi,$china);
					$num_rows = mysql_num_rows($res);
					if($num_rows!=0)
					{
					while($row =mysql_fetch_array ($res))
					{
						
						echo $row['imei'].'<br>';
						$g->set_etat_imei($row['imei']);
			
					}
					}
					else
					{
					echo 'IMEI Not Found : No More IMEI '.$mod.' '.$cap.' '.$color.' in '.$type.' Service';
					}
					

				}

				else

				{

					echo '<script>alert("svp remplir le champs nb")</script>';

					print("<script type=\"text/javascript\">setTimeout('location=(\"select_imei_valid.php\")' ,0);</script>");

				}

			

			



?>

</div>



<?php

require'footer.php';

}

	else

	{

	print("<script type=\"text/javascript\">setTimeout('location=(\"../connexion/erreur.php\")' ,0);</script>");

		

	}

?>



								
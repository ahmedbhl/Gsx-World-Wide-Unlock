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
			//$pseudo=$_REQUEST['pseudo'];
			$mod=$_REQUEST['model'];
			//$cap=$_REQUEST['capacite'];
			//$col=$_REQUEST['color'];
			$type=$_REQUEST['type'];
			
//**************************************************************
			if($_REQUEST['capacite']=='--SELECT CAPACITY--')
			{
			
			$cap='';
			}
			else
			{
			$cap='%'.$_REQUEST['capacite'];			
			}
//**************************************************************
			if($_REQUEST['color']=='--SELECT COLOR--')
			{
			$col='';
			}
			else
			{
			$col='%'.$_REQUEST['color'].'%';
			}
//**************************************************************
			if(isset($_REQUEST['pseudo']))
			{
			$pseudo=$_REQUEST['pseudo'];
			}
			else
			{
			$pseudo='';
			}
//**************************************************************
			if($_REQUEST['type']=='--SELECT MODEL--')
			{
			$type='';
			}
			else
			{
			$type=$_REQUEST['type'];
			}




			
			

				$g=new admin($bdd);

			

				//if((!empty($_REQUEST['nb'])) && (isset($_REQUEST['nb'])))

				//{
					$res=$g->get_list_imei_customer($pseudo,$mod,$cap,$col,$type);
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
					echo 'IMEI Not Found : No More IMEI '.$mod.' '.$cap.' '.$col.' in '.$type.' Service';
					}
					

				//}

				//else

				//{

					//echo '<script>alert("svp remplir le champs nb")</script>';

					//print("<script type=\"text/javascript\">setTimeout('location=(\"select_list_customer.php\")' ,0);</script>");

				//}

			

			



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



								
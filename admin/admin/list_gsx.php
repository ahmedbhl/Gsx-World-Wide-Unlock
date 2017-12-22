 <?php

session_start();
 if (isset($_SESSION['pseudoadmin']) AND isset($_SESSION['passadmin']))

 {

 	require 'header.php';

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

		<title>List GSX</title>

		<meta name="author" content="Codrops">

		<link rel="shortcut icon" href="#">

		<link rel="stylesheet" type="text/css" href="../../css/acceuil_admin/tasble.css">

		<link rel="stylesheet" type="text/css" href="../../css/acceuil_admin/compsonent.css">

</head>

<body>

	

<?php

//**********************************************************************************************************************//

include "../../classes/gsx.php";

include "../../classes/connexion.php";

$bdd=getconnexion();

?><br><br>

<div class="widget-content" style="display: block;">

<table  border="0" align="center" class="table table-hover table-striped ">

<center>

	<br><br>

	 <thead>

	<tr>

	

      <th style width="130px"><i><div align="center"><b>ID</b></div></i></th></style>

      <th><i><div align="center"><b>SOLD-TO</b></div></i></th>

      <th ><i><div align="center"><b>USERNAME</b></div></i></th>

      <th ><i><div align="center"><b>PASSWORD</b></div></i></th>

      <th><i><div align="center"><b>ETAT</b></div></i></th>

      

   <tr>

    </thead>

	<tbody>

<?php

$g=new gsx($bdd);

	$res=$g->liste_gsx();

	while ($row = mysql_fetch_array ($res))

{

$i++;

$etat=$g->verif_etat($row['etat']);

	?>

    <tr>

      

	  

      <td><div align="center"><em><?php print $i; ?></em></div></td>

      <td><div align="center"><em><?php print $row['sold']; ?></em></div></td>

	     <td><div align="center"><em><?php print $row['username']; ?></em></div></td>

		    <td><div align="center"><em><?php print $row['pass']; ?></em></div></td>

		<td><div align="center" ><em><?php if($etat=='ACTIVER'){echo '<span class="label label-success">';}else { echo '<span class="label label-important">';} print $etat; ?></em></div></td></td>

	</tr>

    <?php

	}

	?>

	</tbody>

  </table>



  </center>

  <?php



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




































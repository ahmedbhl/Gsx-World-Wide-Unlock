 <?php

session_start();

 if (isset($_SESSION['pseudoadmin']) AND isset($_SESSION['passadmin']))

 {

 	require 'header.php';

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

	

<script type="text/javascript">

<!--

function aller()

{

var valeur = document.forms['from'].elements['credit'].value; // Contient la valeur de l'<input />

//document.location.href = 'page.php?store='+valeur;

return +value;

}

-->

</script>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">

		<meta charset="UTF-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 

		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

		<title>Modify Users</title>

		<meta name="author" content="Codrops">

		<link rel="shortcut icon" href="#">

		<link rel="stylesheet" type="text/css" href="../../css/acceuil_admin/tasble.css">

		<link rel="stylesheet" type="text/css" href="../../css/acceuil_admin/compsonent.css">

</head>

<body>

	

<?php

//**********************************************************************************************************************//

include "../../classes/admin.php";

include "../../classes/connexion.php";

$bdd=getconnexion();

?><br><br>

<div class="widget-content" style="display: block;">

<table  border="0" align="center" class="table table-hover table-striped ">

<center>

    <form action="add_credit_all_action.php" method="Post" name="from">

	<!--<input type="text" class="btn btn-sm btn-default" name="creditt"></input>

	<input type="submit"  value="valider" class="btn btn-sm btn-default">-->

	<br><br>

	 <thead>

	<tr>

	<th><input type="checkbox" name="suptt" onclick="cocherDecocher(this, this.form.elements['id[]'])"></th>

	

      <th style width="130px"><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USER</i></th></style>

      <th><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOM</i></th>

      <th ><i>&nbsp;&nbsp;&nbsp;&nbsp;PRENOM</i></th>

      <th ><i>&nbsp;&nbsp;&nbsp;&nbsp;MAIL</i></th>

	  <th><i>&nbsp;&nbsp;&nbsp;&nbsp;CREDIT</i></th>

      <th><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ETAT</i></th>

      <th><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;nouveau credit</i></th>

      <th><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VALIDER</i></th>

   <tr>

    </thead>

	<tbody>

<?php

$g=new admin($bdd);

$g->set_pseudo($_SESSION['pseudoadmin']);

	$res=$g->liste_client();

	while ($row = mysql_fetch_array ($res))

{

$etat=$g->verif_etat($row['etat']);

	?>

    <tr>

      <td><input type="checkbox" name="id[]" value="<?php print $row['pseudo']; ?>">

	  

      <td><div align="center"><em><?php print $row['pseudo']; ?></em></div></td>

      <td><div align="center"><em><?php print $row['nom']; ?></em></div></td>

	     <td><div align="center"><em><?php print $row['prenom']; ?></em></div></td>

		    <td><div align="center"><em><?php print $row['mail']; ?></em></div></td>

			<td><div align="center"><em><?php print $row['credit']; ?></em></div></td>

			<td><div align="center" ><em><?php if($etat=='ACTIVER'){echo '<span class="label label-success">';}else { echo '<span class="label label-important">';} print $etat; ?></em></div></td></td>

			<!--<td><div align="center"><em><input type="text" class="btn btn-sm btn-default" name="credit"></input></em></div></td>

		 <td><div align="center"><em><a href="add_credit_action.php?id=<?php print $row['pseudo'];?>&credit=javascript:aller();"  class="btn btn-sm btn-default"><i class="icon-ok">VALIDER</i></a></em></div></td>

-->

		 </form>

<form action="add_credit_action.php?id=<?php print $row['pseudo']; ?>" method="post">	

			<td><div align="center"><em><input type="text" class="btn btn-sm btn-default" name="credit"></input></em></div></td>

	 

<td><div align="center"><em><input type="submit" class="btn btn-sm btn-default" value="VALIDER"></a></em></div></td>



</form>

	</tr>

    <?php

	}

	?>

	

	





	<!--<form action="add_credit_action.php?id=<?php //print $row['pseudo']; ?>" method="post">

	  

		</form>-->

	

	

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




































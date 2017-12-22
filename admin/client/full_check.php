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

		<script src="../../js/activation.js"></script>

		<script type="text/javascript" src="../../js/check_credit.js"></script>

</head>

<body>

	

<?php

//**********************************************************************************************************************//

include "../../classes/client.php";

include "../../classes/connexion.php";

$bdd=getconnexion();

$g=new client($bdd);

$g->set_pseudo( $_SESSION['pseudo']);

$res=$g->liste_check();

$session=$g->check_credit($_SESSION['pseudo']);?>



<div class="credit"><h3><?php if($session>0){ echo '

YOUR CREDIT CHECK:'.$session;}else{ echo 'YOUR CREDIT CHECK Insufficient &nbsp;&nbsp;:&nbsp; '.$session;  } ?></h3></div><br><?php

	if($res)

	{

?><br><br>

<div class="widget-content" style="display: block;">

<table  border="0" align="center" class="table table-hover table-striped ">

<center>

    <form action="full_check_action.php" method="Post">

	<input type="hidden" name="creditt" class="creditt" value="<?php print $session ?>">

	<div class="checkall"><input type="submit"  value="CHECK ALL" class="btn btn-sm btn-default"></div>

	<br><br>

	 <thead>

	<tr>

	<th><input type="checkbox" name="suptt" onclick="cocherDecocher(this, this.form.elements['id[]'])"></th>

	

      <th style width="130px"><i><div align="center"><b>ID</b></div></i></th></style>

      <th><i><div align="center"><b>IMEI</b></div></i></th>

      <th ><i><div align="center"><b>Date de l'operation</b></div></i></th>

      <th ><i><div align="center"><b>Type Of Service</b></div></i></th>

	  	  <th><i><div align="center"><b>CUTOMER</b></div></i></th>

	  <th><i><div align="center"><b>UNLOCKED</b></div></i></th>

      <th><i><div align="center"><b>CHECK</b></div></i></th>

   <tr>

    </thead>

	<tbody>

<?php





	while ($row =mysql_fetch_array ($res))

{

$i++;

$etat=$row['etat'];

	?>

    <tr>

      <td><input type="checkbox" name="id[]" value="<?php print $row['imei'];; ?>">

       <td><div align="center"><em><?php print $i; ?></em></div></td>

      <td><div align="center"><em><?php print $row['imei']; ?></em></div></td>

      <td><div align="center"><em><?php print $row['date']; ?></em></div></td>

	     <td><div align="center"><em><?php if($row['type']=="Special"){echo '<font color=blue ><b>'.$row['type'].'</b>';}else{ echo '<font color=green ><b>'.$row['type'];} ?></em></div></td>

		  	     <td><div align="center"><em><?php print $row['commentaire']; ?></em></div></td>

	<td><div align="center" ><em><?php if($etat==1){echo '<span class="label label-success">';print "Unlocked";}else if($etat==2){ echo '<span class="label label-important">'; print "rejected"; } else{ print "in process";} ?></em></div></td></td>

	  <td><div align="center" ><em class="check"><a href="full_check_action.php?id=<?php print $row['imei'];?>" class="btn btn-sm btn-default"><i class="icon-ok">CHECK </i></a></em></div></td>

    </tr>

    <?php

	}

	?>

	</tbody>

  </table>



  </form></center>

  <?php

}

else

	{

		echo'Acunne operation pour cette compte' ;

		

	}

echo'</div>';

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






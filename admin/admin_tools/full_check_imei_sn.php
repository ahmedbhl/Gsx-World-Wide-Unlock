 <?php

session_start();

 if (isset($_SESSION['pseudoadmintools']) AND isset($_SESSION['passadmintools']))

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



<meta http-equiv="content-type" content="text/html; charset=UTF-8">

		<meta charset="UTF-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 

		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

		<title>Modify ADMIN</title>

		<meta name="author" content="Codrops">

		<link rel="shortcut icon" href="#">

		<link rel="stylesheet" type="text/css" href="../../css/acceuil_admin/tasble.css">

		<link rel="stylesheet" type="text/css" href="../../css/acceuil_admin/compsonent.css">

		<LINK REL=StyleSheet HREF="../../css/style_generateur.css" TYPE="text/css" MEDIA=screen>

		<script src="../../js/activation.js"></script>

</head>

<body>

	

<?php

//**********************************************************************************************************************//

include "../../classes/admin.php";

include "../../classes/connexion.php";

$bdd=getconnexion();

?><br><br>

<div class="widget-content" style="display: block;">



    <div class="logsin">

            <h1>Full Check</h1>

	  <form action="full_check_action.php" method="POST" enctype="multipart/form-data" name="addProductForm" id="addProductForm">



	<p class="resultat"><textarea rows="20" cols="35" name="textarea" id="res_valid"  >	</textarea></p>

	<p class="submit"><input type="submit" name="send" id="send" ></p>

	<!--<p class="tt">Telecharger : <a href="file/imei_valid.txt" download="imei"> Cliquez ici pour Telecharger fichier.</a></p>-->    



</form>

	

    </div>



    









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
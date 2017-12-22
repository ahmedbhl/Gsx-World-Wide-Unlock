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

		<script type="text/javascript" src="../../js/jquery_gen.js"></script>

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

            <h1>Generer Votre IMEI</h1>

	  <div id="login_error">

	    	

		</div>

      <form action="#" method="post">

        <p class="imei"><input type="text" min="8" max="14" name="imei" id="imei" maxlength="14" value="" placeholder="IMEI"></p>

	    <!--<p class="submit"><input type="submit" name="commit" value="Generer"></p>-->

		<div class="nb">

	   <p class="nb"><input type="text" min="8" max="14" name="nb" id="nb" maxlength="4" value="" placeholder="NB"></p>

		</div>

        <p class="resultat"><textarea  rows="20" cols="35" name="resultat" id="resultat"></textarea></p>

	  </form>

	

    </div>



    <div class="login-help">

	<p>Telecharger : <a href="imei.txt" download="imei"> Cliquez ici pour Telecharger fichier texte.</a></p>    </div>









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




































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



<meta http-equiv="content-type" content="text/html; charset=UTF-8">

		<meta charset="UTF-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 

		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

		<title>Modify Users</title>

		<meta name="author" content="Codrops">

		<link rel="shortcut icon" href="#">

		<link rel="stylesheet" type="text/css" href="../../css/acceuil_admin/tasble.css">

		<link rel="stylesheet" type="text/css" href="../../css/tabs.css">

		<link rel="stylesheet" type="text/css" href="../../css/acceuil_admin/compsonent.css">

		<script type="text/javascript" src="../../js/jquery.min.js"></script>

</head>

<body>

	

<?php

//**********************************************************************************************************************//



?><br><br>

<div class="widget-content" style="display: block;">



    <FORM class="form-horizontal" role="form" action="add_gsx_action.php" method="Post" id="contact">

	

     <div class="form-group"> <label class="col-lg-4 control-label">SOLD-TO </label></div>

	<div class="form-group"> <div class="col-lg-8"><input type="texte" name="sold" class="form-control" id="nom" ></div></div>

	<span class="error">This field is required</span>

	<div class="form-group"> <label class="col-lg-4 control-label">USERNAME </label></div>

	<div class="form-group"> <div class="col-lg-8"><input type="texte" name="username" class="form-control" id="prenom"></div></div>

	<span class="error">This field is required</span>

	<div class="form-group"> <label class="col-lg-4 control-label">PASSWORD </label></div>

	<div class="form-group"> <div class="col-lg-8"><input   type="texte" name="password" class="form-control" id="pseudo"></div></div>

	<span class="error">This field is required</span>

	                       

                                <div class="form-group">

                                  <div class="col-lg-offset-1 col-lg-9">

                                    

                                   <button type="submit" class="btn btn-primary" id="contact_submit">Ajouter</button>

 

                                  

                                  </div>

                                </div>

                              </form>

							  

							  

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




































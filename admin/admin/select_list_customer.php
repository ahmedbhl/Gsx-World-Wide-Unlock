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

		<title>Modify ADMIN</title>

		<meta name="author" content="Codrops">

		<link rel="shortcut icon" href="#">

		<link rel="stylesheet" type="text/css" href="../../css/acceuil_admin/tasble.css">

		<link rel="stylesheet" type="text/css" href="../../css/acceuil_admin/compsonent.css">

		<LINK REL=StyleSheet HREF="../../css/style_generateur.css" TYPE="text/css" MEDIA=screen>

		

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

            <h1>Generer Votre IMEI Valid</h1>

	  <div id="login_error">

	    	

		</div>

      <form action="select_list_customer_action.php" method="post">



		<div class="nbs">

	   <p class="nbs"><input type="text"  name="pseudo" id="nbs"  value="" placeholder="Pseudo of Customer"></p>
		 <p class="nb">
		<select name="model">
					<option select="selected">--SELECT MODEL--</option>
					<option>IPHONE 4</option>
					<option>IPHONE 4S</option>
					<option>IPHONE 5</option>
					<option>IPHONE 5c</option>
					<option>IPHONE 5s</option>
					<option>IPHONE 6</option>
					<option>IPHONE 6 Plus</option>
		</select>

		<select name="capacite" >
					<option select="selected">--SELECT CAPACITY--</option>
					<option>8GB</option>
					<option>16GB</option>
					<option>32GB</option>
					<option>64GB</option>
					<option>128GB</option>
		</select>
		<select name="color">
					<option select="selected">--SELECT COLOR--</option>
					<option>WHITE</option>
					<option>BLACK</option>
					<option>GOLD</option>
					<option>SPACE GRAY</option>
					<option>SILVER</option>
					<option>BLUE</option>
					<option>PINK</option>
					<option>YELLOW</option>
					<option>GREEN</option>
		</select>
		<select name="type" >
					<option select="selected">--SELECT TYPE--</option>
					<option>Special</option>
					<option>Ordinary</option>

		</select>


		</p>

		</div>
	    <p class="submit"><input type="submit" name="commit" value="Generer"></p>


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




































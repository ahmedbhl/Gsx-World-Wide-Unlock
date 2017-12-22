   <?php



session_start();



 if (isset($_SESSION['pseudoadmin']) AND isset($_SESSION['passadmin']))



 {



 	require 'header.php';



?>	



<head>



<title>CREATE CARRY-IN</title>



<meta name="robots" content="noindex,follow" />



<LINK REL=StyleSheet HREF="../../css/style_generateur.css" TYPE="text/css" MEDIA=screen>







</head>



<body>



<div class="widget-content" style="display: block;">







            <h1>CREATE CARRY-IN</h1>



	<form action="unlock_action.php" method="POST" >



	<p class="resultat"><textarea rows="20" cols="35" name="textarea" >	</textarea></p>



	<p class="submit"><input type="submit" name="send" id="send" ></p>










	</form>



 



</div>







<?php



require'footer.php';



}



	else



	{



	print("<script type=\"text/javascript\">setTimeout('location=(\"../connexion/erreur.php\")' ,0);</script>");



		



	}



?>




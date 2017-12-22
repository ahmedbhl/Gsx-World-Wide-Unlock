   <?php



session_start();



 if (isset($_SESSION['pseudoadmin']) AND isset($_SESSION['passadmin']))



 {



 	require 'header.php';



?>	



<head>



<title>ADD LIST CUSTOMER FOR CHECK MODEL</title>



<meta name="robots" content="noindex,follow" />



<LINK REL=StyleSheet HREF="../../css/style_generateur.css" TYPE="text/css" MEDIA=screen>







</head>



<body>



<div class="widget-content" style="display: block;">







            <h1>ADD LIST CUSTOMER FOR CHECK MODEL</h1>



	<form action="add_list_for_check_action.php" method="POST" >


	<input type="text" name="pseudo" ><br>
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




 <?php
session_start();

 if (isset($_SESSION['pseudoadmintools']) AND isset($_SESSION['passadmintools']))

 {

 	require 'header.php';

?>	

<head>

<title>Check Specific Carrier</title>

<meta name="robots" content="noindex,follow" />

<LINK REL=StyleSheet HREF="../../css/style_generateur.css" TYPE="text/css" MEDIA=screen>



</head>

<body>

<div class="widget-content" style="display: block;">



            <h1>CHECK BULK IMEI</h1>

	<form action="check_specific_carrier_action.php" method="POST" >



	<input type="checkbox" name="Retail" value="RetailUnlock">Retail Unlock

	<input type="checkbox" name="Multi-Mode" value="Multi-Mode">Multi-Mode

	<input type="checkbox" name="Hong_Kong" value="HongKong">Hong Kong&nbsp;&nbsp;&nbsp;

	<input type="checkbox" name="China" value="China">China

	<input type="checkbox" name="Unassigned_factory" value="Unassignedfactory">Unassigned factory<br>

	<input type="checkbox" name="Unlocked" value="Unlocked">Unlocked&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	<input type="checkbox" name="France_Bouygues_Unlocked" value="FranceBouyguesUnlocked">France Bouygues Unlocked

	<input type="checkbox" name="France_Free_Unlocked" value="FranceFreeUnlocked">France Free Unlocked

	<p class="resultat"><textarea rows="20" cols="35" name="textarea" >	</textarea></p>

	<p class="submit"><input type="submit" name="send" id="send" ></p>

	<p class="tt">Telecharger : <a href="file/imei_valid.txt" download="imei"> Cliquez ici pour Telecharger fichier.</a></p>    



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


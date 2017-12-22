  <!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<meta charset="utf-8">
<title>Inscription</title>
<link rel="stylesheet" type="text/css" media="screen" href="../../js/style-inscription.css">
</head>
<body>
<a class="acceuil" href="login.php">LOGIN</a>
<div id="wrap">
<div id="main">
<h1 class="top bottom"><span>I-unlock-world-wide</span></h1>
<h2>Ce formulaire est rapide et facile à remplir !</h2>

<form method="post" action="inscri_action.php">
    <!-- //******************************************************************************************//-->
	<fieldset><legend> INSCRIPTION </legend>
	<div class="requiredNotice">* Champ obligatoire</div>
	
	<div class="formspacer"></div>
	<label for="" class="input required">Identifiant client:&nbsp;<strong>*</strong>&nbsp;</label> 
	<input  pattern=".{7,20}" type="text" name="id_cl"   ><br>
	<label for="nom" class="input required">NOM :&nbsp;<strong>*</strong>&nbsp;</label> 
	<input type="text" pattern=".{2,20}" name="nom" id="nom"  ><br>
	<label for="prenom" class="input required">Prenom :&nbsp;<strong>*</strong>&nbsp;</label> 
	<input type="text" pattern=".{2,20}" name="prenom" id="prenom" ><br>
	<label for="mail1" class="input required">Mot De Passe:&nbsp;<strong>*</strong>&nbsp;</label>
	<input type="password" name="password" id="pass" > <br>
	<label for="recordClientPhone" class="input required">Numéro de téléphone:&nbsp;<strong>*</strong>&nbsp;</label> 
	<input type="text" pattern=".{8,11}" name="num_tel"  maxlength="25" > <br>
	<label for="mail" class="input required">Adresse E-mail:&nbsp;<strong>*</strong>&nbsp;</label>
	<input type="email" name="mail" id="mail"  > <br>
	<label for="mail1" class="input required">Confirmez votre Email:&nbsp;<strong>*</strong>&nbsp;</label>
	<input type="email" name="mail1" id="mail1" > <br>
	<div class="buttonWrapper"> <input name="submit" id="submit" value="Submit" class="submitbutton" alt="Submit" title="Submit" type="submit"></div>

	</fieldset>
	

</form>

</div>
</div>



</body></html>
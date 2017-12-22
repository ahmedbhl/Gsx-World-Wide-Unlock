<?php
require_once("../connexion/connexion.php");
require_once("../classes/inscription.php");
?>
<?php
if(isset($_POST['email']))
{
$email=$_POST['email'];
$ens=new inscription();
$res=$ens->details_etudiant_by_email($email);
$nb=mysql_num_rows($res);
if($nb==1)
{
$obj_inscription=mysql_fetch_object($res);	
$email_inscription=$obj_inscription->adressemail;
$password=$obj_inscription->motpasse;
ini_set("sendmail_from","admin@yahoo.fr");
ini_set("SMTP","smtp.planet.tn");
if(mail($email,"Recuperation de votre mot de passe","Votre mot de passe est : $password"))
echo "mot de passe envoye";
else
echo "ERREUR!!";
}
else
echo 'Votre email est introuvable';

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <!-- Stylesheets -->
  <link href="style/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="style/font-awesome.css">
  <link href="style/style.css" rel="stylesheet">
  
  
  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="js/html5shim.js"></script>
  <![endif]-->

  <!-- Favicon -->
</head>

<body class="login">

<!-- Form area -->
<div class="admin-form">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <!-- Widget starts -->
            <div class="logo"><a href="index-2.html" class="navbar-brand"><span class="bold">Tapez Votre Email</span></a></div>
            <div class="widget">
              <!-- Widget head -->
              <div class="widget-head">
                  Sign In to your Account
              </div>

              <div class="widget-content">
                <div class="padd">
                  <!-- Login form -->
                  <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <!-- Email -->
                    <div class="form-group">
                        <i class="icon-user"></i>
                        <input type="text" class="form-control" id="inputEmail" placeholder="Votre Email" name="email">
                    </div>
                    <!-- Password --><!-- Remember me checkbox and sign in button -->
                      <div class="form-actions">
                          
                          <button class="submit btn btn-primary pull-right" type="submit">
                              Envoyer
                              <i class="icon-angle-right"></i>
                          </button>
                      </div>
                    <br />
                  </form>
				  
				</div>
              </div>
              
                
            </div>
          
      </div>
    </div>
  </div> 
</div>
	
		

<!-- JS -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
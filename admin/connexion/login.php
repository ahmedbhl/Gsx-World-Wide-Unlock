

 <?php 

	 
	session_start();

require("../../classes/session.class.php");
$session=new session();

  ?> 
<html>
<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type: text/html; charset=iso-8859-1"/>
  

  <title>Login Form</title>

<LINK REL=StyleSheet HREF="../../css/style_login.css" TYPE="text/css" MEDIA=screen>

<meta name="robots" content="noindex,follow" />

</head>

<body> 

  <div class="container">

 

    <div class="login">

      <h1>Login to App</h1>

	  <div id="login_error">

	    	 <?php echo $session->msg_log();  ?>

			</div>

      <form method="post" action="identification__action.php">

	



        <p><input type="text" name="id_log" value="" placeholder="Identifiant"></p>

        <p><input type="password" name="pswd" value="" placeholder="Mot De Passe"></p>

        <p class="remember_me">

          <label>

            <input type="checkbox" name="remember_me" id="remember_me">

           Mémoriser connexion membre 

          </label>

        </p>

        <p class="submit"><input type="submit" name="commit" value="connexion"></p>

      </form>

    </div>



    <div class="login-help">

      <p>Mot de passe oublié? <a href="activation.php">Cliquez ici pour le réinitialiser.</a>.</p>
	<p><a href="inscri.php">Insription </a></p>


    </div>

  </div>

</body>

</html>


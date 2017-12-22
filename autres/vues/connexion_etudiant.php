<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>Register</title>
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

<body>

<div class="admin-form">
  <div class="container">
    <div class="row">
    <img src="img/etudiante.jpg" width="538" height="223" align="top"/>
      <div class="col-lg-12">
        <!-- Widget starts -->
        <div class="logo"><a href="connexion_etudiant.php" class="navbar-brand"><span class="bold">AUthentification</span></a></div>
          <div class="widget">
              <!-- Widget head -->
              <div class="widget-head">
                  Connexion
              </div>

              <div class="widget-content">
                  <div class="padd">
                      <!-- Login form -->
                      <form class="form-horizontal" action="../controlleurs/inscription_control.php?action=inscription" method="post">
                          <!-- Name -->
                          
                        <!-- Email -->
                          <div class="form-group">
                              <i class="icon-male"></i>
                              <input name="login" type="text" class="form-control" id="inputEmail" placeholder="Nom d'utilisateur">
                          </div>
                          <!-- User Name -->
                          
                        <!-- Password -->
                          <div class="form-group">
                              <i class="icon-lock"></i>
                              <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
                          </div>
                          <!-- Select box -->
                          
                          <!-- Remember me checkbox and sign in button -->
                          <div class="form-actions">
                             
                             <div class="pull-right" style="margin-left:10px;">
                                  <button class="submit btn btn-success" type="submit">
                                     Se Connecter >
                                  </button>
                              </div>
                              
                              <div class="pull-right">
                                  <button class="submit btn btn-success" type="submit">
                                     <a href="etudiant/inscription_etudiant.php"> S'inscrire > </a> 
                                  </button>
                              </div>
                          </div>
                          <br />
                      </form>

                  </div>
              </div>

              <div class="widget-foot">
                  Mot de passe oublié? <a href="pass_oublie.php">cliquez içi</a>
              </div>
          </div>
      </div>
    </div>
  </div> 
</div>
	
		

<!-- JS -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
    /* Add class for padding in Safari to select */
    /*
     var is_chrome = navigator.userAgent.indexOf('Chrome') > -1;
     var is_explorer = navigator.userAgent.indexOf('MSIE') > -1;
     var is_firefox = navigator.userAgent.indexOf('Firefox') > -1;
     var is_safari = navigator.userAgent.indexOf("Safari") > -1;
     var is_Opera = navigator.userAgent.indexOf("Presto") > -1;
     if ((is_chrome)&&(is_safari)) {is_safari=false;}
     */
    if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
        $(document).ready(function(){
            var myelem = $('select.form-control');
            myelem.addClass('f-select');
        });
    }
    else {}
</script>
</body>
</html>
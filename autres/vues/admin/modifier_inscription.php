<?php
require_once("../../connexion/connexion.php");
require_once("../../classes/inscription.php");
?>
<?php 
if(!isset($_SESSION))
session_start();
if(!isset($_SESSION['admin']))
echo "<script> window.location='connexion_admin.php';</script>";
?>

<?php
if(isset($_GET['id_etud']))
$id_etud=$_GET['id_etud'];
$inscrit=new inscription();
$res=$inscrit->details_etudiant($id_etud);
var_dump($res);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>Forms - Admination</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">


  <!-- Stylesheets -->
  <link href="../style/bootstrap.css" rel="stylesheet">
  <!-- Font awesome icon -->
  <link rel="stylesheet" href="../style/font-awesome.css"> 
  <!-- jQuery UI -->
  <link rel="stylesheet" href="../style/jquery-ui.css"> 
  <!-- Calendar -->
  <link rel="stylesheet" href="../style/fullcalendar.css">
  <!-- prettyPhoto -->
  <link rel="stylesheet" href="../style/prettyPhoto.css">   
  <!-- Star rating -->
  <link rel="stylesheet" href="../style/rateit.css">
  <!-- Date picker -->
  <link rel="stylesheet" href="../style/bootstrap-datetimepicker.min.css">
  <!-- jQuery Gritter -->
  <link rel="stylesheet" href="../style/jquery.gritter.css">
  <!-- CLEditor -->
  <link rel="stylesheet" href="../style/jquery.cleditor.css"> 
  <!-- Bootstrap toggle -->
  <link rel="stylesheet" href="../style/bootstrap-switch.css">
    <!-- Horizontal scroll -->
    <link href="../style/jquery.horizontal.scroll.css" rel="stylesheet">
    <!-- Main stylesheet -->
  <link href="../style/style.css" rel="stylesheet">
  <!-- Widgets stylesheet -->
  <link href="../style/widgets.css" rel="stylesheet">
    <!-- Slim slidebar stylesheet -->
    <link href="../style/slim_style.css" rel="stylesheet">
  
  
  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="js/html5shim.js"></script>
  <![endif]-->

  <!-- Favicon -->
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">

<div class="containerk">
<!-- Menu button for smallar screens -->
<div class="navbar-header">
    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a href="../index-2.html" class="navbar-brand"><span class="bold">Admination</span></a></div>
<!-- Site name for smallar screens -->


<!-- Navigation starts -->
<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">

<!-- System Links -->
<ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
    
    
</ul>

<!-- Notifications -->
<ul class="nav navbar-nav navbar-right">

    <!-- Comment button with number of latest comments count -->
    <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
            <i class="icon-warning-sign"></i><span   class="badge">6</span>
        </a>

        <ul class="dropdown-menu extended notification">
            <li class="title">
                <p>You have 5 new notifications</p>
            </li>
            <li>
                <a href="#">
                            <span class="label label-success">
                                <i class="icon-plus"></i>
                            </span>
                    <span class="message">New user registration.</span>
                    <span class="time">1 mins</span>
                </a>
            </li>
            <li>
                <a href="#">
                            <span class="label label-danger">
                                <i class="icon-warning-sign"></i>
                            </span>
                    <span class="message">High CPU load on cluster #2.</span>
                    <span class="time">5 mins</span>
                </a>
            </li>
            <li>
                <a href="#">
                            <span class="label label-success">
                                <i class="icon-plus"></i>
                            </span>
                    <span class="message">New user registration.</span>
                    <span class="time">10 mins</span>
                </a>
            </li>
            <li>
                <a href="#">
                            <span class="label label-info">
                                <i class="icon-bullhorn"></i>
                            </span>
                    <span class="message">New items are in queue.</span>
                    <span class="time">25 mins</span>
                </a>
            </li>
            <li>
                <a href="#">
                            <span class="label label-warning">
                                <i class="icon-bolt"></i>
                            </span>
                    <span class="message">Disk space to 85% full.</span>
                    <span class="time">55 mins</span>
                </a>
            </li>
            <li class="footer">
                <a href="#">View all notifications</a>
            </li>
        </ul>
    </li>

    <!-- Message button with number of latest messages count-->
    <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
            <i class="icon-envelope-alt"></i><span class="badge">6</span>
        </a>

        <ul class="dropdown-menu extended notification">
            <li class="title">
                <p>You have 3 new messages</p>
            </li>
            <li>
                <a href="#">
                            <span class="photo">
                              <img alt="" src="../img/user.jpg">
                            </span>
                            <span class="subject">
                                <span class="from">Bob Carter</span>
                                <span class="time">Just Now</span>
                            </span>
                    <span class="text"> Consetetur sadipscing elitr... </span>
                </a>
            </li>
            <li>
                <a href="#">
                            <span class="photo">
                             <img alt="" src="../img/user.jpg">
                            </span>
                            <span class="subject">
                              <span class="from">Jane Doe</span>
                               <span class="time">45 mins</span>
                            </span>
                    <span class="text"> Sed diam nonumy... </span>
                </a>
            </li>
            <li>
                <a href="#">
                            <span class="photo">
                                <img alt="" src="../img/user.jpg">
                            </span>
                            <span class="subject">
                                <span class="from">Patrick Nilson</span>
                                <span class="time">6 hours</span>
                            </span>
                    <span class="text"> No sea takimata sanctus... </span>
                </a>
            </li>
            <li class="footer">
                <a href="#">View all messages</a>
            </li>
        </ul>
    </li>

    <!-- Tasks button with number of latest members count -->
    <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
            <i class="icon-tasks"></i><span   class="badge badge-success">4</span>
        </a>

        <ul class="dropdown-menu extended notification">
            <li class="title">
                <p>You have 7 pending tasks</p>
            </li>
            <li>
                <a href="#">
                            <span class="task">
                                <span class="desc">Preparing new release</span>
                                <span class="percent">30%</span>
                            </span>
                    <div class="progress progress-small">
                        <div class="progress-bar progress-bar-info" style="width: 30%;"></div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                            <span class="task">
                                <span class="desc">Change management</span>
                                <span class="percent">80%</span>
                            </span>
                    <div class="progress progress-small progress-striped active">
                        <div class="progress-bar progress-bar-danger" style="width: 80%;"></div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                            <span class="task">
                                <span class="desc">Mobile development</span>
                                <span class="percent">60%</span>
                            </span>
                    <div class="progress progress-small">
                        <div class="progress-bar progress-bar-success" style="width: 60%;"></div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                            <span class="task">
                                <span class="desc">Database migration</span>
                                <span class="percent">20%</span>
                            </span>
                    <div class="progress progress-small">
                        <div class="progress-bar progress-bar-warning" style="width: 20%;"></div>
                    </div>
                </a>
            </li>
            <li class="footer">
                <a href="#">View all tasks</a>
            </li>
        </ul>
    </li>

 

    <li class="dropdown">
        
    </li>
    <!-- Profile Links -->
    <li class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <i class="icon-male"></i>
            <span class="username">Admin</span>
            <b class="caret"></b>
        </a>
        <!-- Dropdown menu -->
        <ul class="dropdown-menu">
            
            <li><a href="connexion_admin.php"><i class="icon-off"></i> Deconnecter</a></li>
        </ul>
    </li>
</ul>

</nav>

</div>

<!-- Projects Drop Down -->
<div class="pdd">
    <ul id="horiz_container_outer" class="container" >
        <li id="horiz_container_inner">
            <ul id="horiz_container" style="width: 2715px;">
                <li>
                    <a href="#">
                                <span class="image">
                                   <i class="icon-desktop"></i>
                                </span>
                        <span class="title">Lorem ipsum dolor</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                                <span class="image">
                                 <i class="icon-compass"></i>
                                </span>
                        <span class="title">Dolor sit invidunt</span>
                    </a>
                </li>
                <li class="current">
                    <a href="#">
                                <span class="image">
                                 <i class="icon-male"></i>
                                </span>
                        <span class="title">Consetetur sadipscing elitr</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                                <span class="image">
                                 <i class="icon-thumbs-up"></i>
                                </span>
                        <span class="title">Sed diam nonumy</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                                <span class="image">
                                  <i class="icon-female"></i>
                                </span>
                        <span class="title">At vero eos et</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                                <span class="image">
                                 <i class="icon-beaker"></i>
                                </span>
                        <span class="title">Sed diam voluptua</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                                <span class="image">
                                  <i class="icon-desktop"></i>
                                </span>
                        <span class="title">Lorem ipsum dolor</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                                <span class="image">
                                 <i class="icon-compass"></i>
                                </span>
                        <span class="title">Dolor sit invidunt</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                                <span class="image">
                                  <i class="icon-male"></i>
                                </span>
                        <span class="title">Consetetur sadipscing elitr</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                                <span class="image">
                                 <i class="icon-thumbs-up"></i>
                                </span>
                        <span class="title">Sed diam nonumy</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                                <span class="image">
                                  <i class="icon-female"></i>
                                </span>
                        <span class="title">At vero eos et</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                                <span class="image">
                                 <i class="icon-beaker"></i>
                                </span>
                        <span class="title">Sed diam voluptua</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <div id="scrollbar" class="container">
        <div id="track">
            <div id="dragBar"></div>
        </div>
    </div>
</div>
</div>


<!-- Main content starts -->

<div class="content">

    <!-- Sidebar -->
    <div class="sidebar sidebar-fixed">
        

        <div class="sidebar-inner">



            <!-- Search form -->
            

            <!--- Sidebar navigation -->
            <!-- If the main navigation has sub navigation, then add the class "has_submenu" to "li" of main navigation. -->
            <ul class="navi">
            <img src="../img/icone_edit.ico">
            </ul>


            <!-- Notifications -->

            
            

        </div>
    </div>
    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">

        <!-- Page heading -->
        <div class="page-head">
            <!-- Page heading -->
            <!-- Breadcrumb -->
          <div class="bread-crumb">
                <a href="accueil_admin.php"><i class="icon-home"></i> Acceuil</a>
                <!-- Divider -->
                <a href="gestion_etudiants.php"><span class="divider">></span>gestion_etudiants</a></div>

            <ul class="crumb-buttons">
              <li class="range">
                  <a href="../calendar.html">
                      <i class="icon-calendar"></i>
                      <span><?php echo date('Y-m-d H:m:s')?></span>
                  </a>
                </li>
            </ul>
            <div class="clearfix"></div>

        </div>
        <!-- Page heading ends -->

	    <!-- Matter -->

	    <div class="matter">
        <div class="container">

          <div class="row">

            <div class="col-md-12">
                <!-- Page header start -->
                <div class="page-header">
                    <div class="page-title">
                        <h3>Modifier les informations</h3>
                    </div>
</div>
                <!-- Page header ends -->


              <div class="widget boxed">
                
                <div class="widget-head">
                  <h4 class="pull-left"><i class="icon-reorder"></i>Formulaire</h4>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">

                    <!-- Form starts.  -->
                     <?php $obj=mysql_fetch_object($res);?>
                     <form class="form-horizontal" role="form" action="../../controlleurs/inscription_control.php?action=modifier_etud" enctype="multipart/form-data" method="post">
                              
                                
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Nom</label>
                                  <div class="col-lg-8">
                                    <input name="nom" type="text" class="form-control" value="<?= $obj->nom?>">
                                  </div>
                                </div>
                                
                                    <div class="form-group">
                                  <label class="col-lg-4 control-label">Prenom</label>
                                  <div class="col-lg-8">
                                    <input name="prenom" type="text" class="form-control" value="<?= $obj->prenom?>">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Email</label>
                                  <div class="col-lg-8">
                                    <input name="email" type="text" class="form-control" placeholder="Input Box" value="<?= $obj->adressemail?>">
                                  </div>
                                </div>
                                
                                <div class="form-group">
<label class="col-lg-4 control-label">Telephone</label>                                  <div class="col-lg-8">
                                    <input name="telephone" type="text" class="form-control" value="<?= $obj->telephone;?>">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Status</label>
                                  <div class="col-lg-8">
                                   <select name="statuss">
                                   <option value="1"
                                   <?php if($obj->status==1 ) { echo "selected=selected"; }?>
                                   >Active</option>
                                   <option value="0" <?php if($obj->status==0 ) { echo "selected=selected" ;}?>>Non active</option>
                                   </select> 
                                  </div>
                                </div>
                                
                                

                                <input type="hidden" value="<?php echo $obj->idinscrit; ?>" name="id">
                                <input type="submit" value="Modifier"/>
                                
                                  
                                
                              </form>
                  </div>
                </div>
              </div>

            </div>

          </div>

        </div>
		  </div>

		<!-- Matter ends -->

    </div>

   <!-- Mainbar ends -->	    	
   <div class="clearfix"></div>

</div>
<!-- Content ends -->

<!-- Notification box starts -->
   

<!-- Notification box ends -->  

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 

<!-- JS -->
<script src="../js/jquery.js"></script> <!-- jQuery -->
<script src="../js/bootstrap.js"></script> <!-- Bootstrap -->
<script src="../js/jquery-ui-1.10.2.custom.min.js"></script> <!-- jQuery UI -->
<script src="../js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
<script src="../js/jquery.rateit.min.js"></script> <!-- RateIt - Star rating -->
<script src="../js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->

<!-- jQuery Flot -->
<script src="../js/excanvas.min.js"></script>
<script src="../js/jquery.flot.js"></script>
<script src="../js/jquery.flot.resize.js"></script>
<script src="../js/jquery.flot.pie.js"></script>
<script src="../js/jquery.flot.stack.js"></script>

<script src="../js/jquery.gritter.min.js"></script> <!-- jQuery Gritter -->
<script src="../js/sparklines.js"></script> <!-- Sparklines -->
<script src="../js/jquery.cleditor.min.js"></script> <!-- CLEditor -->
<script src="../js/bootstrap-datetimepicker.min.js"></script> <!-- Date picker -->
<script src="../js/bootstrap-switch.min.js"></script> <!-- Bootstrap Toggle -->
<script src="../js/filter.js"></script> <!-- Filter for support page -->
<script src="../js/custom.js"></script> <!-- Custom codes -->
<script src="../js/charts.js"></script> <!-- Custom chart codes -->
<script src="../js/jquery.mousewheel.js"></script> <!-- Mouse Wheel -->
<script src="../js/jquery.horizontal.scroll.js"></script> <!-- horizontall scroll with mouse wheel -->
<script type="text/javascript" src="../js/jquery.slimscroll.min.js"></script> <!-- vertical scroll with mouse wheel -->

</body>
</html>
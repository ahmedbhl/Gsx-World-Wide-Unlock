<?php
require_once('../connexion/connexion.php');
require_once('../classes/categorie.php');
require_once('../classes/cours.php');
require_once('../classes/documents.php');
require_once('../classes/inscription.php');
?>
<?php 
if(!isset($_SESSION))
session_start();
if(!isset($_SESSION['etudiant']))
echo "<script> window.location='connexion_etudiant.php';</script>";

?>
<?php

$categ=new Categorie();
$res=$categ->liste_categ();
$cour=new Cours();
//$cour->liste_cour_by_categ();
$document=new Documents();
if(isset($_GET['id_cours']))
{
	
$res3=$document->liste_document($_GET['id_cours']); // resultat de la table documents

}

?>
<?php
/////CODE PAGINATION
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_liste_documents = 3;
$pageNum_liste_documents = 0;
if (isset($_GET['pageNum_liste_documents'])) {
  $pageNum_liste_documents = $_GET['pageNum_liste_documents'];
}
$startRow_liste_documents = $pageNum_liste_documents * $maxRows_liste_documents;

$res_total_row=$document->liste_documents_existant($startRow_liste_documents,$maxRows_liste_documents);

if (isset($_GET['totalRows_liste_documents'])) {
  $totalRows_liste_documents = $_GET['totalRows_liste_documents'];
} else {
  $all_liste_documents =$document->liste_documents_existant_total();
  $totalRows_liste_documents = mysql_num_rows($all_liste_documents);
}
$totalPages_liste_documents = ceil($totalRows_liste_documents/$maxRows_liste_documents)-1;

$queryString_liste_documents = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_liste_documents") == false && 
        stristr($param, "totalRows_liste_documents") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_liste_documents = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_liste_documents = sprintf("&totalRows_liste_documents=%d%s", $totalRows_liste_documents, $queryString_liste_documents);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>Students </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">


  <!-- Stylesheets -->
  <link href="style/bootstrap.css" rel="stylesheet">
  <!-- Font awesome icon -->
  <link rel="stylesheet" href="style/font-awesome.css"> 
  <!-- jQuery UI -->
  <link rel="stylesheet" href="style/jquery-ui.css"> 
  <!-- Calendar -->
  <link rel="stylesheet" href="style/fullcalendar.css">
  <!-- prettyPhoto -->
  <link rel="stylesheet" href="style/prettyPhoto.css">   
  <!-- Star rating -->
  <link rel="stylesheet" href="style/rateit.css">
  <!-- Date picker -->
  <link rel="stylesheet" href="style/bootstrap-datetimepicker.min.css">
  <!-- jQuery Gritter -->
  <link rel="stylesheet" href="style/jquery.gritter.css">
  <!-- CLEditor -->
  <link rel="stylesheet" href="style/jquery.cleditor.css"> 
  <!-- Bootstrap toggle -->
  <link rel="stylesheet" href="style/bootstrap-switch.css">
    <!-- Horizontal scroll -->
    <link href="style/jquery.horizontal.scroll.css" rel="stylesheet">
    <!-- Main stylesheet -->
  <link href="style/style.css" rel="stylesheet">
  <!-- Widgets stylesheet -->
  <link href="style/widgets.css" rel="stylesheet">
    <!-- Slim slidebar stylesheet -->
    <link href="style/slim_style.css" rel="stylesheet">
  
  
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
    <a href="interface_etudiant.php" class="navbar-brand"><span class="bold">STUDENTS</span></a></div>
<!-- Site name for smallar screens -->


<!-- Navigation starts -->
<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">

<!-- System Links -->


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
                              <img alt="" src="img/user.jpg">
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
                             <img alt="" src="img/user.jpg">
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
                                <img alt="" src="img/user.jpg">
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
       
            <span class="username">Utilisateurs</span>
            <b class="caret"></b>
        </a>
        <!-- Dropdown menu -->
        <ul class="dropdown-menu">
          
           
            <li><a href="connexion_etudiant.php"><i class="icon-off"></i> Deconnecter</a></li>
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
        <div class="sidebar-dropdown"><a href="#">	Navigation</a></div>

        <div class="sidebar-inner">



            <!-- Search form -->
            <div class="sidebar-widget">
               
                <div class="sidebar-search-results">
                    <i class="icon-remove close"></i>
                    <div class="title"> Documents </div>
                    <ul class="notifications">
                        <li>
                            <a href="javascript:void(0);">
                                <div class="col-left">
                                    <span class="label label-info">
                                          <i class="icon-file-text"></i>
                                    </span>
                                </div>
                                <div class="col-right with-margin">
                                        <span class="message">
                                           <strong>John Doe</strong> received $1.527,32
                                        </span>
                                    <span class="time">finances.xls</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="col-left">
                                    <span class="label label-success">
                                         <i class="icon-file-text"></i>
                                    </span>
                                </div>
                                <div class="col-right with-margin">
                                        <span class="message">
                                            My name is <strong>John Doe</strong> ...
                                        </span>
                                    <span class="time">briefing.docx</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="title"> Persons </div>
                    <ul class="notifications">
                        <li>
                            <a href="javascript:void(0);">
                                <div class="col-left">
                                    <span class="label label-danger">
                                      <i class="icon-female"></i>
                                    </span>
                                </div>
                                <div class="col-right with-margin">
                                        <span class="message">
                                            Jane <strong>Doe</strong>
                                        </span>
                                    <span class="time">21 years old</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!--- Sidebar navigation -->
            <!-- If the main navigation has sub navigation, then add the class "has_submenu" to "li" of main navigation. -->
            <ul class="navi">

                <!-- Use the class nred, ngreen, nblue, nlightblue, nviolet or norange to add background color. You need to use this in <li> tag. -->

                <li class="current"><a href=""<i class="icon-desktop"></i>Categorie Cours</a></li>

                <?php while ($obj1=mysql_fetch_object($res)){ ?>
                
                <li class="has_submenu">
                    <a href="#">
                        <i class="icon-file-alt"></i> <?php echo $obj1->libelle_categ;?>
                    </a>
					
                    <ul>
                      <?php
					  	$res2=$cour->liste_cour_by_categ($obj1->id_categ);
						
					   		while($obj2=mysql_fetch_object($res2)){?>
                        	<li><a href="interface_etudiant.php?action=cours&id_cours=<?php echo $obj2->id_cours;?>"><?php echo $obj2->nom_cours;?></a></li>
                       	<?php }?>
                       
                    </ul>
                </li>
				<?php }?>
                

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
                <a href="interface_etudiant.php"><i class="icon-home"></i> Acceuil</a>
                <!-- Divider -->
                <span class="divider">></span>
                <a href="#" class="bread-current"></a>
            </div>

            <ul class="crumb-buttons">
                
                <li class="dropdown">
                    <a data-toggle="dropdown" title="" href="#">
                        <i class="icon-tasks"></i>
                            <span>
                                Users <strong>(+<?php $ip = $_SERVER['REMOTE_ADDR'];
$where = $_SERVER['REQUEST_URI'];
$timestamp = time();
$timeout = 300;
$noofrows = 0;

$result1 = mysql_query("SELECT * FROM enseignantsonline");
while ($result2 = mysql_fetch_array($result1)) {
	if ($result2[1] == $ip) {
		$noofrows = 1;
	}
}

if ($noofrows == 1) {
	mysql_query("UPDATE enseignantsonline SET timestamp = '$timestamp', url = '$where' WHERE ip = '$ip'");
}

if ($noofrows == 0) {
	mysql_query("INSERT INTO enseignantsonline (ip, timestamp, url) VALUES ('$ip', '$timestamp', '$where')");
}

$alt = $timestamp-$timeout;
mysql_query("DELETE FROM enseignantsonline WHERE timestamp < '$alt'");

$result3 = mysql_query("SELECT DISTINCT ip FROM enseignantsonline");
$online = mysql_numrows($result3);

if ($online == 1) {
	echo "$online user online";
} else {
	echo "$online users online";
}
?>
)</strong>
                            </span>
                        <i class="icon-angle-down left-padding"></i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a title="" href="form_components.html">
                                <i class="icon-plus"></i>
                                Add new User
                            </a>
                        </li>
                        <li>
                            <a title="" href="tables_dynamic.html">
                                <i class="icon-reorder"></i>
                                Overview
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="range">
                    <a href="">
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

          <!-- Today status. jQuery Sparkline plugin used. -->

          <div class="row">
            <div class="col-md-12">
                <!-- Page header start -->
                <div class="page-header">
                    <div class="page-title">
                        <h3>Categorie Cours</h3>
                        
                    </div>
                    
                </div>
                <!-- Page header ends -->
            </div>
          </div>

			<?php if(isset($_GET['action']) && $_GET['action']=='cours' && isset($_GET['id_cours'])):?>
                       
          <div class="widget boxed">
                <div class="widget-head">
                  <h4 class="pull-left"><i class="icon-youtube-play"></i>Media</h4>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content medias">
                  
                  <table class="table table-bordered table-hover table-striped ">
                      <thead>
                        <tr>
                          <th>
                          </th>
                          <th>id doc</th>
                          <th>Media</th>
                          <th>Nom Cour</th>
                          <th>Format Doc</th>
                          <th>Resume</th>
                          <th>Date Insertion</th>
                          <th>Etat</th>
                          <th>Type</th>
                        </tr>
                      </thead>
                      <tbody>
<?php 
while($obj_doc=mysql_fetch_object($res3))
{
?>
                        <tr>
                          <td>                  
                              <input type="checkbox" value="check1">
                          </td>
                          <td><?php echo $obj_doc->id_doc ;?></td>
                          <td><img src="img/user.jpg" alt=""></td>
                          <td><a href=""><?= $obj_doc->libelle_doc ?></a></td>
                          <td><a href="img/cours/<?php echo $obj_doc->fichier;?>"><img src="img/<?php echo $obj_doc->format_doc.'.jpg' ;?>"></a></td>
                          <td><?= $obj_doc->resume_doc ?></td>
                          <td><?= $obj_doc->date_insertion;?></td>
                          <td><?= $obj_doc->etat_doc; ?></td>
                          <td><?= $obj_doc->type; ?></td>
                        </tr>                                                            <?php }?>

                      </tbody>
                    </table>

                </div>

                    <div class="widget-foot">

                      <div class="pull-left editorial"></div>

                     <table border="0" align="right">
  <tr>
    <td><?php if ($pageNum_liste_documents > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_liste_documents=%d%s", $currentPage, 0, $queryString_liste_documents); ?>"><img src="First.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_liste_documents > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_liste_documents=%d%s", $currentPage, max(0, $pageNum_liste_documents - 1), $queryString_liste_documents); ?>"><img src="Previous.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_liste_documents < $totalPages_liste_documents) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_liste_documents=%d%s", $currentPage, min($totalPages_liste_documents, $pageNum_liste_documents + 1), $queryString_liste_documents); ?>"><img src="Next.gif" /></a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_liste_documents < $totalPages_liste_documents) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_liste_documents=%d%s", $currentPage, $totalPages_liste_documents, $queryString_liste_documents); ?>"><img src="Last.gif" /></a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
                        
                      
                      <div class="clearfix"></div> 

                    </div>
          </div>
              <?php endif;?>
          <!-- Today status ends -->

          <!-- Dashboard Graph starts -->

          
          <!-- Dashboard graph ends -->

            

          <!-- Calendar and Logs -->
          

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
<script src="js/jquery.js"></script> <!-- jQuery -->
<script src="js/bootstrap.js"></script> <!-- Bootstrap -->
<script src="js/jquery-ui-1.10.2.custom.min.js"></script> <!-- jQuery UI -->
<script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
<script src="js/jquery.rateit.min.js"></script> <!-- RateIt - Star rating -->
<script src="js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->

<!-- jQuery Flot -->
<script src="js/excanvas.min.js"></script>
<script src="js/jquery.flot.js"></script>
<script src="js/jquery.flot.resize.js"></script>
<script src="js/jquery.flot.pie.js"></script>
<script src="js/jquery.flot.stack.js"></script>

<script src="js/jquery.gritter.min.js"></script> <!-- jQuery Gritter -->
<script src="js/sparklines.js"></script> <!-- Sparklines -->
<script src="js/jquery.cleditor.min.js"></script> <!-- CLEditor -->
<script src="js/bootstrap-datetimepicker.min.js"></script> <!-- Date picker -->
<script src="js/bootstrap-switch.min.js"></script> <!-- Bootstrap Toggle -->
<script src="js/filter.js"></script> <!-- Filter for support page -->
<script src="js/custom.js"></script> <!-- Custom codes -->
<script src="js/charts.js"></script> <!-- Custom chart codes -->
<script src="js/jquery.mousewheel.js"></script> <!-- Mouse Wheel -->
<script src="js/jquery.horizontal.scroll.js"></script> <!-- horizontall scroll with mouse wheel -->
<script type="text/javascript" src="js/jquery.slimscroll.min.js"></script> <!-- vertical scroll with mouse wheel -->

<!-- Script for this page -->
<script type="text/javascript">
$(function () {

    /* Bar Chart starts */

    var d1 = [];
    for (var i = 0; i <= 30; i += 1)
        d1.push([i, parseInt(Math.random() * 30)]);

    var d2 = [];
    for (var i = 0; i <= 30; i += 1)
        d2.push([i, parseInt(Math.random() * 30)]);


    var stack = 0, bars = true, lines = false, steps = false;
    
    function plotWithOptions() {
        $.plot($("#bar-chart"), [ d1, d2 ], {
            series: {
                stack: stack,
                lines: { show: lines, fill: true, steps: steps },
                bars: { show: bars, barWidth: 0.8 }
            },
            grid: {
                borderWidth: 0, hoverable: true, color: "#777"
            },
            colors: ["#52b9e9", "#0aa4eb"],
            bars: {
                  show: true,
                  lineWidth: 0,
                  fill: true,
                  fillColor: { colors: [ { opacity: 0.9 }, { opacity: 0.8 } ] }
            }
        });
    }

    plotWithOptions();
    
    $(".stackControls input").click(function (e) {
        e.preventDefault();
        stack = $(this).val() == "With stacking" ? true : null;
        plotWithOptions();
    });
    $(".graphControls input").click(function (e) {
        e.preventDefault();
        bars = $(this).val().indexOf("Bars") != -1;
        lines = $(this).val().indexOf("Lines") != -1;
        steps = $(this).val().indexOf("steps") != -1;
        plotWithOptions();
    });

    /* Bar chart ends */

});


/* Curve chart starts */

$(function () {
    var sin = [], cos = [];
    for (var i = 0; i < 14; i += 0.5) {
        sin.push([i, Math.sin(i)]);
        cos.push([i, Math.cos(i)]);
    }

    var plot = $.plot($("#curve-chart"),
           [ { data: sin, label: "sin(x)"}, { data: cos, label: "cos(x)" } ], {
               series: {
                   lines: { show: true, 
                            fill: true,
                            fillColor: {
                              colors: [{
                                opacity: 0.05
                              }, {
                                opacity: 0.01
                              }]
                          }
                  },
                   points: { show: true }
               },
               grid: { hoverable: true, clickable: true, borderWidth:0 },
               yaxis: { min: -1.2, max: 1.2 },
               colors: ["#fa3031", "#54728C"]
             });


    function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css( {
            position: 'absolute',
            display: 'none',
            top: y + 5,
            width: 100,
            left: x + 5,
            border: '1px solid #000',
            padding: '2px 8px',
            color: '#ccc',
            'background-color': '#000',
            opacity: 0.9
        }).appendTo("body").fadeIn(200);
    }

    var previousPoint = null;
    $("#curve-chart").bind("plothover", function (event, pos, item) {
        $("#x").text(pos.x.toFixed(2));
        $("#y").text(pos.y.toFixed(2));

            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;
                    
                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);
                    
                    showTooltip(item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
                }
            }
            else {
                $("#tooltip").remove();
                previousPoint = null;            
            }
    }); 

    $("#curve-chart").bind("plotclick", function (event, pos, item) {
        if (item) {
            $("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
            plot.highlight(item.series, item.datapoint);
        }
    });

});

/* Curve chart ends */
</script>

</body>
</html>
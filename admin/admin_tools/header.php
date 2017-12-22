<!DOCTYPE html>

<html lang="en">



<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta charset="utf-8">

  <!-- Title and other stuffs -->

  <title>Accueil</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="">

  <meta name="keywords" content="">

  <meta name="author" content="">





  <!-- Stylesheets -->

  <link href="../../style/bootstrap.css" rel="stylesheet">

  <!-- Font awesome icon -->

  <link rel="stylesheet" href="../../style/font-awesome.css"> 

  <!-- jQuery UI -->

  <link rel="stylesheet" href="../../style/jquery-ui.css"> 

  <!-- Calendar -->

  <link rel="stylesheet" href="../../style/fullcalendar.css">

  <!-- prettyPhoto -->

  <link rel="stylesheet" href="../../style/prettyPhoto.css">   

  <!-- Star rating -->

  <link rel="stylesheet" href="../../style/rateit.css">

  <!-- Date picker -->

  <link rel="stylesheet" href="../../style/bootstrap-datetimepicker.min.css">

  <!-- jQuery Gritter -->

  <link rel="stylesheet" href="../../style/jquery.gritter.css">

  <!-- CLEditor -->

  <link rel="stylesheet" href="../../style/jquery.cleditor.css"> 

  <!-- Bootstrap toggle -->

  <link rel="stylesheet" href="../../style/bootstrap-switch.css">

    <!-- Horizontal scroll -->

    <link href="../../style/jquery.horizontal.scroll.css" rel="stylesheet">

    <!-- Main stylesheet -->

  <link href="../../style/style.css" rel="stylesheet">

  <!-- Widgets stylesheet -->

  <link href="../../style/widgets.css" rel="stylesheet">

    <!-- Slim slidebar stylesheet -->

    <link href="../../style/slim_style.css" rel="stylesheet">

    <link href="../../style/slim_style.css" rel="stylesheet">

  

  

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

    <a href="../../autres/index-2.html" class="navbar-brand"><span class="bold"></span></a></div>

<!-- Site name for smallar screens -->





<!-- Navigation starts -->

<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">



<!-- System Links -->



<ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">

   

    <li>

        <a href="accueil_admin_tools.php"> Accueil </a>

    </li>

       </ul>

<!-- Notifications -->

<ul class="nav navbar-nav navbar-right">



    <!-- Comment button with number of latest comments count -->

    



    <!-- Message button with number of latest messages count-->

    



    <!-- Tasks button with number of latest members count -->

    



    



    <li class="dropdown">

        

    </li>

    <!-- Profile Links -->

    <li class="dropdown">

        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

            <i class="icon-male"></i>

       

            <span class="username"><?php if(isset($_SESSION['nomadmintools']) && isset($_SESSION['prenomadmintools']) && isset($_SESSION['pseudoadmintools'])) {echo "M".' '.$_SESSION['nomadmintools'].' '.$_SESSION['prenomadmintools'];}else{echo "Mon Compte";} ?></span>

            <b class="caret"></b>

        </a>

        <!-- Dropdown menu -->

        <ul class="dropdown-menu">

          

           

             <li><a href="../connexion/deconnexion.php"><i class="icon-off"></i> Deconnecter</a></li>

        </ul>

    </li>

</ul>



</nav>

<!---End navigation-->



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



                <li class="current"><a href=""><i class="icon-desktop"></i>ADMIN Tools</a></li>



               

                

                <li class="has_submenu">

                    <a href="#"><i class="icon-file-alt"></i>Generate IMEI/SN</a>

					<ul>

                       	<li><a href="generateur_imei.php">Generate IMEI</a></li>

                       	<li><a href="generateur_sn.php">Generate SN</a></li>

		                    </ul>
</li>
					<li class="has_submenu">
					<a href="#"><i class="icon-file-alt"></i>CHECK IMEI/SN</a>

					<ul>

						<li><a href="full_check_imei_sn.php">Full Check IMEI /SN </a></li>

						<li><a href="check_model_icloud.php">Check Model/Icloud</a></li>

					</ul>
</li>
				

                               



            </ul>

            

            

<!--************************************************************End Menu****************-->

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

                <a href="accueil_admin_tools.php"><i class="icon-home"></i> Acceuil</a>

                <!-- Divider -->

                <span class="divider">></span>

                <a href="#" class="bread-current"></a>

            </div>



            <ul class="crumb-buttons">

                

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



      <div class="progress-bar-info">

        <div class="label-primary">



          <!-- Today status. jQuery Sparkline plugin used. -->



          <div class="row">

            <div class="col-md-12">

                <!-- Page header start -->

                <div class="page-header">

                    <div class="ui-state-default">

                        <h3>Compte : <?php print $_SESSION['pseudoadmintools'];  ?></h3>

                        

                    </div>

                    

                </div>

                <!-- Page header ends -->

            </div>

          </div>



			

                       

          <div class="widget boxed">

                <div class="widget-head">

                 

                  <div class="widget-icons pull-right">

                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 

                    <a href="#" class="wclose"><i class="icon-remove"></i></a>

                  </div>

                  <div class="clearfix"></div>

                </div>



                <div class="widget-content medias">

                

                

                 <div class="container">



          <!-- Today status. jQuery Sparkline plugin used. -->



          <div class="row">

            <div class="col-md-12">

                <!-- Page header start -->

                <div class="page-header"></div>

                <!-- Page header ends -->

            </div>

          </div>
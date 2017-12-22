<?php
session_start();

require("../../classes/client.php");

require("../../classes/connexion.php");



 if (isset($_SESSION['pseudo']) AND isset($_SESSION['pass']))

 {

$bdd=getconnexion();

$g=new client($bdd);

$g->set_pseudo($_SESSION['pseudo']);



//$id=$g->verif_num_compte($_REQUEST['num_compte']);





//**********************************************



	require 'header.php';

?>		





			

                       

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

                <div class="page-header">

                    <div class="page-title">

                        <h3>Consulte Votre Accueil</h3>

                       

                    </div>

                    

                </div>

                <!-- Page header ends -->

            </div>

          </div>



          <div class="row statistics">

              <div class="col-md-3 col-sm-6">

                  <ul class="today-datas">

                      <!-- List #1 -->

                      <li class="overall-datas">

                          <!-- Graph -->

                        <div class="pull-left visual bgreen"><i class="icon-user"></i></div>

                          <!-- Text -->

                          <div class="datas-text pull-right"><span style="font-size:15px;"  class="bold">INSERER IMEI</span></div>



                          <div class="clearfix"></div>

                      </li>

                      <li class="more-stats">

                          <a class="more" href="#">

                              Plus de details

                              <i class="pull-right icon-angle-right"></i>

                          </a>

                      </li>

                  </ul>

              </div>

              <div class="col-md-3 col-sm-6">

                  <ul class="today-datas">

                      <!-- List #1 -->

                      <li class="overall-datas">

                          <!-- Graph -->

                          <div class="pull-left visual bred"><i class="icon-user"></i></div>

                          <!-- Text -->

                          <div class="datas-text pull-right"> <span class="bold">FULL CHECK</span></div>



                          <div class="clearfix"></div>

                      </li>

                      <li class="more-stats">

                          <a class="more" href="#">

                              Plus de details

                              <i class="pull-right icon-angle-right"></i>

                          </a>

                      </li>

                  </ul>

              </div>

              <div class="col-md-3 col-sm-6">

                  <ul class="today-datas">

                      <li class="overall-datas">

                          <!-- Graph -->

                          <div class="pull-left visual bgreen"><i class="icon-group"></i></div>

                          <!-- Text -->

                          <div class="datas-text pull-right"> <span class="bold">Manage your history</span></div>



                          <div class="clearfix"></div>

                      </li>

                      <li class="more-stats">

                          <a class="more" href="#">

                              Plus de details

                              <i class="pull-right icon-angle-right"></i>

                          </a>

                      </li>

                  </ul>

              </div>

              <div class="col-md-3 col-sm-6"></div>

              

              <div class="col-md-3 col-sm-6"></div>

              <div class="col-md-3 col-sm-6"></div><div class="col-md-3 col-sm-6"></div>

          </div>

          

       

<?php

require'footer.php';

}

	else

	{

	print("<script type=\"text/javascript\">setTimeout('location=(\"../connexion/erreur.php\")' ,0);</script>");

		

	}

?>


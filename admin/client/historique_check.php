 <?php

session_start();

	if (isset($_SESSION['pseudo']) AND isset($_SESSION['pass'])) 

{

require'header.php';

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



          <?php







include "../../classes/connexion.php";

include "../../classes/client.php";





$bdd=getconnexion();

$g=new client($bdd);

$g->set_pseudo( $_SESSION['pseudo']);

$res=$g->liste_check();

if($res)

{

	$session=$g->check_credit($_SESSION['pseudo']);?>

	<input type="hidden" name="creditt" class="creditt" value="<?php print $session ?>">

	<div class="credit"><h3><?php if($session>0){ echo '

	YOUR CREDIT CHECK:'.$session;}else{ echo 'YOUR CREDIT CHECK Insufficient &nbsp;&nbsp;:&nbsp; '.$session;  } ?></h3></div><br><?php

	

	

	

	

	echo '<style="float;"><a href="javascript:window.print()" class="main_list_link">IMPRIMER CETTE PAGE</a><br><br>';

	$i=0;

?>	

	

	      

	  

	    <div class="widget boxed col-lg-8">



                <div class="widget-head">

                    <h4 class="pull-left"><i class="icon-reorder"></i>Liste des imei</h4>

                  <div class="widget-icons pull-right">

                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 

                    <a href="#" class="wclose"><i class="icon-remove"></i></a>

                  </div>

                  <div class="clearfix"></div>

                </div>



                  <div class="widget-content">



                    <table class="table">

                      <thead>

                        <tr>

                          <th>&nbsp;&nbsp;&nbsp;ID   </th>

                          <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IMEI</th>

                          <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date de loperation</th>

						  <th>Type Of Service</th>

                          <th>UNLOCKED</th>

                          </tr>

                      </thead>

 <?php

                   while ($row =mysql_fetch_array ($res))

					{ 

					$i++;

	?>

				      <tbody>



                       <tr>

<td><div align="center"><em><?php print $i; ?></em></div></td>

				<td><div align="center"><em><?php print $row['imei']; ?></em></div></td>

				 <td><div align="center"><em><?php print $row['date']; ?></em></div></td>

				  <td><div align="center"><em><?php print $row['type']; ?></em></div></td>

				<td><div align="center"><em><?php if($row['etat']==2){print "rejected"; }else if($row['etat']==0){ print "in process";} else if($row['etat']==1){print "Unlocked";}  ?></em></div></td>

				

						

</tr>                                                            



                      </tbody>

       <?php }?>               

                    </table>



                  </div>



              </div>

    

                	

<?php		

}

else

	{

		echo'Acunne operation pour cette compte' ;

		

	}

echo'</div>';



?>

          <!-- Today status. jQuery Sparkline plugin used. -->



          <div class="row">

            <div class="col-md-12">

                <!-- Page header start -->

                <div class="page-header"></div>

                <!-- Page header ends -->

            </div>

          </div>



          

          

          



       

<?php

require'footer.php';

}

	else

	{

	print("<script type=\"text/javascript\">setTimeout('location=(\"../connexion/erreur.php\")' ,0);</script>");

		

	}

?>

</body>

</html>
<?php
session_start();
if (isset($_SESSION['pseudo']) AND isset($_SESSION['pass']))
{
	require'header.php';
?>		


          <div class="row statistics">
         <div class="content">
<!--div id="main_navigation" class="color main-menu-->
<?php
			include "../../classes/connexion.php";
			include "../../classes/client.php";
			$bdd=getconnexion();
			$g=new client($bdd);
			$g->set_pseudo($_SESSION['pseudo']);
			
?>	

<!-- debut from-->
<LINK REL=StyleSheet HREF="../../css/style_generateur.css" TYPE="text/css" MEDIA=screen>

<div class="widget boxed">
                
                <div class="widget-head">
                  <h4 class="pull-left"><i class="icon-reorder"></i>Insert IMEI</h4>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">

                    <!-- Form starts.  -->
                    


<br>
<div class="clearfix"></div>
                     <form class="form-horizontal" role="form" action="insert_imei_action.php" method="post">
                              
                          <div class="form-group">
                                  <label class="col-lg-3">IMEI</label><br/>
                            <div class="col-lg-3">
							<input type="radio" name="type" value="Special">&nbsp;Speçial&nbsp;&nbsp;<br>
							 <input type="radio" name="type" value="ordinary">&nbsp;Ordinary
							 <input type="text" name="commentaire"  placeholder="Commentaire">

                             <textarea class="form-controls" placeholder="List Of IMEI" name="imei" rows="20" cols="35"></textarea>
									<!--<select><option>Speçial</option><option>Ordinary</option>-->
						        </div>
                                </div>
                                
<input type="submit" name="valider" value="valider">
</form>
                          <hr>
                     </form>
                  </div>
                </div>
              </div>

</div>
              <div class="col-md-3 col-sm-6"></div>
          </div>
         
          
        </div>
                </div>

              
<?php
require 'footer.php';
}
	else
	{
	
	print("<script type=\"text/javascript\">setTimeout('location=(\"../connexion/erreur.php\")' ,0);</script>");
		
	}
?>
</body>
</html>
<?php
require_once('../connexion/connexion.php');
require_once('../classes/categorie.php');
require_once('../classes/cours.php');

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

?>
<?php while ($obj1=mysql_fetch_object($res)){ ?>
                
                
                <?php echo $obj1->libelle_categ;?>
                
					
 
                      <?php
					  	$res2=$cour->liste_cour_by_categ($obj1->id_categ);
						
					   		while($obj2=mysql_fetch_object($res2)){?>
                        	<li><a href="error.html"><?php echo $obj2->nom_cours;?></a></li>
                       	<?php }?>
                       
                    
                
				<?php }?>
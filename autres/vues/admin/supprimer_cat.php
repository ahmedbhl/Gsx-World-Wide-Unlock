<?php
require_once("../../connexion/connexion.php");
require_once("../../classes/categorie.php");
?>
<?php 
if(!isset($_SESSION))
session_start();
if(!isset($_SESSION['admin']))
echo "<script> window.location='connexion_admin.php';</script>";

$id_categ=$_GET['id_categ'];
$cat=new Categorie();
$nb=$cat->supp_categ($id_categ);

if($nb==1)
{
echo "<script> alert('catgeorie a ete supprime avec succes');</script>";
echo "<script> window.location='supprimer_categorie.php';</script>";
}
else
{
echo "<script> alert('Vous essayer d\'attaquer la base');</script>";	
echo "<script> window.location='supprimer_categorie.php';</script>";	

}
?>
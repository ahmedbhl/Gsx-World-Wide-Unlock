<?php
require_once("../../connexion/connexion.php");
require_once("../../classes/documents.php");
?>
<?php 
if(!isset($_SESSION))
session_start();
if(!isset($_SESSION['admin']))
echo "<script> window.location='connexion_admin.php';</script>";

$id_cour=$_GET['id_cour'];
$doc=new Documents();
$nb=$doc->supprimer_document($id_cour);

if($nb==1)
{
echo "<script> alert('l\'Etudiant a ete supprime avec succes');</script>";
echo "<script> window.location='gestion_cours.php';</script>";
}
else
{
echo "<script> alert('Vous essayer d\'attaquer la base');</script>";	
echo "<script> window.location='gestion_cours.php';</script>";	

}
?>
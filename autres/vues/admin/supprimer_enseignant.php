<?php
require_once("../../connexion/connexion.php");
require_once("../../classes/enseignant.php");
?>
<?php 
if(!isset($_SESSION))
session_start();
if(!isset($_SESSION['admin']))
echo "<script> window.location='connexion_admin.php';</script>";

$id_etud=$_GET['id_etud'];
$ens=new Enseignant();
$nb=$ens->supprimer_enseignant($id_etud);

if($nb==1)
{
echo "<script> alert('l\'Enseignant a ete supprime avec succes');</script>";
echo "<script> window.location='gestion_enseignant.php';</script>";
}
else
{
echo "<script> alert('Vous essayer d\'attaquer la base');</script>";	
echo "<script> window.location='gestion_enseignant.php';</script>";

}
?>
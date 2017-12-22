<?php
if(!isset($_SESSION))
session_start();
$_SESSION['admin']=NULL;
unset($_SESSION['admin']);
echo "<script> window.location='connexion_admin.php';</script>";
?>
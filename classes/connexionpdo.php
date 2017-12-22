<?php
function getpdo()


{

 $bd=new PDO('mysql:host=localhost;dbname=igcjioxt_worldwide','root','');
return $bd ;

}

?>
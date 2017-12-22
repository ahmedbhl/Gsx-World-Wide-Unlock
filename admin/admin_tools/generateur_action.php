<?php
include "../../classes/class_gen.php";

$g=new genimei();
$g->sup();
$imei =$_REQUEST["imei"]; 
$nb =$_REQUEST["nb"];
$imei1 =$_REQUEST["imei"]; 
if(strlen($imei1)==14)
{
$imei=$imei1.$g->gen($imei);


print "<h4>The check digit from IMEI:".$imei."</h4>";
$g->write($imei);
}
else
{
for($i=0;$i<$nb;$i++)
{
	
if(strlen($imei1)<=13)
{
	$imei=$imei1.$i;
	$imei=$imei.$g->gen($imei);

	while(strlen($imei)!=15)
	{
		$imei=$imei.$g->gen($imei);
	}
}
else if(strlen($imei1)!=15)
{	
	while(strlen($imei)!=15)
	{
		$imei=$imei.$g->gen($imei);
	}
	
}
print "<h4>The check digit from IMEI:".$imei."</h4>";
$g->write($imei);
echo 1;
}

}







?>
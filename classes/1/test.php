<?php

require 'gsx.php';

$details = array (
	'apiMode'			=> 'production',
	'regionCode'			=> 'apac',
	'userId'			=> 'mrcarson2',
	'password'			=> 'Minimr2car!',
	'serviceAccountNo'		=> '0000677222',
	'languageCode'		=> 'en',
	'userTimeZone'		=> 'AEST' ,
	'returnFormat'		=> 'php' ,
);

$gsx = new GSX ( $details );
if(isset($gsx))
{
echo 'CONNECTED<br>';
$s=$gsx->lookup ( 'C39LXBYRFF9R' , 'warranty' );
$y=$gsx->part ( 'C39LXBYRFF9R' );
foreach($s as $row => $imei)
{
echo $row.'==>'.$imei.'<br>';
foreach($imei as $rows => $imeii)
{
echo $rows.'==>'.$imeii.'<br>';
}
}
}
else
{
echo 'NOT OK';
}


?>
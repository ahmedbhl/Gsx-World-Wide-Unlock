<?php


function getInstance($sold,$username,$pass)
{
require ("gsxlib.php");

$gsx = GsxLib::getInstance($sold,$username,$pass);

return $gsx;
}

?>
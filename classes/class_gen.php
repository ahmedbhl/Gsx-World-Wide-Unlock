<?php
class genimei{
private $_imei;

public function get_imei()
	{
		return $this->imei;
	}
	public function set_imei($i)
	{
	$this->imei = $i;
	}

//**************************************************//
/*FONCTION GENERATEUR DE CODE IMEI*/
//**************************************************//
public function gen($imei)
{
$lg=strlen($imei);
for ($i = 0; $i <=$lg; $i++)
	{
	$D[]=$imei[$i];
	}
$sumeven = 0;

for ($i = 1; $i <= $lg; $i=$i+2)
	{
	$sum = $D[$i]*2;
		
		if ($D[$i] > 4) {
			$sumS = (string)$sum;
			unset($splitt);
			for ($j = 0; $j <= 1; $j++) {
				$splitt[]=$sumS[$j];
				$sumeven = $sumeven + $splitt[$j];
			}
		} else {
			$sumeven = $sumeven + $sum;
		}
	}
$sumodd = 0;
$sum = 0;
for ($i = 0; $i <= ($lg-1); $i=$i+2)
	{
		$sum = $D[$i];
		$sumodd = $sumodd + $sum;
	}
$total = $sumodd + $sumeven;
$totalS = (string)$total;

for ($i = 0; $i <= 1; $i++)
	{
		$split[]=$totalS[$i];
	}	
if ($split[1] == 0) 
{
$chk=0;
} 
else
	{
    $split[0] = $split[0] + 1;
	$totalNew = $split[0]."0";
	$chk = $totalNew - $total;
	}
return($chk);
//return($imei);
}
//**************************************************//
//ecrire dans fichier texte
//**************************************************//
public function write($imei)
{

$monfichier = fopen('imei.txt', 'a+');
fputs($monfichier, $imei."\r\n"); 
fclose($monfichier);
}
//**************************************************//
 /* Fichier à supprimer */
//**************************************************//
 public function sup()
	{
		$fichier = 'imei.txt';
			if( file_exists ( $fichier))
					unlink( $fichier ) ;
					Alternative: 
					@unlink( $fichier ) ;
	}
}

?>
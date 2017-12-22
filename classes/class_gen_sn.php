<?php
class gensn
{
private $_imei;

public function get_tag1()
	{
		return $this->tag1;
	}
	public function set_tag1($i)
	{
	$this->tag1 = $i;
	}
public function get_tag2()
	{
		return $this->tag2;
	}
	public function set_tag2($i)
	{
	$this->tag2 = $i;
	}

//**************************************************//
/*FONCTION GENERATEUR DE CODE sn*/
//**************************************************//
public function gensn($i)
{
$handle = file('tag.txt');
foreach ($handle as $nb => $line)
 {
	$tag[]=$line;
}
return $tag[$i];

}

//**************************************************//
//ecrire dans fichier texte
//**************************************************//
public function write($imei)
{

$monfichier = fopen('sn.txt', 'a+');
fputs($monfichier, $imei."\r\n"); 
fclose($monfichier);
}
//**************************************************//
 /* Fichier à supprimer */
//**************************************************//
 public function sup()
	{
		$fichier = 'sn.txt';
			if( file_exists ( $fichier))
					unlink( $fichier ) ;
					Alternative: 
					@unlink( $fichier ) ;
	}
}

?>
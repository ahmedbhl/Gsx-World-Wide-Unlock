 <?php
 class gsx
 {
 private $_gsx;
 private $_sold;
 private $_username;
 private $_password;
 
 	public function gsx($bdd){
		$this->_bdd = $bdd;
	}
	public function set_sold($i){
	$this->_sold = $i;
	}
	public function get_sold(){
	return $this->_sold;
	}
	public function set_username($i){
	$this->_username = $i;
	}
	public function get_username(){
	return $this->_username;
	}
	public function set_pass($i){
	$this->_pass = $i;
	}
	public function get_pass(){
	return $this->_pass;
	}

public function add_gsx()
{
$req="insert into igcjioxt_worldwide.gsx (sold,username,pass,etat) value('$this->_sold','$this->_username','$this->_pass','0')";
$this->_bdd->requete($req);

}
public function get_gsx()
{
$req="select * from igcjioxt_worldwide.gsx where etat='0'";
$res =$this->_bdd->requete($req);
return $res;
}
public function gsx_desable($username)
{
$req="update igcjioxt_worldwide.gsx set etat='1' where username='$username'";
$this->_bdd->requete($req);
}
public function verif_etat($etat)
		{
			if($etat==0)
			{
			return('ACTIVER');
			}
			else
			{
			return('DESACTIVER');
			
			}	
		}
public function liste_gsx()
{
$req="select * from igcjioxt_worldwide.gsx ORDER BY etat";
$res=$this->_bdd->requete($req);
return $res;
}
 
 
 }
 ?>
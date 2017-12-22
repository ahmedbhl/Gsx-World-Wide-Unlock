<?php
class client
{
	private $_pseudo;
	private $_nom;
	private $_prenom;
	private $_mail;
	private $_pass ;
	private $_etat ;
	private $_msg;
	private $_imei;
	private $_commentaire;
	
	public function client($bdd){
		$this->_bdd = $bdd;
	}
	public function set_pseudo($i){
	$this->_pseudo = $i;
	}
	public function get_pseudo(){
	return $this->_pseudo;
	}
	public function set_nom($s){
	$this->_nom = $s;
	}
	public function get_nom(){
	return $this->_nom;
	}
	public function get_prenom(){
	return $this->_prenom;
	}
	public function set_prenom($s){
	$this->_prenom = $s;
	}
	public function get_pass(){
	return $this->_pass;
	}
	public function set_pass($s){
	$this->_pass = $s;
	}
	public function get_mail(){
	return $this->_mail;
	}
	public function set_mail($s){
	$this->_mail= $s;
	}
	public function get_etat(){
	return $this->_etat;
	}
	public function set_etat($s){
	$this->_etat= $s;
	}
	
	public function get_msg(){
	return $this->_msg;
	}
	public function set_msg($s){
	$this->_msg = $s;
	}
	public function get_imei(){
	return $this->_imei;
	}
	public function set_imei($s){
	$this->_imei = $s;
	}
	public function get_type(){
	return $this->_type;
	}
	public function set_type($s){
	$this->_type = $s;
	}
	public function get_date(){
	return $this->_date;
	}
	public function set_date($s){
	$this->_date = $s;
	}
	public function set_num_tel($s){
	$this->_num_tel = $s;
	}
	public function get_num_tel(){
	return $this->_num_tel;
	}
	public function set_commentaire($s){
	$this->_commentaire = $s;
	}
	public function get_commentaire(){
	return $this->_commentaire;
	}
	
//***********************************************************************************************************************************//

public function insert_order($s,$imei)
	{
		if($s==0)
		{
		$req="INSERT INTO imei(imei,etat) values('$this->_imei','0')";
		$this->_bdd->requete($req);	
		$req1="INSERT INTO igcjioxt_worldwide.order (imei,pseudo,etat,type,date,commentaire) values('$this->_imei','$this->_pseudo','0','$this->_type','$this->_date','$this->_commentaire')";
		$this->_bdd->requete($req1);
		}
		else
		{
		$req1="INSERT INTO igcjioxt_worldwide.order(imei,pseudo,etat,type,date) values('$this->_imei','$this->_pseudo','0','$this->_type','$this->_date')";
		$this->_bdd->requete($req1);
		}
	}

public function search_imei()
{
$req="select imei from imei where imei='$this->_imei'";
$res=$this->_bdd->requete($req);
while($row =mysql_fetch_array ($res))
			{			
				if($this->_imei==$row['imei'])
					{
						return 1;
					}
					
			}
						return(0);  

}

public function liste_check()
{

$req="select * from igcjioxt_worldwide.order where pseudo='$this->_pseudo' ORDER BY etat and date DESC";
$res=$this->_bdd->requete($req);
return $res;
}

public function full_check()
{

$req="select * from igcjioxt_worldwide.imei where imei='$this->_imei' ";
$res=$this->_bdd->requete($req);
return $res;
}
public function credit($ps)
{
$req="select * from igcjioxt_worldwide.client where pseudo='$this->_pseudo'" ;
$res=$this->_bdd->requete($req);
while($row =mysql_fetch_array ($res))
{
$x=$row['credit'];
}
$c=$x-1;

$req1="update igcjioxt_worldwide.client set credit=".$c." where pseudo='$this->_pseudo'";
$this->_bdd->requete($req1);	
return $c;

}
public function check_credit($ps)
{
$req="select * from igcjioxt_worldwide.client where pseudo='$ps'" ;
$res=$this->_bdd->requete($req);
while($row =mysql_fetch_array ($res))
{
$x=$row['credit'];
}

return $x;

}

public function etatimei($imei)
{
$req="select etat from igcjioxt_worldwide.imei where imei=$imei";
$res=$this->_bdd->requete($req);
while($row =mysql_fetch_array ($res))
{
	if($row['etat']==0)
	{
	$x=0;
	}
	else if($row['etat']==1)
	{
	$x=1;
	}
	else
	{
	$x=2;
	}
return $x;
}
}
public function recherche()
{
$req="select * from igcjioxt_worldwide.client where pseudo='$this->_pseudo'";
$res=$this->_bdd->requete($req);
	if($res)
	{
		return 1;
	}
	else
	{
		return 0;
	}
}

public function inscription()
{
$req="INSERT INTO igcjioxt_worldwide.client (nom,prenom,pseudo,pass,mail,num_tel,credit,etat) values('$this->_nom','$this->_prenom','$this->_pseudo','$this->_pass','$this->_mail','$this->_num_tel','0','0')";
$this->_bdd->requete($req);

}
public function send_mail()
{


}


public function verif($pseudo)
		{
			try
			{
				$q = "SELECT pseudo,etat FROM igcjioxt_worldwide.client ";
				$res =$this->_bdd->requete($q);
					while($row =mysql_fetch_array ($res))
					{			
						if($pseudo==$row['pseudo'])
						{
							return $row;
						}
					
					}
					return(0);
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}		
		}



//activation de la compte bancaire
		public function activation($id_cl)
		{
			try
			{
			
				$q = "SELECT * FROM igcjioxt_worldwide.client  ";
				$res =$this->_bdd->requete($q);
			while($row =mysql_fetch_array ($res))
			{			
				if($id_cl==$row['pseudo'])
					{
						return $row;
					}
					
			}
			return(0);
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}		
		}
//changer mot de passe client
public function modifier_pswd()
		{
			$req="update igcjioxt_worldwide.client set pass='$this->_pass' where pseudo='$this->_pseudo'";
			$this->_bdd->requete($req);	
		}


//verifier l'etat de compte bancaire et le client aprés l'activation
		public function etat($tab)
		{
		$req="update igcjioxt_worldwide.$tab set etat='1' where pseudo='$this->_pseudo'";
			$this->_bdd->requete($req);	
		}


public function policy_id($policy)
{
$req="select id from policy_id where id=$policy";
$res=$this->_bdd->requete($req);
return $res;

}
public function verif_etatadmin()
{
$req="select etatadmin from igcjioxt_worldwide.client where pseudo='$this->_pseudo'";
$res=$this->_bdd->requete($req);
while($row =mysql_fetch_array ($res))
{
	if($row['etatadmin']==0)
	{
	$x=0;
	}
	else
	{
	$x=1;
	}
	
return $x;

}}

public function insert_imei()
{
$req="insert into igcjioxt_worldwide.imei_generer (imei,model,description) value('$imei','$model','$description')";
$this->_bdd->requete($req);
}





}
?>
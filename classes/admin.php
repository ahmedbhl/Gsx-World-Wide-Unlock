<?php
class admin
{
	private $_pseudo;
	private $_nom;
	private $_prenom;
	private $_mail;
	private $_pass ;
	private $_etat ;
	private $_credit;
	private $_imei;
	
	private $_sn;
	private $_initi_acti_policy ;
	private $_meid;
	private $_policy_description;
	private $_policy_id;
	private $_part_description;
	private $_activation_description;
	private $_product_version;
	private $_next_policy_id;
	private $_next_policy_description;
	private $_blutooth;
	private $_first_unbrick;
	private $_mac;
	private $_ICCID;
	private $_last_unbrick;
	private $_unbricked;
	private $_unlocked ;
	private $_icloud ;
	
	public function admin($bdd){
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
	public function set_credit($s){
	$this->_credit = $s;
	}
	public function get_credit(){
	return $this->_credit;
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
	public function set_sn($i){
	$this->_sn = $i;
	}
	public function get_sn(){
	return $this->_sn;
	}
	public function set_initi_acti_policy($i){
	$this->_initi_acti_policy = $i;
	}
	public function get_initi_acti_policy(){
	return $this->_initi_acti_policy;
	}
	public function set_meid($i){
	$this->_meid = $i;
	}
	public function get_meid(){
	return $this->_meid;
	}
	public function set_policy_description($i){
	$this->_policy_description = $i;
	}
	public function get_policy_description(){
	return $this->_policy_description;
	}
	public function set_part_description($i){
	$this->_part_description = $i;
	}
	public function get_part_description(){
	return $this->_part_description;
	}
	public function set_activation_description($i){
	$this->_activation_description = $i;
	}
	public function get_activation_description(){
	return $this->_activation_description;
	}
	public function set_product_version($i){
	$this->_product_version = $i;
	}
	public function get_product_version(){
	return $this->_product_version;
	}
	public function set_next_policy_id($i){
	$this->_next_policy_id = $i;
	}
	public function get_next_policy_id(){
	return $this->_next_policy_id;
	}
	public function set_next_policy_description($i){
	$this->_next_policy_description = $i;
	}
	public function get_next_policy_description(){
	return $this->_next_policy_description;
	}
	public function set_blutooth($i){
	$this->_blutooth = $i;
	}
	public function get_blutooth(){
	return $this->_blutooth;
	}
	public function set_first_unbrick($i){
	$this->_first_unbrick = $i;
	}
	public function get_first_unbrick(){
	return $this->_first_unbrick;
	}
	public function set_mac($i){
	$this->_mac = $i;
	}
	public function get_mac(){
	return $this->_mac;
	}
	public function set_ICCID($i){
	$this->_ICCID = $i;
	}
	public function get_ICCID(){
	return $this->_ICCID;
	}
	public function set_last_unbrick($i){
	$this->_last_unbrick = $i;
	}
	public function get_last_unbrick(){
	return $this->_last_unbrick;
	}
	public function set_unbricked($i){
	$this->_unbricked = $i;
	}
	public function get_unbricked(){
	return $this->_unbricked;
	}
	public function set_unlocked($i){
	$this->_unlocked = $i;
	}
	public function get_unlocked(){
	return $this->_unlocked;
	}
	public function set_icloud($i){
	$this->_icloud = $i;
	}
	public function get_icloud(){
	return $this->_icloud;
	}
//***********************************************************************************************************************************//

public function liste_client()
{
$req="select * from igcjioxt_worldwide.client";
$res=$this->_bdd->requete($req);
return $res;

}
public function liste_admin()
{
$req="select * from igcjioxt_worldwide.admin_tools";
$res=$this->_bdd->requete($req);
return $res;

}


public function verif_etat($etat)
		{
			if($etat==1)
			{
			return('ACTIVER');
			}
			else
			{
			return('DESACTIVER');
			
			}	
		}


public function activer($des)
		{	
			if($des)
			{
			$req="update igcjioxt_worldwide.client set etatadmin='$des' where pseudo='$this->_pseudo'";
			$this->_bdd->requete($req);
			}
			else
			{
			$req="update igcjioxt_worldwide.client set etatadmin='$des' where pseudo='$this->_pseudo'";
			$this->_bdd->requete($req);
			}
		}
public function activer_admin($des)
		{	
			if($des)
			{
			$req="update igcjioxt_worldwide.admin_tools set etat='$des' where pseudo='$this->_pseudo'";
			$this->_bdd->requete($req);
			}
			else
			{
			$req="update igcjioxt_worldwide.admin_tools set etat='$des' where pseudo='$this->_pseudo'";
			$this->_bdd->requete($req);
			}
		}



public function supprimer()
{

$req="delete from igcjioxt_worldwide.client where pseudo='$this->_pseudo'";
$res=$this->_bdd->requete($req);

}
public function supprimer_admin()
{

$req="delete from igcjioxt_worldwide.admin_tools where pseudo='$this->_pseudo'";
$res=$this->_bdd->requete($req);

}
public function add_acredit()
{
$req="select credit from igcjioxt_worldwide.client where pseudo='$this->_pseudo'";
$res=$this->_bdd->requete($req);
while($row =mysql_fetch_array ($res))
{
$x=$row['credit'];
}
$c=$x+$this->_credit;

$req1="update igcjioxt_worldwide.client set credit=$c where pseudo='$this->_pseudo'";
$this->_bdd->requete($req1);

}
 public function add_admin()
 {
$req="INSERT INTO igcjioxt_worldwide.admin_tools (nom,prenom,pseudo,pass,mail,etat) values('$this->_nom','$this->_prenom','$this->_pseudo','$this->_pass','$this->_mail','1')";
$this->_bdd->requete($req);
 
 }

public function verif_pseudo()
{
$req="select * from igcjioxt_worldwide.admin_tools where pseudo='$this->_pseudo'";
$res=$this->_bdd->requete($req);
$row =mysql_fetch_array ($res);
if($row)
{
return 1;
}
else
{
return 0;
}

}

public function liste_imei_attente()
{
$req="select * from igcjioxt_worldwide.order where etat='0' ORDER BY pseudo AND type ";
$res=$this->_bdd->requete($req);
return $res;

}

public function add_info()
{
$req="UPDATE imei SET sn='$this->_sn',policy_id='$this->_initi_acti_policy',meid='$this->_meid',policy_description='$this->_policy_description',activation_policy_id='$this->_policy_id',part_description='$this->_part_description',activation_description='$this->_activation_description',product_version='$this->_product_version',next_policy_id='$this->_next_policy_id',next_activation_policy='$this->_next_policy_description',blutooth='$this->_blutooth',first_unbrick='$this->_first_unbrick',mac_address='$this->_mac',iccid='$this->_ICCID',last_unbrick='$this->_last_unbrick',unbricked='$this->_unbricked',unlocked='$this->_unlocked ',find_my_phone='$this->_icloud',etat='1' WHERE imei='$this->_imei'";
$this->_bdd->requete($req);

}
public function add_info_order($imei)
{
$req="update igcjioxt_worldwide.order set etat='1' where imei='$imei'";
$this->_bdd->requete($req);

}
public function add_erreur($imei)
{
$req="update igcjioxt_worldwide.imei set etat='2' where imei='$imei'";
$this->_bdd->requete($req);

}
public function add_erreur_order($imei)
{
$req="update igcjioxt_worldwide.order set etat='2' where imei='$imei'";
$this->_bdd->requete($req);

}


































}
?>
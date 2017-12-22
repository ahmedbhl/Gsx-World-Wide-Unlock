<?php
class admintools
{
	private $_pseudo;
	private $_nom;
	private $_prenom;
	private $_mail;
	private $_pass ;
	private $_etat ;
	private $_credit;
	private $_imei;
	
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
//***********************************************************************************************************************************//















}
?>
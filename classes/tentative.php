<?php
class tentative{

	private $_date_histo;
	private $_pseudo;
	private $_ip;
	private $_tentative;
	private $_id;
	private $i;
	public function tentative($bdd)
	{
	$this->_bdd=$bdd;
	}
	public function get_date_histo(){
	return $this->_date_histo;
	}
	public function set_date_histo($i){
	$this->_date_histo= $i;
	}
	public function set_pseudo($i){
	$this->_pseudo = $i;
	}
	public function get_pseudo(){
	return $this->_pseudo;
	}
	public function get_ip(){
	return $this->_ip;
	}
	public function set_ip($s){
	$this->_ip= $s;
	}
	public function get_tentative(){
	return $this->_tentative;
	}
	public function set_tentative_chec($s){
	$this->_tentative= $s;
	}
	
	//creation dune nouveau tentativité est retourne le nombre de tentativité en echec
	public function histo_con($pseudo)
		{
			$q = "SELECT pseudo,tentatives_en_echec,ip,date_histo FROM igcjioxt_worldwide.historique_de_connexion where pseudo='$pseudo' and date_histo > NOW() - INTERVAL 15 MINUTE";
			$res =$this->_bdd->requete($q);
			$row =mysql_fetch_array ($res);
			if(!$row)
			{			
			$req="INSERT INTO igcjioxt_worldwide.historique_de_connexion(date_histo,pseudo,ip,tentatives_en_echec) values('$this->_date_histo','$this->_pseudo','$this->_ip','$this->_tentative')";
			$this->_bdd->requete($req);
			}
			else
			{
			
			$req="update  igcjioxt_worldwide.historique_de_connexion set tentatives_en_echec ='0' where date_histo > NOW() - INTERVAL 15 MINUTE and pseudo='$pseudo'";
			$this->_bdd->requete($req);	
			
			}
			
		}
		
		public function tentativ($id)
		{
		try
			{
			
				$q = "SELECT pseudo,tentatives_en_echec,ip,date_histo FROM igcjioxt_worldwide.historique_de_connexion where pseudo='$id ' and date_histo > NOW() - INTERVAL 15 MINUTE";
				$res =$this->_bdd->requete($q);
				$row =mysql_fetch_array ($res);
			if(!$row)
			{			
				//if($id==$row['pseudo'])
					//{
							$req="INSERT INTO igcjioxt_worldwide.historique_de_connexion(date_histo,pseudo,ip,tentatives_en_echec) values('$this->_date_histo','$this->_pseudo','$this->_ip','1')";
							$this->_bdd->requete($req);
							
					
						//$row['tentatives_en_echec']=
						
					//}
					
			}
			else
			{	
				$i=$row['tentatives_en_echec'];
				if($i<4)
				{
				$i++;
				$req="update  igcjioxt_worldwide.historique_de_connexion set tentatives_en_echec ='$i' where date_histo > NOW() - INTERVAL 15 MINUTE and pseudo='$id'";
				$this->_bdd->requete($req);	
				return $row['tentatives_en_echec'];
				}
				else
				{
				$req="update  igcjioxt_worldwide.client set etat ='0' where pseudo='$id'";
				$this->_bdd->requete($req);	
				return $i;
				}
				
			}
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}		
		}
		
		public function etat()
		{
		$req="update  igcjioxt_worldwide.historique_de_connexion set tentatives_en_echec ='0' where date_histo > NOW() - INTERVAL 10 MINUTE and pseudo='$this->_pseudo'";
		$this->_bdd->requete($req);	
		}
	
	
	
	
	
}
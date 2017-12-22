<?php

// classe de base, avec des propriétés et des méthodes membres
class User {

   private $email;
   private $password;
   
	

	function connect($email,$password,$role)
	{
		global $connection;
		$select = $connection->prepare("SELECT count(*) as nb FROM user 	
		where email=:email and password=:password and niveau_user=:niveau_user and type_compte='o'");
		$select->bindParam(':email', $email);
		$select->bindParam(':password', $password);
		$select->bindParam(':niveau_user', $role);
        $select->execute();
		$select->setFetchMode(PDO::FETCH_OBJ);
		$enregistrement = $select->fetch();
		return $enregistrement;
		
// On indique que nous utiliserons les résultats en tant qu'objet
	$select->setFetchMode(PDO::FETCH_OBJ);
	if( $enregistrement ) 			
  	return $nregistrement;
  	} 

	
	
   
}
?>
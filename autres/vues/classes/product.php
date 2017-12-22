<?php

// classe de base, avec des propriétés et des méthodes membres
class Product {

   private  $ref_prod;
   private $libelle;
   private $prix;
   private $qte;


	function ajouter($libelle,$prix,$qte)
	{
		global $connection;
		$insert = $connection->prepare('INSERT INTO product VALUES(
	NULL, :libelle, :prix, :qte)');
try {
  // On envois la requète
 		 $insert->bindParam(':libelle', $libelle);
		 $insert->bindParam(':prix', $prix);
	     $insert->bindParam(':qte', $qte);
        $insert->execute();
  
   
  if( $insert ) {
    echo "Enregistrement réussi";
  }  
} catch( Exception $e ){
  echo 'Erreur de requète : ', $e->getMessage();
}
		/*
		global $connection;
		$select = $connection->prepare("SELECT count(*) as nb FROM user 	
		where sid=:sid");
		
		 $select->bindParam(':sid', $sid);
        $select->execute();
		$select->setFetchMode(PDO::FETCH_OBJ);
		$enregistrement = $select->fetch();
		return $enregistrement;
		
// On indique que nous utiliserons les résultats en tant qu'objet
	$select->setFetchMode(PDO::FETCH_OBJ);
	if( $enregistrement ) 			
  	return $nregistrement;
	*/
  	} 

	function existe($ref_prod)
	{
		global $connection;
		$select = $connection->prepare("SELECT count(*) as nb FROM 
		product where ref_prod=:ref_prod");
		
		$select->bindParam(':ref_prod', $ref_prod);
        $select->execute();
		$select->setFetchMode(PDO::FETCH_OBJ);
		$enregistrement = $select->fetch();
		return $enregistrement;
		
// On indique que nous utiliserons les résultats en tant qu'objet
	$select->setFetchMode(PDO::FETCH_OBJ);
	if( $enregistrement ) 			
  	return $nregistrement;
  	} 
	
	function get_product($ref_prod)
	{
		global $connection;
		$select = $connection->prepare("SELECT *  FROM 
		product where ref_prod=:ref_prod");
		
		$select->bindParam(':ref_prod', $ref_prod);
        $select->execute();
		$select->setFetchMode(PDO::FETCH_OBJ);
		$enregistrement = $select->fetch();
		return $enregistrement;
		
// On indique que nous utiliserons les résultats en tant qu'objet
	
  	} 
   function update_product($ref_prod,$libelle,$prix,$qte)
   {
	   global $connection;
	  
	  global $connection;
	$sql = "UPDATE product SET libelle=?, prix=? WHERE ref_prod=?";
	$q = $connection->prepare($sql);
	$q->execute(array($libelle,$prix,$ref_prod));
	  
	  /*
	   $connection->exec("UPDATE membres SET 	
	   `libelle`='$libelle',prix='$prix',qte='$qte' WHERE ref_prod 
	   = $ref_prod");
	
	   $sql = "UPDATE product SET libelle = :libelle, 
            prix = :prix, 
            qte = :qte,  
            WHERE ref_prod = :ref_prod";
$stmt = $connection->prepare($sql);                                  
$stmt->bindParam(':libelle', $libelle);       
$stmt->bindParam(':prix', $prix);    
$stmt->bindParam(':qte', $qte);
$stmt->bindParam(':ref_prod', $ref_prod);
// use PARAM_STR although a number  
$stmt->execute(); 
   */
   }
}
?>
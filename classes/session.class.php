 <?php
 class session{
	
	
	public function set_msg($message,$type)
	{
	$_SESSION['msg'] = array(
	'message' => $message,
	'type'    => $type
	);
	}
	
	public function msg_flash()
	{
			if(isset($_SESSION['msg'])){
		?>
			<div id="alert" class="alert alert-<?php echo $_SESSION['msg']['type'] ;?>">
				<a href="#" class="fermer">x </a>
				<?php echo $_SESSION['msg']['message']; ?>
			</div>
				
		<?php			
			unset($_SESSION['msg']);
		
		}
	}
	
	
	//*****************session compte client***************************//
	
	public function set_id_cl($id_cl)
	{
	$_SESSION['id_cl'] =$id_cl;
	}
	public function set_mot_de_passe($pswd)
	{
	$_SESSION['mot_de_passe'] =$pswd;
	}
	public function set_num_compte($num_compte)
	{
	$_SESSION['num_compte'] =$num_compte;
	}
	
	public function msg_compte_client()
	{
			if(isset($_SESSION['msg'])){
		?>
			<div id="notif" class="notif alert-<?php echo $_SESSION['msg']['type'] ;?>">
				<a href="#" class="fermer">x </a>
				<?php echo $_SESSION['msg']['message']; ?>
			</div>
				
		<?php			
			unset($_SESSION['msg']);
		
		}
	}
 //******************************END compte client**************************************//
 
 //**************************LOGIN*****************************//
	public function set_msg_login($message)
	{
	$_SESSION['msg_log'] =$message;
	}
	
	public function msg_log()
	{
	if(isset($_SESSION['msg_log'])){
					
			 echo $_SESSION['msg_log']; 
			unset($_SESSION['msg_log']);
	}
	
	}
 //***************************End login***********************/
	
	
	
	
 }
 
 ?>
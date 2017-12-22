 <?php
include "../../classes/connexion.php";
include "../../classes/client.php";
$bdd=getconnexion();

if(!empty($_REQUEST["id_cl"])&&!empty($_REQUEST["nom"]) &&!empty($_REQUEST["prenom"] )&&!empty($_REQUEST["num_tel"] )&&!empty($_REQUEST["mail"])  )
{
		$g=new client($bdd);
		$g->set_pseudo($_REQUEST["id_cl"]);
		// Hachage du mot de passe
		$g->set_pass(sha1($_REQUEST["nom"]));
		//$g->set_pass(($_REQUEST["password"]));
		$g->set_nom($_REQUEST["nom"]);
		$g->set_prenom($_REQUEST["prenom"]);
		$g->set_mail($_REQUEST["mail"]);
		$g->set_num_tel($_REQUEST["num_tel"]);
		$g->set_etat('0');
		$res=$g->recherche();
		echo $res;
		if($res)
		{
		$g->inscription();
		
//************************************************************

		echo'<script>alert("merci pour votre inscription vous aurez recevoire clé activation")</script>';
		print("<script type=\"text/javascript\">setTimeout('location=(\"login.php\")' ,0);</script>");
		}
		else
		{
		echo'<script>alert("identifiant utiliser par un autre client ")</script>';
		print("<script type=\"text/javascript\">setTimeout('location=(\"inscri.php\")' ,0);</script>");
		}
}
else
{
echo '<script>alert("svp remplir tout les champs")</script>';
print("<script type=\"text/javascript\">setTimeout('location=(\"inscri.php\")' ,0);</script>");
}
	?>
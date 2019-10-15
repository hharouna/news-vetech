<?php
extract($_POST); 
require_once("../private/connexion.php"); 
$u = new url();// class url 
$union_client_des = new union_client_des(); 
$_session_start = new f_session(); // ouverture de la session 
$_session_start->session($u->session_site,$u->truefalse,$u->domaine_site); //ouverture de la session 

$token =  $token_annonce; 
 /*controle register formulaire*/
/*controle de la session token*/

$fliter = array(
		$nom_annonce,	
		$prenom_annonce,
		$email_annonce,	
		$contact_annonce,	
		$cat,
		$type_cat,	
		$ville,
		$quartier,
		$estime_annonce,
		$surface_annonce,	
		$objet_annonce,
		$description_annonce
		);
$alert_c = array(
		"Le champ Nom est vide",	
		"Le champ Prenom est vide",
		"Le champ Email est vide",	
		"Le champ Contact est vide",	
		"Selectionnez une Cathégorie SVP !!!",
		"Selectionnez un type cathegorie SVP !!!",	
		"Situé la ville SVP !!!",
		"Situé la quartier SVP !!!",
		"Votre estimation !!!",
		"Indiquez la surface !!!",	
		"Objet du message !!!",
		"Décrivez simplement votre annonce !!!",	
		);
$c_f= count($fliter); 

if(isset($token)&&$token==$_SESSION["token"]):


for($i=0; $i<$c_f; $i++){
	if(empty($fliter[$i])):
	echo json_encode(array("code"=>"0", "contenu"=>$alert_c[$i])); exit();
	else: 
     $alert_c[$i]= preg_replace('#[^a-zA-z0-9@_.\'éèâû]#i','',$alert_c[$i]);
endif;
}


if(isset($type)&&$type==1): 
echo  json_encode(array("code"=>"0", "contenu"=>"Probleme de connexion!!!")); exit();
endif;
$info_register_all = ""; 
include_once("../p_register/save_all_annonce.php");
$page = new f_af(); 
$_exploide = $nom_annonce.'/-/'.$prenom_annonce.'/-/'.$email_annonce.'/-/'.$contact_annonce.'/-/'.$cat.'/-/'.$type_cat.'/-/'.$ville.'/-/'.$quartier.'/-/'.$estime_annonce.'/-/'.$surface_annonce.'/-/'.$objet_annonce.'/-/'.$description_annonce; 
	
$rediection_url = $page->page($db, $u->liste_db,$_exploide,$_SESSION["nav"]); 

echo $rediection_url; 
exit(); 
else: 
$array = array("code"=>"0");
echo json_encode($array); 
exit(); 
endif; 





?> 
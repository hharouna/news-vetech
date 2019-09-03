<?php
extract($_POST); 
require_once("../private/connexion.php"); 
$u = new url();// class url 
$union_client_des = new union_client_des(); 
$_session_start = new f_session(); // ouverture de la session 
$_session_start->session($u->session_site,$u->truefalse,$u->domaine_site); //ouverture de la session 

 
/*controle de la session token*/

if(isset($token)&&$token==$_SESSION["token"]):
$type= preg_replace('#[^1-2]#i','',$type);
if(isset($type)&&$type==1): 
$info_register_all = $nom.'/-/'.$prenom.'/-/'.$contactform.'/-/'.$e_mail.'/-/'.$token.'/-/'.$type.'/-/'.$commentaire.'/-/'.$secteur;
elseif(isset($type)&&$type==2): 
$info_register_all = $nom.'/-/'.$prenom.'/-/'.$e_mail.'/-/'.$mdp.'/-/'.$token.'/-/'.$type;
else: 
echo  json_encode(array("code"=>"0", "contenu"=>"Probleme de connexion!!!")); exit();
endif;


include_once("../p_register/rs_insert_client_des.php");
$page = new f_af(); 
$rediection_url = $page->page($db, $u->liste_db,$info_register_all,$type); 
echo $rediection_url; 
exit(); 
else: 
$array = array("code"=>"0");
echo json_encode($array); 
exit(); 
endif; 





?> 
<?php
extract($_POST); 
require_once("../private/connexion.php"); 
$u = new url();// class url 
$union_client_des = new union_client_des(); 
$_session_start = new f_session(); // ouverture de la session 
$_session_start->session($u->session_site,$u->truefalse,$u->domaine_site); //ouverture de la session 

/*controle de la session token*/

if(isset($token)&&$token==$_SESSION["token"]):

$info_connect = $email_connect_all.'/-/'.$mdp_connect_all; 
$url = $union_client_des->__union($db, $u->liste_db,$info_connect,$u); 
echo $url; 
else: 
$array = array("code"=>"0");
echo json_encode($array); 
exit(); 
endif; 





?> 
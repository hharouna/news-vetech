<?php
extract($_POST); 
require_once("../private/connexion.php"); 
$u = new url();// class url 
$union_client_des = new union_client_des(); 
$_session_start = new f_session(); // ouverture de la session 
$_session_start->session($u->session_site,$u->truefalse,$u->domaine_site); //ouverture de la session 
 
/*controle de la session token*/

if(isset($token)&&$token==$_SESSION["token"]){
$id_region =$u->base64decode($id_r); 
$id_region= preg_replace('#[^0-9]#i','',$id_region);
if(isset($id_region)): 
		include_once("../p_register/f_quartier.php");// liste de la region 
		$contenu = new f_af(); 
		$r_l_quartier = $contenu->liste_quartier($db, $u->liste_db,$id_region,$u); /// liste des regions affiches 
	    $exploide =explode('/--/',$r_l_quartier);
	 $c =$exploide[0]; 
  $d=	$exploide[1];
		$array_retrun = array("code"=>"1","count"=>$c,"liste"=>$d); 
		echo json_encode($array_retrun); 
		exit(); 
	
elseif(empty($id_region)): 
		$array_retrun = array("code"=>"0","count"=>"0"); 
		echo json_encode($array_retrun); 
		exit();
endif;
}













?> 
<?php

include_once('../../../function/url.php');
include_once('../../../function/f_session/f_session.php');
$u = new url();// class url 
$_session_start = new f_session(); 
$sessionsite=$u->session_site;
$_truefalse=$u->truefalse;
$_domaine_site=$u->domaine_site;
$_session_start->session($u->session_site,$u->truefalse,$u->domaine_site); //ouverture de la session 
$u_token = $_SESSION["token"]; 
$nav =  $_SESSION["nav"]; 

$nav= preg_replace('#[^a-zA-Z0-9@.]#i','',$nav); 
$en_codeder_nav = $u->base64encode($nav); 


if(!file_exists("../../../nav/".$en_codeder_nav)){
 $_mkdir = mkdir("../../../nav/".$en_codeder_nav); 
  $_dossier_nav  = $_mkdir."/";
}else{
$_dossier_nav  = "../../../nav/".$en_codeder_nav."/";    
    
}
$output_dir =$_dossier_nav  ;
if(isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name']))
{
	$fileName =$_POST['name'];
	$fileName=str_replace("..",".",$fileName); //required. if somebody is trying parent folder files	
	$filePath = $output_dir. $fileName;
	if (file_exists($filePath)) 
	{
        unlink($filePath);
    }
	echo "Deleted File ".$fileName."<br>";
}

?>
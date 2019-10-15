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
  $_dossier_nav  = $_mkdir;
}else{
$_dossier_nav  = "../../../nav/".$en_codeder_nav;    
    
}



if(isset($_GET['filename']))
{
$fileName=$_GET['filename'];
$fileName=str_replace("..",".",$fileName); //required. if somebody is trying parent folder files
$file = $_dossier_nav."/".$fileName;
$file = str_replace("..","",$file);
if (file_exists($file)) {
	$fileName =str_replace(" ","",$fileName);
    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename='.$fileName);
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
}

}
?>

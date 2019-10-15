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
if(isset($_FILES["myfile"]))
{
	$ret = array();
	
//	This is for custom errors;	
/*	$custom_error= array();
	$custom_error['jquery-upload-file-error']="File already exists";
	echo json_encode($custom_error);
	die();
*/
	$error =$_FILES["myfile"]["error"];
	//You need to handle  both cases
	//If Any browser does not support serializing of multiple files using FormData() 
	if(!is_array($_FILES["myfile"]["name"])) //single file
	{
 	 	$fileName = $_FILES["myfile"]["name"];
 		move_uploaded_file($_FILES["myfile"]["tmp_name"],$_dossier_nav.$fileName);
    	$ret[]= $fileName;
	}
	else  //Multiple files, file[]
	{
	  $fileCount = count($_FILES["myfile"]["name"]);
	  for($i=0; $i < $fileCount; $i++)
	  {
	  	$fileName = $_FILES["myfile"]["name"][$i];
		move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$_dossier_nav.$fileName);
	  	$ret[]= $fileName;
	  }
	
	}
    echo json_encode($ret);
 }
 ?>
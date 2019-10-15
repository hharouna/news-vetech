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

class load_c{
    
public function load_vetech($lien_nav,$encode_nav){
$_dossier = "../../../nav/".$encode_nav."/";
$files = scandir($lien_nav);

$ret= array();
foreach($files as $file)
{
   /* $exploide = explode('.',$file); 
    if($exploide[1] != "jpg"||$exploide[1] != "png" || $exploide[1] != "icon" || $exploide[1] != "jpeg"
      || $exploide[1] != "gif" || $exploide[1] != "tiff" || $exploide[1] != "bmp"){
        $errer =array('name'=>"probleme"); 
        return json_encode($errer);
        
    }   else{}*/
	if($file == "." || $file == "..")
		continue;
	$filePath="../../../nav/".$encode_nav.'/'.$file;
    $an ="nav/".$encode_nav.'/'.$file;
        
	$details = array();
	$details['name']=$file;
	$details['path']=$an;
	$details['size']=filesize($filePath);
	$ret[] = $details;
  
}
return json_encode($ret);
    



}}

$update = new load_c(); 

echo $update->load_vetech($_dossier_nav,$en_codeder_nav);


?>
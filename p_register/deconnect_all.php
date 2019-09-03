<?php 
require_once("../private/connexion.php");
$_u = new url();
$fsession = new f_session(); 
$fsession->f_deconnect($_u->session_site,$_u->truefalse,$_u->domaine_site);
echo json_encode(array('code'=>0, 'url'=>$_u->site_serveur));  
?>
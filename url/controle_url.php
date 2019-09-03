<?php 
extract($_POST);

require_once("../private/connexion.php"); 
$u = new url();// class url 
$_session_start = new f_session(); 
$sessionsite=$u->session_site;
$_truefalse=$u->truefalse;
$_domaine_site=$u->domaine_site;
$_session_start->session($u->session_site,$u->truefalse,$u->domaine_site); //ouverture de la session 
$u_token = $u->__c_token(); 
/* liste de session */
//unset($_SESSION["INFO_CONNECTER"]);

$_SESSION["token"]=$u_token;
if(empty($_SESSION["INFO_CONNECTER"])):
    $session_info = "";
else:  
    $session_info =$_SESSION["INFO_CONNECTER"]; 
endif; 
/* fin liste des session connect */

//$_session_start->session($_session_start->session_site);
$_session_formation=$_SESSION['PANIER_FORMATION']=array(); 
$menu = new menu(); // class menu extends url
$_all_module = new all_module_url(); 

$liste_url = new liste_url(); // class liste url --> controle affiche liste page 
$rs_connect = $u->u_connect($u_token, $session_info); // formulaire de connexion
$rs_pied_p_p = $u->piedpage(); // pieds de page
$rs_erro_page = $u->erro_page();// message Erreur si la page ne function pas 
$_af_db= $u->liste_db; // liste des connexion aux basse de données
$_module_all  = $_all_module->service_module($db,$_af_db);
$_module_all .= $_all_module->module($db,$_af_db);

$_db = $db; 

$_af_menu = '<div class="card">
  <div class="card-header">'.$menu->nav($_db,$_af_db).//liste des parties client et desinateur
$menu->liste_service($_db,$_af_db).	//liste des services vetech&design 
$menu->liste_formation($_db,$_af_db). // liste des formations vetech&design 
$menu->liste_contact($_db,$_af_db).'</div><div class="card-body">'; //constitution du menu princible vetechdesign*
/*controle des parametres secondaire des urls*/
if(isset($url_para)):
$_f_for_url = $u->base64decode($url_para); //decoder base64code pour exploide
elseif(isset($par_url)): 
$_f_for_url = $u->base64decode($par_url);//decoder base64code pour exploide
elseif(isset($par_url)): 
$_f_for_url = $u->base64decode($par_url);//decoder base64code pour exploide
else: 
$_f_for_url = null; //decoder base64code pour exploide
endif; 

//var_dump($_af_db); 
echo $liste_url->liste($url_post,$_af_menu,$rs_connect,$_module_all,$rs_pied_p_p,$rs_erro_page,$_af_db,$db,$_f_for_url,$_session_formation,$u_token);

?>
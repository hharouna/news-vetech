<?php

extract($_POST);
require_once("../private/db/connect_db.php");// connexion a l'unique  basse de données 
include_once("../function/url.php");// include de url function class et extends [ url , menu ]
include_once("../function/liste_url.php");// include de url function class et extends [ url , menu ]
include_once("../function/all_module_url.php");// include de url function class et extends [ url , menu ]

$u = new url();// class url 
$menu = new menu(); // class menu extends url
$_all_module = new all_module_url(); 

$liste_url = new liste_url(); // class liste url --> controle affiche liste page 
$rs_connect = $u->u_connect(); // formulaire de connexion
$rs_pied_p_p = $u->contenu_pied_page(); // pieds de page
$rs_erro_page = $u->erro_page();// message Erreur si la page ne function pas 
$_af_db= $menu->liste_db; // liste des connexion aux basse de données
$_module_all = $_all_module->module($db,$_af_db); 
$_db = $db; 



$_af_menu = '<div class="card">
  <div class="card-header">'.$menu->nav($_db,$_af_db).//liste des parties client et desinateur
$menu->liste_service($_db,$_af_db).	//liste des services vetech&design 
$menu->liste_formation($_db,$_af_db). // liste des formations vetech&design 
$menu->liste_contact($_db,$_af_db).'</div><div class="card-body">'; //constitution du menu princible vetechdesign*
/*controle des parametres secondaire des urls*/
if(isset($url_para)):
$_f_for_url = $u->base64decode($url_para); //decoder base64code pour exploide
elseif (isset($f_serv)): 
$_f_for_url = $u->base64decode($f_serv);//decoder base64code pour exploide
else: 
$_f_for_url = null; //decoder base64code pour exploide
endif; 

//var_dump($_af_db); 
echo $liste_url->liste($url_post,$_af_menu,$rs_connect,$_module_all,$rs_pied_p_p,$rs_erro_page,$_af_db, $db,$_f_for_url);




?>
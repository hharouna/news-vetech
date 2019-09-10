<?php 
/* class Gestion des paramêtres de url */
/*
*/
define("admin","vetechdesign_admin"); 
define("formation","vetechdesign_formation"); 
define("service","vetechdesign_service");
define("client","vetechdesign_client");
define("dessinateur","vetechdesign_dessinateur");


/* Liste des DB	
define("admin","vetec1105121_1chrsf"); //
define("formation","vetec1105121_4gqobd"); 
define("service","vetec1105121_5q6pyj");
define("client","vetec1105121_6z5zme");
define("dessinateur","vetec1105121_10q5mtq");
  */
//--> programmation vetechdesign by HAROUNA Harouna 

 class url_db{
    
//public $u_url = $_GET['url'];

//public $site_serveur = "app.vetechdesign.net";
//public $connect_client= "https://client.vetechdesign.net";// lien return vers la 
//public $connect_dessinateur = "https://des.vetechdesign.net";// lien return vers la 
public $site_serveur = "127.0.0.1:8888";	 
public $connect_client= "http://127.0.0.1:8888/ngbath/client.vetechdesign.net";// lien return vers la 
public $connect_dessinateur = "http://127.0.0.1:8888/ngbath/des.vetechdesign.net";// lien return vers la 
public $truefalse =false; 
public $domaine_site  =""; 
public $session_site = "__vetech_news"  ;  
public $key_vetech = "202486"; //cle sur tous les actions     
//public $connect_error = "<h4 class='text text-danger'>Impossible de vous connectez au serveur!!!</h4>";// lien return vers la 
//$connect_nav =  $_SERVER["HTTP_USER_AGENT"];
//$connect_ip =  $_SERVER["REMOTE_ADDR"];

//public $site_host=  $_SERVER['HTTP_HOST'];
//public $url_vetechdesign = ""; 
//public $an  = new date('d-m-Y');
public $liste_db = array("admin"=>admin,
						 "formation"=>formation,
						 "service"=>service,
						 "client"=>client,
						 "dessinateur"=>dessinateur);
	 
	 

 }

?>
<?php

class f_cookies extends url{
    
public function cookies($__url_cookies_valeur){
    /* function cookies 
    gestion des cokkies pour le bon function du site
    */
//
    $J= time();  //-- date actuelle de la machine 
    $Jstrtotime = strtotime($J); // valeur du jour actuel en seconde...
    $__url_name ='__vetech_cookies';
    $tempspremis  = time()+(60*60*24);
    $dossier   = "/" ;
    $domain   = "" ;
    $https  =  false; //isset($_SERVER['HTTPS'] );
    $httponly  = true; 
    
    
setcookie($__url_name,$__url_cookies_valeur,$tempspremis,$dossier,$domain,$https,$httponly);
			    
    
}
    public function f_cookies_annalyse($__url_cookies_valeur){
        /*
        sauvegarde des functions cookies pour annalyse des pages visiter 
        et controle le nombre de visite par jours 
        */
        $__url_name ='__vetech_cookies';
        unset($__url_name);
        
        
    }
    public function f_cookies_unset(){
        /*
       suprime le cookie
        */
        $__url_name ='__vetech_cookies';
        unset($__url_name);
        
        
    }
    
}




?>
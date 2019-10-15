<?php 
extract($_POST);

require_once("../private/connexion.php"); 

$u = new url();// class url 
$_session_start = new f_session(); 
$c_nav  = new nav_all();
$sessionsite=$u->session_site;
$_truefalse=$u->truefalse;
$_domaine_site=$u->domaine_site;
$_session_start->session($u->session_site,$u->truefalse,$u->domaine_site); //ouverture de la session 
$u_token = $u->__c_token();
$_af_db= $u->liste_db; // liste des connexion aux basse de données
/* liste de session */
//unset($_SESSION["INFO_CONNECTER"]);


if(isset($token)&& $_SESSION["token"]==$token){
    $_nav__url=$encodenav; 
    $encodenav= preg_replace('#[^a-zA-Z0-9@.]#i','',$encodenav); 
    $en_codeder_nav = $u->base64encode($encodenav); 
   
    if(isset($_SESSION["nav"])&& $controle=="nav"){
    $rs_nav = $c_nav->controle_nav($db,$_af_db,$en_codeder_nav, $_nav__url, $_SESSION["token"]);
    echo $rs_nav;
    }elseif(isset($_SESSION["nav"])&&$controle=='register')
    {  
    if(empty($nom_nav)){ $d_nav=array("champ"=>"0","name"=>"Le champ Nom est vide");
    echo json_encode($d_nav); exit;} 

    if(empty($email_nav)){ $d_nav=array("champ"=>"0","name"=>"Le champ Adresse E-mail est vide");
    echo json_encode($d_nav);exit; }
        
    if(!filter_var($email_nav,FILTER_VALIDATE_EMAIL)){ $d_nav =  array("champ"=>"0","name"=>"Adresse E-mail incorrect ");
    echo json_encode($d_nav); exit;  }
        
    $nom_nav= preg_replace('#[^a-zA-Z]#i','',$nom_nav); 
    $email_nav= preg_replace('#[^a-zA-Z0-9@_.]#i','',$email_nav); 
    $explode = $en_codeder_nav.'/-/'.$nom_nav.'/-/'.$email_nav ; 
        
    $rs_nav  = $c_nav->controle_confirme($db,$_af_db,$explode);
    echo $rs_nav;
    exit;
    }

    
/* fin liste des session connect */

}
?>
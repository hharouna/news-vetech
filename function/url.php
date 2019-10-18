<?php 
include_once("url_db.php"); 
define('d', date('Y'))  ;  
class url extends url_db{
    
public $array= array("cgu"=>"cgu","historique"=>"historique", "concept"=>"concept" ); 
public function piedpage() {

$pied_page='

<div class="zone_addr_reseau shadow-sm p-2 mb-3 rounded bg-dark ">

<div class=" mb-2 card_addr_vetech">
<div class="card p-1 mb-1">

<div class="shadow-sm  rounded text text-light p-2 bg-secondary">

<address class="text text-center">
<div class="shadow-sm  rounded  p-2 bg-light ">
<img src="imgformation/vetechdesign.png"  class="logo_addr"> 
</div>
</address>
<hr>
<p> <i class="fas fa-map-marker-alt fa-1x"> </i> <span class="align-top">Marcory derrière ORCA DECO cité Hibiscus </span></p>
<p><i class="fas fa-phone-square-alt fa-1x"> </i> <span class="align-top">(+225) 21 000 312 / 74 79 49 04</span> </p>

<p > <i class="fas fa-at fa-1x" > </i> <span class="align-top"> contacts@vetechdesign.net</span></p>
<hr>
</div>
</div>
</div>

<div class=" mb-2 card_reseau_vetech">
<div class="card p-1 mb-1 bg-secondary">
<div class="shadow-sm  rounded text_reseau_cont p-2 bg-light">
<h4 class="shadow-sm  rounded  p-3 mb-2 bg-secondary text text-center text-light text_reseau">
<i class="fas fa-globe-americas fa-1x"></i> Réseaux sociaux
</h4>
<hr>
<p class="vetech_fb"> <a href="https://web.facebook.com/vetechdesign/?ref=br_rs&_rdc=10&_rdr" target="_blank" class="text text-dark "><i class="fab fa-facebook-square fa-1x" > </i> <span class="align-top">Facebook</span>  </a></p>
<p class="vetech_tw"> <a href="https://twitter.com/VetechD?s=03" target="_blank" class="text text-dark"><i class="fab fa-twitter-square fa-1x" > </i> <span class="align-top">Twitter </span> </a></p>
<p class="vetech_ln"> <a href="" class="text text-dark" target="_blank"><i class="fab fa-linkedin fa-1x"> </i> <span class="align-top">LinkedIn </span></a></p>
<p class="vetech_inst"> <a href="" class="text text-dark"><i class="fab fa-instagram fa-1x" target="_blank"> </i> <span class="align-top">Instagram</span> </a></p>
<p class="vetech_what"> <a href="" class="text text-dark" target="_blank"><i class="fab fa-whatsapp-square fa-1x"> </i><span class="align-top"> Whatsapp </span> </a></p>
<hr>
</div>
</div>
</div>

<div class=" mb-2 card_autre_vetech">
<div class="card p-1 mb-1 bg-secondary">
<div class="shadow-sm rounded text_autre_cont p-3 bg-light">
<h4 class="shadow-sm  rounded  p-2 mb-2 bg-secondary text text-center text-light text_autre"> 
<i class="fas fa-outdent fa-1x"></i> AUTRES 
</h4>
<hr>
<p> <a href="?url=cgu&f_for='.$this->base64encode("historique").'" class="text text-dark "><i class="fas fa-history fa-1x" > </i> <span class="align-top">Historique </span>  </a></p>
<p> <a href="?url=cgu&f_for='.$this->base64encode("concept").'" class="text text-dark"><i class="fas fa-info fa-1x" > </i> <span class="align-top "> Concept </span> </a></p>
<p> <a href="?url=cgu&f_for='.$this->base64encode("cgu").'" class="text text-dark"><i class="fas fa-clipboard-check fa-1x" > </i> <span class="align-top">CGU</span> </a></p>
<hr>
</div>
</div>
</div>


</div>
<hr>
<div class="shadow-sm footer_vetech  rounded  p-3 bg-dark text text-light"><span class="text_footer">VETECH&DESIGN <i class="far fa-copyright fa-1x"></i> 2015-'.d.' </span>
<div class="float-right footer_icon"> <i class="fas fa-desktop  fa-2x"></i>|<i class="fas fa-tablet-alt fa-2x"></i>|<i class="fas fa-mobile-alt fa-2x"></i></div>
</div>
</div>
'; 
            return $pied_page; 
    }
public function connect_all($_token,$_session_info){ 
	$f_connet_client = '<div class="container  shadow-sm p-2 mb-2 mt-4 bg-light rounded "><form id="form-inline" class=" form-inline">
<div class="row">
<div class="col-md-auto  input-group mb-2  champs_email">
<div class="input-group-prepend">
<div class="input-group-text"><i class="fas fa-at"></i></div>
</div>
<input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="email_connect_all" value=""  placeholder="Adresse E-mail">
</div><div class="col-md-auto input-group champs_mdp mb-2">
<div class=" input-group-prepend"><div class="input-group-text"><i class="fas fa-key"></i></div></div>
<input type="password" class="form-control " name="mdp_connect_all" id="inlineFormInputName3" value="" placeholder="Mot de passe">
</div><input type="hidden" class="form-control mb-1 m-1" id="inlineFormInputName2" name="token" value="'.$_token.'" placeholder="token">
<div class="button_connex col-md-auto"><button type="button" class=" shadow-sm  btn btn-success btn-block mb-1 p-1 connexion_all" token_vetech="'.$_token.'"> <i class="fas fa-sign-in-alt"></i> <span class="text-conn">Connexion</span></button>
</div>
<div class="button_inscription col-md-auto "><a href="?url=inscription" class="mb-1  shadow-sm p-1 btn btn-block btn-primary">  <i class="fas fa-door-open"></i> Inscription </a>
</div><div class="alert-connect zone_alert m-2 "> </div>
</div>
</form></div>';


  if(empty($_session_info)):

    return $f_connet_client; 
    elseif(isset($_session_info['type'])&&$_session_info['type']==0): 
     return '<div class=" shadow-sm p-2 mb-3 bg-light rounded"><div class="row"><h4 class="p-3 mb-3 text text-danger left"> Allez <i class="fas fa-walking fa-2x"></i> à votre compte</h4> <div > <a class="btn btn-secondary shadow-sm p-2 mb-2 " href="'.$this->connect_client.'"><i class="fas fa-door-open fa-2x   "></i> <p>Compte</p></a> </div><div > <button type="button" class="btn btn-warning shadow-sm mb-2 p-2 deconnect-all" ><i class="fas fa-door-closed fa-2x   "></i> <p>Déconnexion</p></button></div> </div></div>';
    elseif(isset($_session_info['type'])&&$_session_info['type']==1): 
    return '<div class=" shadow-sm p-2 mb-3 bg-light rounded"><div class="row"><h4 class="p-3 mb-3 text text-danger left"> Allez <i class="fas fa-walking fa-2x"></i> à votre compte</h4> <div > <a class="btn btn-secondary shadow-sm p-2 mb-2 " href="'.$this->connect_client.'"><i class="fas fa-door-open fa-2x   "></i> <p>Compte</p></a> </div><div > <button type="button" class="btn btn-warning shadow-sm mb-2 p-2 deconnect-all" ><i class="fas fa-door-closed fa-2x   "></i> <p>Déconnexion</p></button></div> </div></div>';
    elseif(isset($_session_info['type'])&&$_session_info['type']==2): 
    return '<div class=" shadow-sm p-2 mb-3 bg-light rounded"><div class="row"><h4 class="p-3 mb-3 text text-danger left"> Allez <i class="fas fa-walking fa-2x"></i> à votre compte</h4> <div > <a class="btn btn-secondary shadow-sm p-2 mb-2 " href="'.$this->connect_dessinateur.'"><i class="fas fa-door-open fa-2x   "></i> <p>Compte</p></a> </div><div > <button type="button" class="btn btn-warning shadow-sm mb-2 p-2 deconnect-all" ><i class="fas fa-door-closed fa-2x   "></i> <p>Déconnexion</p></button></div> </div></div>';
    else: 
    return '<div class=" shadow-sm p-3 mb-5 bg-light rounded"><div class="row"><h3 class="p-3 mb-3 text text-danger left"> Allez <i class="fas fa-walking fa-2x"></i> à votre compte</h3> <div > <a class="btn btn-secondary shadow-sm p-3 mb-3 " href="'.$this->connect_error.'"><i class="fas fa-door-open fa-3x   "></i> <p>Compte</p></a> </div><div > <button type="button" class="btn btn-warning shadow-sm mb-3 p-3 deconnect-all" ><i class="fas fa-door-closed fa-3x   "></i> <p>Déconnexion</p></button></div> </div></div>';
    endif; 
    }
	 
 
public function url_vetechdesign($url_serveur, $url_host){

if(isset($url_serveur)&& $url_host!=$url_serveur):
echo("<h1>Maintenance sur le site vetech&Design.</h1>"); 
exit(); 
endif; 
	
	
	
}

/* function d'apple de la page url*/
public function contenu($page_url){

if(isset($page_url)){
include_once("../p_url/".$page_url.".php");
$p_af = new f_af();
return $p_af->page(); 

}
}

public function u_connect($token,$__session_info){

return $this->connect_all($token,$__session_info); 
				 }
public function erro_page(){
return "<div class='shadow p-3 mb-3 bg-warning rounded  text text-center ' ><h4>Problème de connexion à cette page merci de réessayer !!! </h4> </div>"; 

}
     /* zone function return pied de page */
public function contenu_pied_page(){
return $this->pied_page; 

}
     
     /* zone function return pied de page */
public function base64encode($encode_array){
$url_base64 = base64_encode($encode_array); 
return $url_base64; 
}
	 
public function base64decode($decode_array){
$url_base64 = base64_decode($decode_array); 
return $url_base64;
}
public function __c_verify_mdp($__mdp,$__mdp_info){
  $key=$this->key_vetech; 
  $hash =$key.$__mdp;
  $rs_controle=	 password_verify($hash,$__mdp_info);
  return $rs_controle; 
 }	
	 
public function __c_creation_mdp($_mdp){

 $key=$this->key_vetech; 
 $hash =$key.$_mdp;
 $_mdp_creat = password_hash($hash,PASSWORD_BCRYPT); 

 return $_mdp_creat; 
 }	
public function __c_token(){
  $__rest_token = md5(uniqid(rand())); 
return $__rest_token; 
 }
} //-> fin function url 

/* class Gestion du menu en function des activés vetech */

class menu extends url{


	

public function nav($db,$nom_bass){
 
$nav_menu = '<section  id="nav-vetechdesign" >
<div class="container-fluid">
<nav class="navbar nav-vetechdesign navbar-expand-lg navbar-light fixed-top bg-light shadow-sm " data-spy="scroll" data-offset="0">
<a class="navbar-brand" href="https://app.vetechdesign.net"><img src="imgformation/licone.png" width="35" height="35" /></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
<li class="nav-item nav-itm-border"  >
<a class="nav-link" href="?url=accueil"><i class="fas fa-home"></i> Accueil </a>
</li>
<li class="nav-item nav-itm-border"  >
<a class="nav-link" href="?url=client"><i class="fas fa-user fa-1x"></i> Client </a>
</li>
<li class="nav-item nav-itm-border">
<a class="nav-link" href="?url=dessinateur"> <i class="fas fa-users fa-1x"></i> Dessinateur</a>
</li>'; 
return $nav_menu; 
}


public function liste_chapitre_service($_db,$_nom_bass,$id_cat,$s_service){
	
	$sql='SELECT * FROM '.$_nom_bass['annonce'].'.liste_cathegorie WHERE '.$_nom_bass['annonce'].'.liste_cathegorie.liste_cat_id=? ORDER BY '.$_nom_bass['annonce'].'.liste_cathegorie.id_liste_cat ASC';
	$connect_db = $_db->prepare($sql);
	$connect_db->execute(array($id_cat));
	$fetechall =$connect_db->fetchAll(PDO::FETCH_ASSOC); 
	$_titre_chapitre ='<ul class="list-group list-group-flush"> '; 
	foreach($fetechall as $rs_form => $_liste_cat){    
	$c_array=	$_liste_cat['id_liste_cat'].'-'.$_liste_cat['liste_cat_nom'].'-'.$s_service; 
	$_titre_chapitre .= '<a href="?url=service_chapitre&f_for='.$this->base64encode($c_array).'">
    <li class="list-group-item "><i class="fas fa-eye">
    </i> '.ucfirst(strtolower($_liste_cat['liste_cat_nom'])).' </li></a> '; 
	}
	$_titre_chapitre .="</ul>";
	return $_titre_chapitre; 
}
public function liste_service($db,$nom_bass){   
$nav_service = '


<li class="nav-item dropdown nav-itm-border ">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-list fa-1x"></i>
            Nos Services
    </a>

<div class="">
    <div class="dropdown-menu " aria-labelledby="navbarDropdown " > 
        <div class="">
            
                    <div class="p-2 mb-2 text text-center text-secondary "> 
                        <h4>
                            <i class="fas fa-list fa-2x"></i>   
                            <span>Liste de nos services</span>  
                        </h4> 
                 
            </div>    
            <div class="card-columns m-2 p-2">    
';
$sql='SELECT * FROM '.$nom_bass['annonce'].'.cathegorie ORDER BY '.$nom_bass['annonce'].'.cathegorie.nom_cathegorie ASC';
$connect_db = $db->prepare($sql);
$connect_db->execute();
$fetechall =$connect_db->fetchAll(PDO::FETCH_ASSOC); 



foreach($fetechall as $rs_form => $_service){    
	
$f_array=$_service['nom_cathegorie'].'-'.$_service['id_cathegorie']; 
$nav_service .='

    
        <div class="card border border-dark " >
        <div class="card-body " >
        <div class="shadow-sm  bg-secondary ">
        <a class="dropdown-item" href="?url=service&f_for='.$this->base64encode($f_array).'" n_formation="'.$_service['nom_cathegorie'].'" n_ref_formation="'.$this->base64encode($f_array).'">
        <div class="card-header txt_drop bg-transparent border-success">
        <i class="fas fa-list-ul "> </i> '.strtoupper($_service['nom_cathegorie']).'
        </div>
        </a> 
        </div>'.$this->liste_chapitre_service($db,$nom_bass,$_service['id_cathegorie'],$_service['nom_cathegorie']).'
        </div> 
        </div> 
     

' ;

}
$nav_service.='
    </div></div></div></div></li>';


return $nav_service ; 

}
public function liste_chapitre_form($_db,$_nom_bass,$id_form,$f_formation){
	
$sql='SELECT * FROM '.$_nom_bass['formation'].'.moduleform  WHERE '.$_nom_bass['formation'].'.moduleform.idlisteform=? ORDER BY '.$_nom_bass['formation'].'.moduleform.idmodule ASC';
$connect_db = $_db->prepare($sql);
$connect_db->execute(array($id_form));
$fetechall =$connect_db->fetchAll(PDO::FETCH_ASSOC); 
 $_titre_chapitre ='<ul class="list-group list-group-flush"> '; 
	foreach($fetechall as $rs_form => $_chaptire){    
	$c_array=	$_chaptire['idlisteform'].'-'.$_chaptire['idmodule'].'-'.$f_formation; 
	$_titre_chapitre .= '<a href="?url=formation_chapitre&f_for='.$this->base64encode($c_array).'"><li class="list-group-item "><i class="fas fa-eye"></i> '.ucfirst(strtolower($_chaptire['titrechapitre'])).'</li></a> '; 
	}
	$_titre_chapitre .="</ul>";
	return $_titre_chapitre; 
}
public function liste_formation($db,$nom_bass){

$nav_formation = '

<li class="nav-item dropdown nav-itm-border ">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-graduate fa-1x"></i>
            Nos Formations 
    </a>
<div class="">
    <div class="dropdown-menu" aria-labelledby="navbarDropdown  " > 
        
                <div class="">
                    <div class="p-2 mb-2 text text-center text-secondary "> 
                        <h4>
                            <i class="fas fa-user-graduate fa-2x"></i>  
                            <span>Liste de nos formations</span>
                        </h4> 
                  
            </div>

             <div class="card-columns m-2 p-2">
';

$sql='SELECT * FROM '.$nom_bass['formation'].'.listeformation ORDER BY '.$nom_bass['formation'].'.listeformation.formation ASC';
$connect_db = $db->prepare($sql);
$connect_db->execute();
$fetechall =$connect_db->fetchAll(PDO::FETCH_ASSOC); 


foreach($fetechall as $rs_form => $_formation){    
	
$f_array=$_formation['formation'].'-'.$_formation['idforma']; 
$nav_formation.='
  <div class="card border border-dark " >
        <div class="card-body " > 
        <div class="shadow-sm  bg-secondary ">
            <a class="dropdown-item" href="?url=formation&f_for='.$this->base64encode($f_array).'" n_formation="'.$_formation['formation'].'" n_ref_formation="'.$this->base64encode($f_array).'">
                    <div class="card-header txt_drop bg-transparent border-success">
                        <i class="fas fa-list-ul "> </i> '.strtoupper($_formation['formation']).'
                    </div>
            </a> 
        </div>'.$this->liste_chapitre_form($db,$nom_bass,$_formation['idforma'],$_formation['formation'])."
    </div>
    </div>
" ;

}
$nav_formation.='</div></div></div></div></li>';


return $nav_formation; 
}

public function liste_contact($db,$nom_bass){
$liste_contact = '<li class="nav-item nav-itm-border">
<a class="nav-link" href="?url=contact"> <i class="fas fa-address-book fa-1x"></i> Contact </a>
</li>
<li class="nav-item nav-itm-border">
</li>
</ul>
<form class="form-inline my-2 my-lg-0">
<input class="form-control mr-sm-2" type="Recherche" placeholder="Recherche" aria-label="Search">
<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Recherche</button>
</form>
</nav>
</div> 
</section>';
return $liste_contact;
}

public function liste_menu_formation(){
return '<a class="dropdown-item" href="?url=statisfait">Clients Statisfait </a>';
}    
}

class l_calander_formation extends url{
    
    
    
    
    
}

// fin class url --- > 







?>
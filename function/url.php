<?php 
include_once("url_db.php"); 
define('d', date('Y'))  ;  
 class url extends url_db{
    
        public $array= array("cgu"=>"cgu","historique"=>"historique", "concept"=>"concept" ); 
public function piedpage() {
            


            $pied_page='<div> 
            <div class="container shadow rounded p-2 m-1 bg-dark row">

            <div class="col-md-4 col-sm-6 col-xs-4 col-12 mb-2">
              <div class="card p-1 mb-1 ">

                    <div class="shadow-sm  rounded text text-light p-2 bg-secondary">

                    <address class="text text-center"><div class="shadow-sm  rounded  p-2 bg-light "><img src="imgformation/vetechdesign.png"  class="logo_addr"> </div></address>
                    <hr>
                    <p> <i class="fas fa-map-marker-alt fa-1x" > </i> <span class="align-top">Marcory derrière ORCA DECO cité Hibiscus </span></p>
                    <p><i class="fas fa-phone-square-alt fa-1x" > </i> <span class="align-top">(+225) 21 000 312 / 74 79 49 04</span> </p>

                    <p > <i class="fas fa-at fa-1x" > </i> <span class="align-top"> contacts@vetechdesign.net</span></p>
                    <hr>
                    </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-4 col-12 mb-2">
              <div class="card p-1 mb-1 bg-secondary">
                <div class="shadow-sm  rounded text_reseau_cont p-3 bg-light"><h4 class="shadow-sm  rounded  p-3 mb-2 bg-secondary text text-center text-light text_reseau"><i class="fas fa-globe-americas fa-1x"></i> Réseaux sociaux </h4>
                <hr>
                <p> <a href="https://web.facebook.com/vetechdesign/?ref=br_rs&_rdc=10&_rdr" target="_blank" class="text text-dark "><i class="fab fa-facebook-square fa-1x" > </i> <span class="align-top">Facebook</span>  </a></p>
                <p> <a href="https://twitter.com/VetechD?s=03" target="_blank" class="text text-dark"><i class="fab fa-twitter-square fa-1x" > </i> <span class="align-top">Twitter </span> </a></p>
                <p> <a href="" class="text text-dark" target="_blank"><i class="fab fa-linkedin fa-1x" > </i> <span class="align-top">Linkedin </span></a></p>
                <p> <a href="" class="text text-dark"><i class="fab fa-instagram fa-1x" target="_blank" > </i> <span class="align-top">Instagram</span> </a></p>
                <p> <a href="" class="text text-dark" target="_blank"><i class="fab fa-whatsapp-square fa-1x" > </i><span class="align-top"> Whatsapp </span> </a></p>
                <hr>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-4 col-12 mb-2">
              <div class="card p-1 mb-1 bg-secondary">
                <div class="shadow-sm rounded text_autre_cont p-3 bg-light"><h4 class="shadow-sm  rounded  p-2 mb-2 bg-secondary text text-center text-light text_autre"> <i class="fas fa-outdent fa-1x"></i> AUTRES </h4>
                <hr>
                <p> <a href="?url=cgu&f_for='.$this->base64encode("historique").'" class="text text-dark "><i class="fas fa-history fa-1x" > </i> <span class="align-top">Historique </span>  </a></p>
                <p> <a href="?url=cgu&f_for='.$this->base64encode("concept").'" class="text text-dark"><i class="fas fa-info fa-1x" > </i> <span class="align-top "> Concept </span> </a></p>
                <p> <a href="?url=cgu&f_for='.$this->base64encode("cgu").'" class="text text-dark"><i class="fas fa-clipboard-check fa-1x" > </i> <span class="align-top">CGU</span> </a></p>
                <hr>
                </div>
              </div>
            </div>

            
            </div> </div>
            <hr>
            <div class="shadow  rounded  p-3 bg-dark text text-light">VETECH&DESIGN <i class="far fa-copyright fa-1x"></i> 2015-'.d.' <div class="float-right"> <i class="fas fa-desktop  fa-2x"></i>|<i class="fas fa-tablet-alt fa-2x"></i>|<i class="fas fa-mobile-alt fa-2x"></i></div></div>
            </div>
            '; 
            return $pied_page; 
    }
public function connect_all($_token,$_session_info){ 
	$f_connet_client = '<form id="form-inline" class=" form-inline"><div class="container shadow p-3 mb-3 mt-4 bg-light rounded row">
    <div class="col-md-3 pl-0">

    			<div class="input-group mb-2  ">
    			<div class="input-group-prepend">
    			<div class="input-group-text"><i class="fas fa-at"></i></div>
    			</div>
    			<input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="email_connect_all" value=""  placeholder="Adresse E-mail">
    			</div>

      </div>

      <div class="col-md-3 pl-0">

            <div class="input-group mb-1">
    			<div class="input-group-prepend">
        			<div class="input-group-text"><i class="fas fa-key"></i></div>
        			</div>
    			<input type="password" class="form-control " name="mdp_connect_all" id="inlineFormInputName3" value="" placeholder="Mot de passe">
          </div>
      </div>
      
      
            <input type="hidden" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="token" value="'.$_token.'" placeholder="token">
      <div class="col-md-1 pt-1  pl-0">

    			<div class="form-check text-center mb-3 p-2">
    			<input class="form-check-input" type="checkbox" title="Sauvegarde mon mot de passe" id="inlineFormCheck">
    			</div>
      </div>
      <div class="col-md-2 pl-0 ">

			<button type="button" class="btn btn-success btn-block  mb-2 p-1 connexion_all" token_vetech="'.$_token.'"> <i class="fas fa-sign-in-alt"></i> <span class="text-conn">Connexion</span></button>
      </div>
      <div class="col-md-2 pl-0 ">
			<a href="?url=inscription" class="mb-2 p-1 btn btn-block btn-primary"> Inscription </a></div>
			 <div class="alert-connect"> </div>

      </div></form> ';
    
  if(empty($_session_info)): 
return $f_connet_client; 
    elseif(isset($_session_info['type'])&&$_session_info['type']==0): 
     return '<div class=" shadow p-2 mb-3 bg-light rounded"><div class="row"><h4 class="p-3 mb-3 text text-danger left"> Allez <i class="fas fa-walking fa-2x"></i> à votre compte</h4> <div > <a class="btn btn-secondary shadow-sm p-2 mb-2 " href="'.$this->connect_client.'"><i class="fas fa-door-open fa-2x   "></i> <p>Compte</p></a> </div><div > <button type="button" class="btn btn-warning shadow-sm mb-2 p-2 deconnect-all" ><i class="fas fa-door-closed fa-2x   "></i> <p>Déconnexion</p></button></div> </div></div>';
    elseif(isset($_session_info['type'])&&$_session_info['type']==1): 
    return '<div class=" shadow p-2 mb-3 bg-light rounded"><div class="row"><h4 class="p-3 mb-3 text text-danger left"> Allez <i class="fas fa-walking fa-2x"></i> à votre compte</h4> <div > <a class="btn btn-secondary shadow-sm p-2 mb-2 " href="'.$this->connect_client.'"><i class="fas fa-door-open fa-2x   "></i> <p>Compte</p></a> </div><div > <button type="button" class="btn btn-warning shadow-sm mb-2 p-2 deconnect-all" ><i class="fas fa-door-closed fa-2x   "></i> <p>Déconnexion</p></button></div> </div></div>';
    elseif(isset($_session_info['type'])&&$_session_info['type']==2): 
    return '<div class=" shadow p-2 mb-3 bg-light rounded"><div class="row"><h4 class="p-3 mb-3 text text-danger left"> Allez <i class="fas fa-walking fa-2x"></i> à votre compte</h4> <div > <a class="btn btn-secondary shadow-sm p-2 mb-2 " href="'.$this->connect_dessinateur.'"><i class="fas fa-door-open fa-2x   "></i> <p>Compte</p></a> </div><div > <button type="button" class="btn btn-warning shadow-sm mb-2 p-2 deconnect-all" ><i class="fas fa-door-closed fa-2x   "></i> <p>Déconnexion</p></button></div> </div></div>';
    else: 
    return '<div class=" shadow p-3 mb-5 bg-light rounded"><div class="row"><h3 class="p-3 mb-3 text text-danger left"> Allez <i class="fas fa-walking fa-2x"></i> à votre compte</h3> <div > <a class="btn btn-secondary shadow-sm p-3 mb-3 " href="'.$this->connect_error.'"><i class="fas fa-door-open fa-3x   "></i> <p>Compte</p></a> </div><div > <button type="button" class="btn btn-warning shadow-sm mb-3 p-3 deconnect-all" ><i class="fas fa-door-closed fa-3x   "></i> <p>Déconnexion</p></button></div> </div></div>';
    endif; 
    }
	 
public function recherche($_token,$_session_info,$db, $_bass){ 
$recherche = '<div class="maxwidth clearfix">
		<form class="pure-form" action="/creer-une-annonce" method="post" id="xmod-recherche-form" accept-charset="UTF-8"><div><span class="search_block_title">Rerchercher <strong>une annonce</strong> :</span><div class="form-item form-type-textfield form-item-search">
 <input placeholder="Recherche..." type="text" id="edit-search" name="search" value="" size="60" maxlength="128" class="form-text">
</div><div class="form-item form-type-select form-item-cat">
 <select id="edit-cat" name="cat" class="form-select"><option value="0">-- Catégorie -- </option><option value="4">Immobilier</option><option value="13">--- Vente Villa</option><option value="14">--- Vente Appartement</option><option value="15">--- Vente Terrain</option><option value="16">--- Vente Immeuble</option><option value="17">--- Location Villa</option><option value="18">--- Location Appartement</option><option value="19">--- Bureaux &amp; Commerce</option><option value="20">--- Villa - Appart. Meublés</option><option value="21">--- Colocation</option><option value="22">--- Location Vacances</option><option value="23">--- Autres</option><option value="100340">--- Entrepôt</option><option value="5">Auto-Moto</option><option value="24">--- Berline</option><option value="25">--- 4X4</option><option value="26">--- Utilitaires</option><option value="27">--- Camions</option><option value="28">--- 2 Roues / Quad</option><option value="29">--- Bâteaux</option><option value="30">--- Pièces Détachées</option><option value="31">--- Location Autos</option><option value="6">Bonnes affaires</option><option value="32">--- Electroménager</option><option value="33">--- Mobilier</option><option value="34">--- Vêtements &amp; Accessoires</option><option value="35">--- Cuisine</option><option value="36">--- Linge &amp; Décoration</option><option value="37">--- Articles Divers</option><option value="38">--- Bricolage</option><option value="7">Multimédia</option><option value="39">--- Informatique</option><option value="40">--- Téléphonie</option><option value="41">--- Image &amp; Sons</option><option value="42">--- Console &amp; Jeux Vidéo</option><option value="8">Emploi-Formation</option><option value="43">--- Offre d\'emploi</option><option value="45">--- Recherche \'emploi</option><option value="46">--- Formation</option><option value="47">--- Cours &amp; Leçons</option><option value="9">Professionnel</option><option value="48">--- Service</option><option value="49">--- Partenariat</option><option value="50">--- Engin &amp; Matériel Pro</option><option value="10">Loisirs Vacances</option><option value="51">--- Hôtels</option><option value="52">--- Campements &amp; Auberges</option><option value="53">--- Art</option><option value="54">--- Matériel Sportifs</option><option value="55">--- Animaux</option><option value="56">--- Vin &amp; Gastronomie</option><option value="57">--- Jeux &amp; Jouets</option><option value="58">--- Instruments de musique</option><option value="59">--- Livre</option><option value="11">Soins &amp; Beauté</option><option value="60">--- Santé</option><option value="61">--- Massage</option><option value="62">--- Esthétique</option><option value="63">--- Produits Cosmétiques</option><option value="64">--- Coiffure</option><option value="12">Rencontres</option><option value="65">--- Homme Cherche</option><option value="66">--- Femme Cherche</option><option value="67">--- Voyance</option></select>
</div>
<div class="form-item form-type-select form-item-lieu">
 <select id="edit-lieu" name="lieu" class="form-select"><option value="0">-- Région -- </option><option value="65">Abengourou</option><option value="57">Abidjan</option><option value="77">Adzopé</option><option value="69">Agboville</option><option value="88">Agnibilekrou</option><option value="94">Akoupé</option><option value="64">Anyama</option><option value="95">Assinie</option><option value="76">Bingerville</option><option value="79">Bondoukou</option><option value="96">Bonoua</option><option value="72">Bouaflé</option><option value="58">Bouaké</option><option value="87">Boundiali</option><option value="70">Dabou</option><option value="59">Daloa</option><option value="89">Daoukro</option><option value="82">Dimbokro</option><option value="62">Divo</option><option value="84">Duékoué</option><option value="81">Ferkessédougou</option><option value="67">Gagnoa</option><option value="71">Grand-Bassam</option><option value="86">Guiglo</option><option value="73">Issia</option><option value="75">Katiola</option><option value="63">Korhogo</option><option value="66">Man</option><option value="83">Odienné</option><option value="80">Oumé</option><option value="60">San Pédro</option><option value="78">Séguéla</option><option value="74">Sinfra</option><option value="68">Soubré</option><option value="92">Tiassalé</option><option value="85">Tingréla</option><option value="93">Toumodi</option><option value="90">Vavoua</option><option value="61">Yamoussoukro</option><option value="91">Zuénoula</option></select>
</div>
<div class=" float-left mr-1 mb-1">
 <select id="edit-cat" name="cat" class="form-control"><option value="0">-- Catégorie --
 </option>'.$_list_cathegorie.'</select></div>
   <div class=" float-left mr-1 mb-1">
 <select id="edit-lieu" name="lieu" class="form-control input-sm">
 <option value="0">-- Région -- </option>'.$_list_region.'</select>

    </div>

<div class=" float-left mr-1 mb-1">

 <select disabled="disabled" class="form-control input-sm mr-1" id="edit-quartier" name="quartier" class="form-select"><option value="0">-- Quartier --</option></select>
   
</div>
<div class=" float-left mr-1 mb-1">
     <button  class=" btn btn-success "> <i class="fas fa-search fa-1x"> </i> Recherche</button>
    </div><div class=" float-left mr-1 mb-1 ">
     <input type="hidden" name="token" value="'.$_token.'">
<input type="hidden" name="form_id" value="xmod_recherche_form">
    </div>
	</form></div>	</div>
';
	
	return $recherche;
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


public function liste_chapitre_service($_db,$_nom_bass,$id_form,$f_formation){
	
	$sql='SELECT * FROM '.$_nom_bass['service'].'.moduleform  WHERE '.$_nom_bass['service'].'.moduleform.idlisteform=? ORDER BY '.$_nom_bass['service'].'.moduleform.idmodule ASC';
	$connect_db = $_db->prepare($sql);
	$connect_db->execute(array($id_form));
	$fetechall =$connect_db->fetchAll(PDO::FETCH_ASSOC); 
	$_titre_chapitre ='<ul class="list-group list-group-flush"> '; 
	foreach($fetechall as $rs_form => $_chaptire){    
	$c_array=	$_chaptire['idlisteform'].'-'.$_chaptire['idmodule'].'-'.$f_formation; 
	$_titre_chapitre .= '<a href="?url=service_chapitre&f_for='.$this->base64encode($c_array).'"><li class="list-group-item "><ol class="txt_drop"><i class="fas fa-eye"></i> '.ucfirst(strtolower($_chaptire['titrechapitre'])).' </ol></li></a> '; 
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

<div class="row">
    <div class="dropdown-menu " aria-labelledby="navbarDropdown p-3 mb-2 " > 
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-2 mb-2 text text-center text-secondary "> 
                        <h4>
                            <i class="fas fa-list fa-2x"></i>   
                            <span>Liste de nos services</span>  
                        </h4> 
                    </div> 
                </div>
            </div>    
            <div class="row">    
';
$sql='SELECT * FROM '.$nom_bass['service'].'.listeformation ORDER BY '.$nom_bass['service'].'.listeformation.formation ASC';
$connect_db = $db->prepare($sql);
$connect_db->execute();
$fetechall =$connect_db->fetchAll(PDO::FETCH_ASSOC); 



foreach($fetechall as $rs_form => $_service){    
	
$f_array=$_service['formation'].'-'.$_service['idforma']; 
$nav_service .='
 
        <div class="col-md-6 col-sm-6 col-xs-6 col-12">
        <div class="card border border-dark p-2 mb-2 " >
            <div class="shadow-sm  bg-secondary ">
                <a class="dropdown-item" href="?url=service&f_for='.$this->base64encode($f_array).'" n_formation="'.$_service['formation'].'" n_ref_formation="'.$this->base64encode($f_array).'">
                    <div class="card-header txt_drop bg-transparent border-success">
                        <i class="fas fa-list-ul "> </i> '.strtoupper($_service['formation']).'
                    </div>
                </a> 
            </div>'.$this->liste_chapitre_service($db,$nom_bass,$_service['idforma'],$_service['formation']).'
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
	$_titre_chapitre .= '<a href="?url=formation_chapitre&f_for='.$this->base64encode($c_array).'"><li class="list-group-item "><ol class="txt_drop"><i class="fas fa-eye"></i> '.ucfirst(strtolower($_chaptire['titrechapitre'])).' </ol></li></a> '; 
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
<div class="row">
    <div class="dropdown-menu" aria-labelledby="navbarDropdown p-3 mb-2 " > 
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-2 mb-2 text text-center text-secondary "> 
                        <h4>
                            <i class="fas fa-user-graduate fa-2x"></i>  
                            <span>Liste de nos formations</span>
                        </h4> 
                    </div> 
                </div>
            </div>

            <div class="row">
';

$sql='SELECT * FROM '.$nom_bass['formation'].'.listeformation ORDER BY '.$nom_bass['formation'].'.listeformation.formation ASC';
$connect_db = $db->prepare($sql);
$connect_db->execute();
$fetechall =$connect_db->fetchAll(PDO::FETCH_ASSOC); 


foreach($fetechall as $rs_form => $_formation){    
	
$f_array=$_formation['formation'].'-'.$_formation['idforma']; 
$nav_formation.='
<div class="col-md-6 col-sm-6 col-xs-6 col-12">
    <div class="card border border-dark p-2 mb-2 " > 
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
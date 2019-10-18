<?php 


require_once("../private/connexion.php");
extract($_POST); 
$u = new url();// class url 
$_session_start = new f_session(); 
$sessionsite=$u->session_site;
$_truefalse=$u->truefalse;
$_domaine_site=$u->domaine_site;
$_session_start->session($u->session_site,$u->truefalse,$u->domaine_site); //ouverture de la session 
$u_token = $_SESSION["token"]; 
$_af_db= $u->liste_db; 
class r_option {
    
public function cat_ville($__db,$_u,$_nom_bass){
$sql_liste_cathegorie ='SELECT * FROM '.$_nom_bass['annonce'].'.cathegorie ';
$cat_connect_db = $__db->prepare($sql_liste_cathegorie);
$cat_connect_db->execute();
$cat_fetechall =$cat_connect_db->fetchAll(PDO::FETCH_ASSOC); 
$_liste_cat =''; 
	foreach($cat_fetechall as $rs_cat => $_cat){    
	
	$_liste_cat  .= '<option id_liste_cat="'.$_u->base64encode($_cat['id_cathegorie']).'" value="'.$_u->base64encode($_cat['id_cathegorie']).'"></i> '.ucfirst(strtolower($_cat['nom_cathegorie'])).' </option> '; 
	}
	$_liste_cat .="";
    
$sql_liste_region ='SELECT * FROM '.$_nom_bass['annonce'].'.region ';
$region_connect_db = $__db->prepare($sql_liste_region);
$region_connect_db->execute();
$region_fetechall =$region_connect_db->fetchAll(PDO::FETCH_ASSOC); 
$_liste_region=''; 
	foreach($region_fetechall as $rs_region => $_region){    
	
	$_liste_region.= '<option id_liste_region="'.$_u->base64encode($_region['id_region']).'" value="'.$_u->base64encode($_region['id_region']).'">'.ucfirst(strtolower($_region['nom_region'])).' </option> '; 
	}
	$_liste_region.="";
    
       $liste = array("code"=>0,"cat"=>$_liste_cat,"region"=>$_liste_region); 
      return json_encode($liste); 
}


}


$r = new r_option(); 
if(isset($token)&&$token==$u_token){
echo $r->cat_ville($db,$u,$_af_db); 
    exit(); 
}else{
$liste = array("code"=>1,"erreur"=>"serveur ne reponds pas!!! "); 
echo json_encode($liste);
        exit(); 
}
?>
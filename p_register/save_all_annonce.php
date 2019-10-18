<?php 
 //action.php  
require_once("../private/connexion.php");
//session($_url_session_name); 
include_once('../p_mail/mail_vetech.php'); 

class f_af extends url{
    
public function __controle_image($nav, $_id_agent,$_id_annonce){
    
    $nav= preg_replace('#[^a-zA-Z0-9@.]#i','',$nav); 
    $en_codeder_nav = $this->base64encode($nav); 
    $en_id_agent= $this->base64encode($_id_agent); 
    $en_id_annonce = $this->base64encode($_id_annonce); 
    ;// lien de destination
   
   
    
    if(!file_exists('../annonce/'.$en_id_agent)){ 
    mkdir('../annonce/'.$en_id_agent); 
     }
    if(!file_exists('../annonce/'.$en_id_agent.'/'.$en_id_annonce)){ 
    mkdir('../annonce/'.$en_id_agent.'/'.$en_id_annonce); 
             }
    $_lien_dst='../annonce/'.$en_id_agent.'/'.$en_id_annonce;
    $_lien_src= '../nav/'.$en_codeder_nav;//lien de recuperation de navigateur.
        if(is_dir($_lien_src)){
        if(file_exists($_lien_src)){
        $_lien_scan =scandir('../nav/'.$en_codeder_nav); 
        $count_scan = count($_lien_scan); 
        if($count_scan>0){
        foreach ($_lien_scan  as $_scan){
        if($_scan != "." && $_scan != ".."){
        copy($_lien_src. '/' .$_scan, $_lien_dst. '/' .$_scan); 
        unlink($_lien_src. '/' .$_scan);
        }

        }

    }
           
            $_url = array('code'=>'1','url'=>'annonce', 'encoder'=>$en_id_annonce); 
            
            return json_encode($_url); 

            
    } 
    }   
    
    
} //
    
public function __insert_annonce($__base,$___af_db,$d___exploide){
    $__ex = explode("/-/", $d___exploide); 
 //	id_annonce 	type_part_pro 	titre_annonce 	contenu_annonce 	surperficie 	prix 	date_publicaction 	id_an_region 	id_an_region_quart 	id_agent_vetech 
    //'.$cat.'/-/'.$type_cat.'/-/'.$ville.'/-/'.$quartier.'/-/'.$estime_annonce.'/-/'.$surface_annonce.'/-/'.$objet_annonce.'/-/'.$escription_annonce; 
    //id_annonce 	type_part_pro 	titre_annonce 	contenu_annonce 	surperficie 	prix 	 	id_an_cat 	id_an_liste_cat 	id_an_region 	id_an_region_quart 	id_agent_vetech 
    $_array_annonce = array(":titre_annonce"=>$__ex[7],
                            ":contenu_annonce"=>$__ex[8],
                            ":surperficie"=>$__ex[6],
                            ":prix"=>$__ex[5],
                            ":id_an_cat"=>$this->base64decode($__ex[1]),
                            ":id_an_liste_cat"=>$this->base64decode($__ex[2]),
                            ":id_an_region"=>$this->base64decode($__ex[3]),
                            ":id_an_region_quart"=>$this->base64decode($__ex[4]),
                            ":id_agent_vetech"=>$__ex[0],
                            ":n_nav"=>$__ex[9]
                           );
   
        $sqlselect= $__base->prepare('INSERT INTO 
        '.$___af_db['annonce'].'.annonce_vetech(titre_annonce, contenu_annonce, surperficie, prix, id_an_cat, id_an_liste_cat, id_an_region, id_an_region_quart, id_agent_vetech, n_nav) 
        VALUES(:titre_annonce, :contenu_annonce, :surperficie, :prix, :id_an_cat, :id_an_liste_cat, :id_an_region, :id_an_region_quart, :id_agent_vetech, :n_nav )');
        $sqlselect->execute($_array_annonce);
        $last_insert= $__base->lastInsertId();
    //titre_annonce 	contenu_annonce 	surperficie 	prix 	id_an_cat 	id_an_liste_cat 	id_an_region 	id_an_region_quart 	id_agent_vetech 	n_nav 
       
        return $this->__controle_image($__ex[9],$__ex[0], $last_insert); 
       // $this->cssmail($contenumail,$pmail,$pform,$psujet,$ptitle,$piedpage, $pdonnearray, $commentmail); 
        
    
}	

public function __insert_agent($_base,$__af_db,$d__exploide,$__nav){
 //id_agent 	nom_agent 	prenom_agent 	mail_agent 	contact_agent 	date_register
        $_ex = explode("/-/", $d__exploide); // decompression d exploide 
        $_array_val = array(":nom_agent"=>$_ex[0],
                           ":prenom_agent"=>$_ex[1],
                           ":mail_agent"=>$_ex[2],
                           ":contact_agent"=>$_ex[3] );// nom 
  
        $sqlselect= $_base->prepare('INSERT INTO 
        '.$__af_db['annonce'].'.info_agent(nom_agent, prenom_agent, mail_agent, contact_agent ) 
        VALUES(:nom_agent, :prenom_agent, :mail_agent, :contact_agent)');  
        $sqlselect->execute($_array_val);
        $last_id = $_base->lastInsertId();
  
 $__ex= $last_id.'/-/'.$_ex[4].'/-/'.$_ex[5].'/-/'.$_ex[6].'/-/'.$_ex[7].'/-/'.$_ex[8].'/-/'.$_ex[9].'/-/'.$_ex[10].'/-/'.$_ex[11].'/-/'.$__nav;// envois de donner en exploide 
    $_lien_dst= '../annonce/'.$last_id;
     if(!file_exists('../annonce/'.$last_id)){ 
    mkdir($_lien_dst);}
    return $this->__insert_annonce($_base,$__af_db,$__ex); 
    
}
    
public function __select_agent($base,$af_db,$dexploide,$_nav){
  //$nom_annonce.'/-/'.$prenom_annonce.'/-/'.$email_annonce.'/-/'.$contact_annonce.'/-/'.$cat.'/-/'.$type_cat.'/-/'.$ville.'/-/'.$quartier.'/-/'.$estime_annonce.'/-/'.$surface_annonce.'/-/'.$objet_annonce.'/-/'.$escription_annonce; 
    $ex = explode("/-/", $dexploide); 
   
    	
    //id_agent 	nom_agent 	prenom_agent 	mail_agent 	contact_agent 	date_register 
    $sqlselect= $base->prepare('SELECT * FROM '.$af_db['annonce'].'.info_agent
    WHERE '.$af_db['annonce'].'.info_agent.mail_agent=?' );
    $sqlselect->execute(array($ex[2]));
    $count =$sqlselect->rowCount(); 
    $row = $sqlselect->fetch(); 
    $_ex= $row['id_agent'].'/-/'.$ex[4].'/-/'.$ex[5].'/-/'.$ex[6].'/-/'.$ex[7].'/-/'.$ex[8].'/-/'.$ex[9].'/-/'.$ex[10].'/-/'.$ex[11].'/-/'.$_nav;
   
    
    
    
    if($count>0){
     
    return $this->__insert_annonce($base,$af_db,$_ex); 
     }else{
    return $this->__insert_agent($base,$af_db,$dexploide,$_nav); 
     }
 
    
}

public function page($_db,$_af_db,$__exploide,$nav){
    
return $this->__select_agent($_db,$_af_db,$__exploide,$nav); 
    
}	
	
	

}
?> 
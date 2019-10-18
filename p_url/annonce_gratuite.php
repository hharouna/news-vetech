<?php 

include_once("../function/url.php"); 

class f_af extends url{
public function news_annonce($_token, $_session_info, $__db,$_nom_bass){
	
$sql_liste_cathegorie ='SELECT * FROM '.$_nom_bass['annonce'].'.cathegorie ';
$cat_connect_db = $__db->prepare($sql_liste_cathegorie);
$cat_connect_db->execute();
$cat_fetechall =$cat_connect_db->fetchAll(PDO::FETCH_ASSOC); 
$_liste_cat =''; 
	foreach($cat_fetechall as $rs_cat => $_cat){    
	
	$_liste_cat  .= '<option id_liste_cat="'.$this->base64encode($_cat['id_cathegorie']).'" value="'.$this->base64encode($_cat['id_cathegorie']).'"></i> '.ucfirst(strtolower($_cat['nom_cathegorie'])).' </option> '; 
	}
	$_liste_cat .="";
$sql_liste_region ='SELECT * FROM '.$_nom_bass['annonce'].'.region ';
$region_connect_db = $__db->prepare($sql_liste_region);
$region_connect_db->execute();
$region_fetechall =$region_connect_db->fetchAll(PDO::FETCH_ASSOC); 
$_liste_region=''; 
	foreach($region_fetechall as $rs_region => $_region){    
	
	$_liste_region.= '<option id_liste_region="'.$this->base64encode($_region['id_region']).'" value="'.$this->base64encode($_region['id_region']).'">'.ucfirst(strtolower($_region['nom_region'])).' </option> '; 
	}
	$_liste_region.="";	
$recherche= '	
<div class=" shadow-sm p-3 mb-3 bg-light rounded ">  
<form class="form-annonce" id="form-annonce" accept-charset="UTF-8"> 
<div class="bg-light shadow-sm rounded mr-1 mb-1 text text-center p-2 text-danger "> <h3> Déposer une annonce gratuite </h3></div>
<div class="row p-3">
'; 

        
	$recherche.='
		
	<div class="col shadow-sm rounded mr-2 bg-dark p-2">
     <hr class="border border-light">
   <div class=" mr-1 mb-1 "><input type="text" class="form-control" name="nom_annonce" value=""placeholder="Nom" > </div>
   <div class=" mr-1 mb-1 "><input type="text" class="form-control" name="prenom_annonce" value=""placeholder="Prénom" ></div>
   <div class=" mr-1 mb-1 "><input type="text" class="form-control" name="email_annonce" value=""placeholder="Adresse E-mail" ></div>
   <div class=" mr-1 mb-1 "><input type="text" class="form-control" name="contact_annonce" value=""placeholder="Contact " ></div>
  
   <hr class="border border-light">
<div class=" mr-1 mb-1 ">
<select id="edit-cat" name="cat" class="form-control">
<option value="0">-- Catégorie -- </option>'.$_liste_cat.'</select></div>
<div class=" mr-1 mb-1 ">
<select id="disabledSelect" name="type_cat" class="form-control edit-typcat">
<option value="0">--Type cathegorie -- </option></select></div>
<hr class="border border-light">
<div class="  mr-1 mb-1">
<select id="edit-lieu" name="ville" class="form-control input-sm">
<option value="">-- Région -- </option>'.$_liste_region.'</select>
</div>

<div class="  mr-1 mb-1">
<select  class="form-control input-sm mr-1 edit-quartier" id="disabledSelect" name="quartier"><option value="">-- Quartier --</option></select>
</div>
<hr class="border border-light">
<div class="  mr-1 mb-1 ">
<input type="hidden" class="token_annonce" name="token_annonce" value="'.$_token.'">
<input type="hidden" class="nav" name="nav" value="">

</div></div>'; 
    
    $recherche.='<div class="col shadow-sm rounded mr-1 p-2">
	<div class="mb-2  ">
      <hr class="border border-dark">
   <div class=" mr-1 mb-1 "><input type="text" name="estime_annonce" class="form-control" value="" placeholder="Estimation de votre bien " > </div>
   <div class=" mr-1 mb-1 "><input type="text" name="surface_annonce" class="form-control" value="" placeholder="Surface " ></div>
   <div class=" mr-1 mb-1 "><input type="text" name="objet_annonce" class="form-control" value=""  placeholder="Objet de l\'annonce : " ></div>
   
  
   <hr class="border border-dark">
	<div class=" mr-1 mb-1">
<textarea class="form-control" name="description_annonce" placeholder="Décrivez votre annonce le plus simplement possible."  ></textarea>
</div>
<div class="  mr-1 mb-1">
<button class=" btn btn-primary btn-update-file form-control" token="'.$_token.'" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">  <i class="fas fa-upload fa-1x"> </i> Telecharger un fichier</button> </div>
<div class="  mr-1 mb-1">
<button class=" btn btn-success btn-annonce-confirm form-control" type="button">  <i class="fas fa-thumbs-up fa-1x"> </i> Confirmation</button>
</div><div class="  mr-1 ">
<div class="  ">
<span class="alert-annonce">  </span>
</div>
<input type="hidden" class="token_recherche" name="token" value="'.$_token.'">
<input type="hidden" class="token_recherche" name="form_annonce" value="form_annonce">
</div>
	</div>
    </div>
    
    
    
    </div></form></div>

 '; 
        
        
  	return $recherche;       
        
        
}
public function page($db,$_array_db,$_exploide,$_session_value,$token){
    
    
    return $this->news_annonce($token, $_session_value , $db,$_array_db); 
    
    
}


}	?>
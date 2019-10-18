<?php
include_once('../function/url.php'); 

class f_af extends url{
    
    
    public function c_annonce($___db,$__array_db,$_id_annonce,$__token){

        $sql='SELECT 
        '.$__array_db['annonce'].'.annonce_vetech.id_annonce as id_an,
		'.$__array_db['annonce'].'.annonce_vetech.titre_annonce as a_titre,
		'.$__array_db['annonce'].'.annonce_vetech.contenu_annonce as a_contenu,
		'.$__array_db['annonce'].'.annonce_vetech.prix as a_prix,
		'.$__array_db['annonce'].'.annonce_vetech.surperficie as a_surface,
        '.$__array_db['annonce'].'.info_agent.id_agent as id_ag,
		'.$__array_db['annonce'].'.cathegorie.nom_cathegorie as a_cathegorie,
		'.$__array_db['annonce'].'.cathegorie.numero_cat as a_contact,
		'.$__array_db['annonce'].'.liste_cathegorie.liste_cat_nom as a_liste_cat,
        '.$__array_db['annonce'].'.region.nom_region as a_region
        FROM 
        '.$__array_db['annonce'].'.annonce_vetech,
        '.$__array_db['annonce'].'.cathegorie, 
        '.$__array_db['annonce'].'.liste_cathegorie, 
        '.$__array_db['annonce'].'.region, 
        '.$__array_db['annonce'].'.region_quartier,
        '.$__array_db['annonce'].'.info_agent
        WHERE 
        '.$__array_db['annonce'].'.annonce_vetech.id_annonce=? 
        AND
		 '.$__array_db['annonce'].'.annonce_vetech.id_an_cat='.$__array_db['annonce'].'.cathegorie.id_cathegorie
        AND
		 '.$__array_db['annonce'].'.annonce_vetech.id_an_liste_cat='.$__array_db['annonce'].'.liste_cathegorie.id_liste_cat
        AND
		 '.$__array_db['annonce'].'.annonce_vetech.id_an_region='.$__array_db['annonce'].'.region.id_region
        AND
        '.$__array_db['annonce'].'.annonce_vetech.id_agent_vetech='.$__array_db['annonce'].'.info_agent.id_agent';
        $connect_db = $___db->prepare($sql);
        $connect_db->execute(array($_id_annonce));
        $count_rs = $connect_db->rowCount();     
        $fetechall =$connect_db->fetch();
   
        $_contenu_module= '<div class=" shadow-sm p-3 mb-2 bg-secondary rounded"> 
		<div class=" shadow-sm p-2 mb-2 bg-light rounded"> 
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">'.$fetechall['a_cathegorie'].'</li>
    <li class="breadcrumb-item">'.$fetechall['a_liste_cat'].'</li>
    <li class="breadcrumb-item " ">'.$fetechall['a_region'].'</li>
  </ol>
</nav></div><div class="row  ">

<div class="fotorama shadow-sm bg-dark p-2  ml-3 mb-2 mr-2 rounded" style="max-height:490px; " id="fotorama"  ">';
 if($count_rs>0){
     if(file_exists("../annonce/".$this->base64encode($fetechall['id_ag'])."/".$this->base64encode($fetechall['id_an']) )){
         $c_dossier= "../annonce/".$this->base64encode($fetechall['id_ag'])."/".$this->base64encode($fetechall['id_an']);
         $_dossier =scandir($c_dossier);
         $count_dossier = count($_dossier); 
              }
     if($count_dossier>0){
         foreach($_dossier as $_image ){
    
$_contenu_module.='<img  src="annonce/'.$this->base64encode($fetechall['id_ag']).'/'.$this->base64encode($fetechall['id_an']).'/'.$_image.'">';
         }
     }
}
        $_contenu_module.='</div> <div class="shadow-sm bg-dark p-1 col ml-2 mr-3  rounded" >
		<div class="shadow-sm bg-light p-2  rounded" >  <strong>Titre annonce : '.$fetechall['a_titre'].' </strong></div>
	
		<div class="row p-3">
		<div class="shadow-sm p-2 col-4 mr-1  bg-light rounded" > <i class="fas fa-info-circle"> </i><strong> Détails annonce</strong> <hr class="border border-dark border-bottom-2">
		<i class="fas fa-list-alt"> </i> Cathégorie <hr>  <strong>'.$fetechall['a_cathegorie'].' </strong> 
	    <hr> <strong>'.$fetechall['a_liste_cat'].' </strong></p> <hr class="border border-dark border-bottom-2">
		<i class="fas fa-map-marked-alt"> </i> localisation <hr> <p> <strong>'.$fetechall['a_region'].' </strong> <hr>
		  <hr class="border border-dark border-bottom-2">
		<i class="fas fa-info-circle"> </i> Prix  <hr>  <strong>'.$fetechall['a_prix'].' F CFA </strong> <hr class="border border-dark border-bottom-2">
		<i class="fas fa-ruler-horizontal"> </i> Surface <hr>  <strong>'.$fetechall['a_surface'].'  M² </strong> <hr class="border border-dark border-bottom-2">
		<i class="fas fa-phone-square-alt"> </i> Contact <hr>  <strong>'.$fetechall['a_contact'].'  </strong> <hr class="border border-dark border-bottom-2">
		</div>
		
		<div class="shadow-sm p-2 col bg-light  rounded" ><h3><i class="fas fa-comments"> </i>  <strong> Description </strong> </h3><hr class="border border-dark border-bottom-2"> <p class="text-break"> '.$fetechall['a_contenu'].' </p> </div>
		</div></div>
		</div>
</div>';
	    return $_contenu_module;
    
}
     
    public function all_annonce($___db,$__array_db,$__exploide,$__session_formation,$__token){
        
        $d_exploide = explode("-",$__exploide);
$_count = count($d_exploide); 
if($_count>=2):
$type_formation = $d_exploide[0];// Selection formation 

$id_formation = $d_exploide[1];// valeur de ID

$sql='SELECT 
'.$__array_db['formation'].'.moduleform.titrechapitre as titre,
'.$__array_db['formation'].'.moduleform.contenumodule as contenu,
'.$__array_db['formation'].'.moduleform.idmodule as idligne
FROM 
'.$__array_db['formation'].'.listeformation,
'.$__array_db['formation'].'.moduleform
WHERE 
'.$__array_db['formation'].'.listeformation.idforma=? 
AND
'.$__array_db['formation'].'.listeformation.idforma='.$__array_db['formation'].'.moduleform.idlisteform
AND
'.$__array_db['formation'].'.moduleform.actmodule="1"
ORDER BY 
'.$__array_db['formation'].'.listeformation.formation ASC';
$connect_db = $___db->prepare($sql);
$connect_db->execute(array($id_formation));
$count_rs = $connect_db->rowCount();     
$fetechall =$connect_db->fetchAll(PDO::FETCH_ASSOC); 


if($count_rs<=0){ 
    
    $_contenu_module= '


<div class=" shadow-sm p-3 mb-3 bg-light rounded">
		<div class=" shadow-sm p-3 mb-5 bg-secondary rounded"><h3 class="text text-white text-center"> Liste des chapitres:  '.$type_formation.'</h3></div>
	    <div class=" shadow-sm p-3 mb-3 bg-warning rounded"><h3 class="text text-white text-center"> Aucun  contenu disponible maintenant !!! </h3></div></div>';
	    return $_contenu_module;

}else{
		
	$_contenu_module= '

	<div class=" shadow-sm p-3 mb-3 bg-light rounded zone_formation">';
	$_contenu_module.= '
		<div class=" shadow-sm p-3 mb-3 bg-secondary rounded titre_zone_formation">
			<h3 class="text text-white text-center"> Liste des chapitres:  '.$type_formation.'</h3>
		</div>
	    
		
			<div class="chap_formation">
				<div id="list-example" class="list-group shadow-sm  ">';
					foreach($fetechall as $af_form => $rs_formation){
								
					$_contenu_module.= '<a class="list-group-item border border-light list-group-item-action text text-info " href="#list-item-'.$rs_formation["idligne"].'">'.$rs_formation["titre"].'</a>';
					}
					$_contenu_module.= '
				</div>
			</div>

			<div class="card border border-light shadow-sm content_formation  p-3 mb-3 overflow-auto bg-light" style="max-width: 695px; max-height: 600px;">
				<div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">';
			
					foreach($fetechall as $af_form => $rs_formation){
					$_contenu_module.= '
					<hr>
					<h4 class="text text-info text-center" id="list-item-'.$rs_formation["idligne"].'">
						 Chapitre : '.$rs_formation["titre"].'
					</h4>';

					$_contenu_module.= '

					 <hr>
					 <p>'.$rs_formation["contenu"].'</p>';
						}

					$_contenu_module.='
				</div>
			</div>
		
</div>';
				
	//var_dump($fetechall); 
	
	return $_contenu_module; 
}
	else : 
	return "<div class='shadow-sm p-3 mb-3 bg-warning rounded  text text-center ' ><h4>Problème de connexion à cette page merci de réessayer !!! </h4> </div>"; 
	endif; 
    }
    public function page($db,$_array_db,$_exploide,$__session_formation,$token){
        
        return $this->c_annonce($db,$_array_db,$_exploide,$__session_formation,$token)
              .$this->all_annonce($db,$_array_db,$_exploide,$__session_formation,$token); 
    }
    
    
    
    
    
    
}


?>
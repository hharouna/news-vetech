<?php 
require_once("../private/connexion.php");

class f_af extends url{
	 

		public $f_af_image = '<div class=" shadow-sm bg-dark   p-3 mb-5  rounded"><div class="row no-gutters bg-light position-relative">
		<div class="col-md-6 mb-md-0 p-md-4">
		<img src="img_vetech/formation.jpg" class="w-100" alt="...">
		</div>
		<div class="col-md-6 position-static p-4 pl-md-0">
		<h5 class="mt-0">Columns with stretched link</h5>
		<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
		<a href="#" class="stretched-link">Go somewhere</a>
		</div></div>
		</div>';
    
public function f_contenu_formation($___db,$__array_db,$__exploide){ 
	$d_exploide = explode("-",$__exploide);
	$type_formation = $d_exploide[0];// Selection formation 
	$id_formation = $d_exploide[1];// valeur de ID

$sql='SELECT 
'.$__array_db['service'].'.moduleform.titrechapitre as titre,
'.$__array_db['service'].'.moduleform.contenumodule as contenu,
'.$__array_db['service'].'.moduleform.idmodule as idligne
FROM 
'.$__array_db['service'].'.listeformation,
'.$__array_db['service'].'.moduleform
WHERE 
'.$__array_db['service'].'.listeformation.idforma=? 
AND
'.$__array_db['service'].'.listeformation.idforma='.$__array_db['service'].'.moduleform.idlisteform
AND
'.$__array_db['service'].'.moduleform.actmodule="1"
ORDER BY 
'.$__array_db['service'].'.listeformation.formation ASC';
$connect_db = $___db->prepare($sql);
$connect_db->execute(array($id_formation));
$count_rs = $connect_db->rowCount();     
$fetechall =$connect_db->fetchAll(PDO::FETCH_ASSOC); 
	
if($count_rs<=0){ 
    
    $_contenu_module= '<div class=" shadow-sm p-3 mb-2 bg-light rounded"><div class=" shadow-sm p-3 mb-5 bg-secondary rounded"><h3 class="text text-white text-center"> Liste des chapitres:  '.$type_formation.'</h3></div>
    <div class=" shadow-sm p-3 mb-5 bg-warning rounded"><h3 class="text text-white text-center"> Aucun  contenu disponible maintenant !!! </h3></div></div>';
    return $_contenu_module;
    }
    else{
	
$_contenu_module= '<div class=" shadow-sm  p-3 mb-5 bg-light rounded">';
$_contenu_module.= '<div class=" shadow-sm p-3 mb-5 bg-primary rounded"><h1 class="text text-white text-center"> Liste des chapitres:  '.$type_formation.'</h1></div>
    <div class="card-colum">';
 foreach($fetechall as $af_form => $rs_formation){
			
$_contenu_module.= '<div class="card border-default mb-3 shadow-sm p-1 " style="max-width: 18rem;">
  <div class="card-header bg-transparent border-default text text-dark text-center"><h4>'.$rs_formation["titre"].'</h4></div>
  <div class="card-body bord text-dark">
    <p class="card-text">'.$rs_formation["contenu"].'</p>
  </div>
  <div class="card-footer bg-transparent border-default"><button class="btn btn-success btn-sm btn-block" title="Prendre un rendez-vous">Prendre un rendez-vous</button></div>
</div>';
}

$_contenu_module.='</div></div>';
	
	//var_dump($fetechall); 
	
	return $_contenu_module; 
}
}

public function page($db,$_array_db,$_exploide){
	         
	return  $this->f_contenu_formation($db,$_array_db,$_exploide).$this->module($db,$_array_db,$_exploide).$this->f_af_image; 

}
	
/* function module  de formation */
public function module($___db,$__array_db,$__exploide){
    $d_exploide = explode("-",$__exploide);
    $type_formation = $d_exploide[0];// Selection formation 
    $id_formation = $d_exploide[1];// valeur de ID
                $date = date("d-m-Y"); 
                $date_str= strtotime($date);
    $sql='SELECT 
    '.$__array_db['service'].'.moduleform.titrechapitre as titre,
    '.$__array_db['service'].'.moduleform.idmodule as idchapitre,
    '.$__array_db['service'].'.sessionform.heure_duree as n_heure, 
    '.$__array_db['service'].'.sessionform.date_session as n_date, 
    '.$__array_db['service'].'.sessionform.heure_session as n_h,
    '.$__array_db['service'].'.sessionform.minute_session as n_m,
    '.$__array_db['service'].'.sessionform.montant_session as n_montant,
    '.$__array_db['service'].'.sessionform.date_str as n_format_str,
    '.$__array_db['service'].'.sessionform.idsessionform as id_ligne_session,
    '.$__array_db['service'].'.listeformation.formation as n_formation,
    '.$__array_db['service'].'.listeformation.idforma as id_formation
    FROM 
    '.$__array_db['service'].'.sessionform,
    '.$__array_db['service'].'.moduleform,
    '.$__array_db['service'].'.listeformation
    WHERE 
    '.$__array_db['service'].'.sessionform.idforma_session=? 
    AND
 '.$__array_db['service'].'.sessionform.idmodule_session='.$__array_db['service'].'.moduleform.idmodule
    AND
    '.$__array_db['service'].'.moduleform.idlisteform='.$__array_db['service'].'.listeformation.idforma
    AND
    '.$__array_db['service'].'.moduleform.actmodule="1"
    AND 
    '.$__array_db['service'].'.sessionform.date_str>='.$date_str.'
    ORDER BY 
    '.$__array_db['service'].'.sessionform.idsessionform DESC';
    $connect_db = $___db->prepare($sql);
    $connect_db->execute(array($id_formation));
    $count_rs = $connect_db->rowCount();     
    $fetechall =$connect_db->fetchAll(PDO::FETCH_ASSOC); 

  if($count_rs<=0){ 
      $_contenu_calender= '<div class=" shadow-sm p-3 mb-5 bg-light rounded">
        <div class=" shadow-sm p-3 mb-5 bg-secondary text-center rounded"><h3 class="text text-white "> Liste des chapitres:  '.$type_formation.'</h3></div>
        <div class=" shadow-sm p-3 mb-5 bg-warning rounded"><h3 class="text text-white text-center"> Aucun  contenu disponible maintenant !!! </h3></div></div>';
        
        }else{
            
			$_contenu_calender= '<div class=" shadow-sm bg-secondary   p-3 mb-5  rounded">'; 
			$_contenu_calender.='<div class="shadow-sm p-3 mb-5 bg-light text text-center rounded "> <h4 class="text text-info ">Calendrier formation : '.$type_formation.'</h4></div>';
	  
			$_contenu_calender.= '<div class="card-columns">';
			foreach($fetechall as $rs_calender =>$row_calander){
                
			$_v_url = $row_calander['n_formation'].
			'.'.$row_calander['titre'].
			'.'.$row_calander['id_formation'].
			'.'.$row_calander['idchapitre'].
			'.'.$row_calander['id_ligne_session'].
			'.'.$row_calander['n_date'].
			'.'.$row_calander['n_heure'].
			'.'.$row_calander['n_h'].
			'.'.$row_calander['n_m'].
			'.'.$row_calander['n_montant'];
			$_contenu_calender.='
            
			<div class="card shadow-sm p-3 mb-5 border-success mb-3" >
			<div class="card-header bg-transparent border-success">'.$row_calander['titre'].'</div>
			<div class="card-body ">
			<h5 class="card-title text text-center text-dark"> Information session </h5>
			<p class="card-text text-info ">Durée: '.$row_calander['n_heure'].' H</p>
			<p class="card-text text-info"> Date : '
			.$row_calander['n_date'].
			' | '.$row_calander['n_h']
			.':'.$row_calander['n_m'].' 
			</p>
			<p class="card-text text-danger">Coût : '.number_format($row_calander['n_montant'],0,',',' ').' F cfa </p>
			</div>
			<div class="card-footer bg-transparent border-success"><a type="button" href="?url=participation&f_for='.$this->base64encode($_v_url).' " class="btn btn-success btn-block" >Participer</a></div>
			</div>
			';
			}
			$_contenu_calender.= '</div></div>';
			return $_contenu_calender; 
            
                
            
            }  
                            } 

    
 
    
    
}



?>
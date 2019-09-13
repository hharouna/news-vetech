<?php 
require_once("../private/connexion.php");

class f_af extends url{
	 

    public $f_af_image = '<div class=" shadow bg-dark   p-3 mb-3  rounded"><div class="row no-gutters bg-light position-relative">
    <div class="col-md-6 mb-md-0 p-md-4">
    <img src="img_vetech/formation.jpg" class="w-100" alt="...">
    </div>
    <div class="col-md-6 position-static p-4 pl-md-0">
    <h5 class="mt-0">Columns with stretched link</h5>
    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
    <a href="#" class="stretched-link">Go somewhere</a>
    </div></div>
    </div>';
    
public function f_contenu_formation($___db,$__array_db,$__exploide,$__session_formation,$__token){ 
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


<div class=" shadow p-3 mb-3 bg-light rounded">
		<div class=" shadow-sm p-3 mb-5 bg-secondary rounded"><h3 class="text text-white text-center"> Liste des chapitres:  '.$type_formation.'</h3></div>
	    <div class=" shadow-sm p-3 mb-3 bg-warning rounded"><h3 class="text text-white text-center"> Aucun  contenu disponible maintenant !!! </h3></div></div>';
	    return $_contenu_module;

}else{
		
	$_contenu_module= '

	<div class=" shadow p-3 mb-3 bg-light rounded zone_formation">';
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
	return "<div class='shadow p-3 mb-3 bg-warning rounded  text text-center ' ><h4>Problème de connexion à cette page merci de réessayer !!! </h4> </div>"; 
	endif; 
}

public function page($db,$_array_db,$_exploide,$__session_formation,$token){
	         
	return  $this->f_contenu_formation($db,$_array_db,$_exploide,$__session_formation,$token).$this->module($db,$_array_db,$_exploide,$__session_formation,$token).$this->f_af_image; 

}
	
/* function module  de formation */
    public function module($___db,$__array_db,$__exploide,$_session_formation,$__token){
    $d_exploide = explode("-",$__exploide);
	$_count = count($d_exploide); 
	if($_count>=2):	
   $type_formation = $d_exploide[0];// Selection formation 
    $id_formation = $d_exploide[1];
                $date = date("d-m-Y"); 
                $date_str= strtotime($date);
    $sql='SELECT 
    '.$__array_db['formation'].'.moduleform.titrechapitre as titre,
    '.$__array_db['formation'].'.moduleform.idmodule as idchapitre,
    '.$__array_db['formation'].'.sessionform.heure_duree as n_heure, 
    '.$__array_db['formation'].'.sessionform.date_session as n_date, 
    '.$__array_db['formation'].'.sessionform.heure_session as n_h,
    '.$__array_db['formation'].'.sessionform.minute_session as n_m,
    '.$__array_db['formation'].'.sessionform.montant_session as n_montant,
    '.$__array_db['formation'].'.sessionform.date_str as n_format_str,
    '.$__array_db['formation'].'.sessionform.idsessionform as id_ligne_session,
    '.$__array_db['formation'].'.listeformation.formation as n_formation,
    '.$__array_db['formation'].'.listeformation.idforma as id_formation
    FROM 
    '.$__array_db['formation'].'.sessionform,
    '.$__array_db['formation'].'.moduleform,
    '.$__array_db['formation'].'.listeformation
    WHERE 
    '.$__array_db['formation'].'.sessionform.idforma_session=? 
    AND
 '.$__array_db['formation'].'.sessionform.idmodule_session='.$__array_db['formation'].'.moduleform.idmodule
    AND
    '.$__array_db['formation'].'.moduleform.idlisteform='.$__array_db['formation'].'.listeformation.idforma
    AND
    '.$__array_db['formation'].'.moduleform.actmodule="1"
    AND 
    '.$__array_db['formation'].'.sessionform.date_str>='.$date_str.'
    ORDER BY 
    '.$__array_db['formation'].'.sessionform.idsessionform DESC';
    $connect_db = $___db->prepare($sql);
    $connect_db->execute(array($id_formation));
    $count_rs = $connect_db->rowCount();     
    $fetechall =$connect_db->fetchAll(PDO::FETCH_ASSOC); 

     if($count_rs<=0){   // valeur de ID
      $_contenu_calender= '<div class=" shadow p-3 mb-5 bg-light rounded">
        <div class=" shadow-sm p-3 mb-5 bg-secondary text-center rounded"><h3 class="text text-white "> Liste des chapitres:  '.$type_formation.'</h3></div>
        <div class=" shadow-sm p-3 mb-3 bg-warning rounded"><h3 class="text text-white text-center"> Aucun  contenu disponible maintenant !!! </h3></div></div>';
        
        }else{
            
			$_contenu_calender= '

<div class=" shadow bg-secondary zonne_calendrier_module  p-3 mb-5  rounded">'; 
			$_contenu_calender.='
	<div class="shadow p-3 mb-5 bg-light text titre_module text-center rounded "> 
		<h4 class="text text-info ">
			Calendrier formation : '.$type_formation.'
		</h4>
	</div>';
			$_contenu_calender.= '
	<div class="card-colums  ">';
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
            
		<div class="card shadow p-3 mb-5 card_module border-success mb-3" >
			<div class="card-header bg-transparent border-success ">
				'.$row_calander['titre'].'
			</div>

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

			<div class="card-footer bg-transparent border-success">
				<a type="button" href="?url=participation&f_for='.$this->base64encode($_v_url).' " class="btn btn-success btn-block" token="'.$__token.'" >
					Participer
				</a>
			</div>
		</div>
			';
			}
			$_contenu_calender.= '
	</div>
</div>';
			return $_contenu_calender; 
            
                
            }  
            
	
		else : 
	return "<div class='shadow p-3 mb-5 bg-warning rounded  text text-center ' ><h4>Problème de connexion à cette page merci de réessayer !!! </h4> </div>"; 
	endif; 
                            } 

    
 
    
    
}



?>
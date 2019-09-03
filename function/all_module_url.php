<?php
include_once('url.php'); 
class all_module_url extends url{
    public function module($___db,$__array_db){
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
    $connect_db->execute();
    $count_rs = $connect_db->rowCount();     
    $fetechall =$connect_db->fetchAll(PDO::FETCH_ASSOC); 

  if($count_rs<=0){ 
        $_contenu_calender= '<div class=" shadow p-3 mb-3bg-light rounded">
                <div class=" shadow-sm p-3 mb-3 bg-warning rounded"><h3 class="text text-white text-center"> Aucun  contenu disponible maintenant !!! </h3></div></div>';
        
        }else{
 
      $_contenu_calender= '<div class=" shadow bg-dark  p-3 mb-3  rounded">'; 
      $_contenu_calender.='<div class="shadow p-3 mb-3 bg-light text text-center  rounded "> <h4 class="text text-info ">Calendrier de toutes les formations </h4></div>';
      $_contenu_calender.= '<div class="card-columns">';
      foreach($fetechall as $rs_calender =>$row_calander){
        $_v_url =$row_calander['n_formation'].
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
		<div class="card shadow-sm p-3 mb-2 border-success " >
		<div class="card-header shadow-sm rounded  bg-dark btext text-light text-center">Module : <strong>'.$row_calander['n_formation'].'</strong></div>
        
		<div class="card-header bg-transparent border-success "><h6>Chapitre :   <strong class="text text-break ">'.ucfirst(strtolower($row_calander['titre'])).'</strong></h6></div>

		<div class="card-text text-info ">Durée: '.$row_calander['n_heure'].' H</div>
		<div class="card-text text-info"> Date : '
		.$row_calander['n_date'].
		' | '.$row_calander['n_h']
		.':'.$row_calander['n_m'].' 
		</div>
		<div class="card-text text-danger">Coût : '.number_format($row_calander['n_montant'],0,',',' ').' F CFA HT </div>
		
		<div class="card-footer bg-transparent border-success"><a type="button" href="?url=participation&f_for='.$this->base64encode($_v_url).'" class="btn btn-success btn-block" >Participer</a></div>
		</div>
		';
          }
       $_contenu_calender.= '</div></div>';
    return $_contenu_calender; 
        
                            } 
	
	
	
	}
	
	
	public function service_module($___db,$__array_db){
		
		$sql='SELECT 
		'.$__array_db['service'].'.listeformation.idforma as t_id_service, 
		'.$__array_db['service'].'.listeformation.formation as t_service, 
		'.$__array_db['service'].'.moduleform.idmodule  as t_id, 
		'.$__array_db['service'].'.moduleform.titrechapitre as t_id_titre, 
		'.$__array_db['service'].'.moduleform.contenumodule as t_contenu,
		'.$__array_db['service'].'.moduleform.datemodule as t_date                                                                                  
    FROM 
	'.$__array_db['service'].'.listeformation,
    '.$__array_db['service'].'.moduleform
    
    WHERE 
     '.$__array_db['service'].'.listeformation.idforma='.$__array_db['service'].'.moduleform.idlisteform ';
    
    $connect_db = $___db->prepare($sql);
    $connect_db->execute();
    $count_rs =$connect_db->rowCount();     
    $fetechall =$connect_db->fetchAll(PDO::FETCH_ASSOC); 
		$liste_sevice ="<div class='shadow p-3 mb-3  rounded'> <div class='shadow-sm bg-dark p-3 mb-3 rounded text text-light'><h3 > NOS SERVICES</h3> </div><marquee style='max-height: 350px; width:auto; '  direction='left' onmouseover='this.stop();' onmouseout='this.start();'> <div class='d-inline-flex  ' > "; 
		
	foreach($fetechall as $rs_servive => $service)	{
		$c_array=	$service['t_id_service'].'-'.$service['t_id'].'-'.$service["t_service"].'-'.$service["t_id_titre"];
		$liste_sevice.= ' <div class="shadow-sm card   border-danger mb-1 m-1" style="max-width: 18rem;">
		<div class="card-header text text-center shadow-sm "><strong>'.$service['t_service'].'</strong></div>
		<div class=" p-2 text text-dark">
		<h6 class="card-title p-2 text text-center text-truncate text-danger">'.ucfirst(strtolower($service['t_id_titre'])).'</h5>
		<div class="row" style="max-width: 250px; max-height: 20px;">
		
		<div  style="max-width: 200px; max-height: 40px; width:auto; 
overflow:hidden;
white-space:nowrap;"> <h6 class=" p-2 mb-2  card-text text text-secondary text-truncate " > ' .$service['t_contenu'].'</h6></div></div>
		<a class="p-2 mb-2" href="?url=service_chapitre&f_for='.$this->base64encode($c_array).'">Lire...</a><hr><date class="text text-secondary">Publier : '.$service['t_date'].' </date>
		</div><div class="card-footer text text-warning">
		<a class="btn btn-warning btn-block border border-danger text text-danger" href="?url=client&f_for='.$this->base64encode($c_array).'"> Prendre un rendez-vous </a> </div> </div>
		';
	}
		
		
		$liste_sevice .=" </div></marquee> </div>"; 

		return $liste_sevice; 
	}
	

}
?>
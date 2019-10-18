<?php 

class f_af{
	
public function resultat_recherche(){
    
}	
	// function liste des region 
 public function liste_recherche($_db,$__af_db,$id__region,$_u){
	 
	 $mc = '%'.$mot.'%';
        if(isset($recheche) && empty($ville) || $ville ==0 && empty($cathegorie) || $cathegorie ==0 && empty($quartier) || $quartier ==0){
            $sql_quartier = "SELECT * FROM 
        ".$__af_db['annonce'].".annonce_vetech
		WHERE "; 
            
        $para_recherche = array(":recherche"=>'%'.$recherche.'%'); 
        }elseif(isset($recheche) && isset($cathegorie) && empty($ville) && empty($quartier)){
        $para_recherche = array(":recherche"=>'%'.$recherche.'%',
        ":cathegorie"=>'%'.$cathegorie.'%'
        ); 
        }elseif(isset($recheche) && isset($cathegorie) && isset($ville) && empty($quartier)){
        $para_recherche = array(":recherche"=>'%'.$recherche.'%',
        ":cathegorie"=>'%'.$cathegorie.'%',
        ":ville"=>'%'.$ville.'%'
        ); 
        }elseif(isset($recheche) && isset($cathegorie) && empty($ville) && empty($quartier)){
        $para_recherche = array(":recherche"=>'%'.$recherche.'%',
        ":cathegorie"=>'%'.$cathegorie.'%',
        ":ville"=>'%'.$ville.'%', 
        ":quartier"=>'%'.$quartier.'%', 
        ); 
        }
     
    
	    header('Content-Type: text/html; charset=iso-8859-1');
		$sql_quartier = "SELECT * FROM 
        ".$__af_db['annonce'].".annonce_vetech,
        ".$__af_db['annonce'].".annonce_vetech, 	
        ".$__af_db['annonce'].".annonce_vetech,	
        ".$__af_db['annonce'].".annonce_vetech,	
        ".$__af_db['annonce'].".annonce_vetech	
		WHERE 
		LIKE  '%".$__af_db['annonce'].".region_quartier.id_re_quart%'
		AND 
		LIKE  '%".$__af_db['annonce'].".region_quartier.id_re_quart'
		AND 
		LIKE  '%".$__af_db['annonce'].".region_quartier.id_re_quart%'
		AND 
		LIKE  '%".$__af_db['annonce'].".region_quartier.id_re_quart%'
		AND 
		LIKE  '%".$__af_db['annonce'].".region_quartier.id_re_quart%'
		"; 
        $recherche= $_db->prepare($sql_quartier);
       
        $recherche>execute($para_recherche);
        $count_liste = $q->rowCount();
        $result_quart= $q->fetchAll(PDO::FETCH_ASSOC);  
	 
	    $f_quatier="<option >-- Quartier --</option>";
		foreach($result_quart as $rs_quart => $_qua){
		$f_quatier.= "<option  id='".$_u->base64encode($_qua['id_quarier'])."'  value='".$_u->base64encode($_qua['id_quarier'])."' >".$_qua['nom_quartier']."</option>"; 
		}
		$f_quatier.=""; 
		$table = $count_liste."/--/".$f_quatier; // return liste des regions
		return  $table; 
	
	}
	
	
}



?>
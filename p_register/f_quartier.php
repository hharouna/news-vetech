<?php 

class f_af{
	
	
	// function liste des region 
 public function liste_quartier($_db,$__af_db,$id__region,$_u){
	   
		$sql_quartier = 'SELECT * FROM '.$__af_db['annonce'].'.region_quartier	 WHERE '.$__af_db['annonce'].'.region_quartier.id_re_quart=? '; 
		$q= $_db->prepare($sql_quartier);
		$q->execute(array($id__region));
		$count_liste = $q->rowCount();
		$result_quart= $q->fetchAll(PDO::FETCH_ASSOC);  
	 
	    $f_quatier="<option >-- Quartier --</option>";
		foreach($result_quart as $rs_quart => $_qua){
		$f_quatier.= "<option  id='".$_u->base64encode($_qua['id_quarier'])."' >".$_qua['com']."</option>"; 
		}
		$f_quatier.=""; 
		$table = $count_liste."/--/".$f_quatier; // return liste des regions
		return  $table; 
	
	}
	
	
}



?>
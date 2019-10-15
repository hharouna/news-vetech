<?php 

class f_af{
	
	
	// function liste des region 
 public function liste_quartier($_db,$__af_db,$id__cathe,$_u){
	   
		$sql_cat = 'SELECT * FROM '.$__af_db['annonce'].'.liste_cathegorie	 WHERE '.$__af_db['annonce'].'.liste_cathegorie.liste_cat_id=? '; 
		$q= $_db->prepare($sql_cat);
		$q->execute(array($id__cathe));
		$count_liste = $q->rowCount();
		$result_quart= $q->fetchAll(PDO::FETCH_ASSOC);  
	 
	    $f_quatier="<option >--Type cathegorie --</option>";
		foreach($result_quart as $rs_quart => $_qua){
		$f_quatier.= "<option  id='".$_u->base64encode($_qua['id_liste_cat'])."' >".$_qua['id_liste_cat']."</option>"; 
		}
		$f_quatier.=""; 
		$table = $count_liste."/--/".$f_quatier; // return liste des regions
		return  $table; 
	
	}
	
	
}



?>
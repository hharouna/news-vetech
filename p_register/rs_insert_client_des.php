<?php
require_once("../private/connexion.php");


class f_af extends url{

public function confirme_mail($__base,$___af_db, $_adress_email){

       $q= $__base->prepare('
		  SELECT 
		  '.$___af_db['client'].'.info_client.id_client as id_info,
		  '.$___af_db['client'].'.info_client.nom_client as nom,
		  '.$___af_db['client'].'.info_client.prenom_client as prenom,
		  '.$___af_db['client'].'.info_client.contact_client as contact,
		  '.$___af_db['client'].'.info_client.adresse_email_client as email,
		  '.$___af_db['client'].'.info_client.mdp_client  as mdp,
		  '.$___af_db['client'].'.info_client.date_client  as date_insc,
		  '.$___af_db['client'].'.info_client.type_connect_client as type
		  FROM 
		  '.$___af_db['client'].'.info_client 
		  WHERE 
		  '.$___af_db['client'].'.info_client.adresse_email_client=:email
		  
		  UNION
		  
		  SELECT 
		  '.$___af_db['dessinateur'].'.info_dessinateur.id_dessinateur  as id_info,
		  '.$___af_db['dessinateur'].'.info_dessinateur.nom_dessinateur as nom,
		  '.$___af_db['dessinateur'].'.info_dessinateur.prenom_dessinateur as prenom,
		  '.$___af_db['dessinateur'].'.info_dessinateur.contact_dessinateur as contact,
		  '.$___af_db['dessinateur'].'.info_dessinateur.adresse_email_dessinateur as email,
		  '.$___af_db['dessinateur'].'.info_dessinateur.mdp_dessinateur  as mdp,
		  '.$___af_db['dessinateur'].'.info_dessinateur.date_dessinateur  as date_insc,
		  '.$___af_db['dessinateur'].'.info_dessinateur.type_connect_dessinateur as type
		  FROM 
		  '.$___af_db["dessinateur"].'.info_dessinateur 
		  WHERE
		  '.$___af_db["dessinateur"].'.info_dessinateur.adresse_email_dessinateur=:email');
        $q->execute(array(':email'=>$_adress_email));
        $countselect = $q-> rowCount();
        $rs_info = $q-> fetch();
	 
	if($countselect>0):
	$array = array("c"=>$countselect,"id"=>$rs_info["id_info"],"mdp"=>$rs_info["mdp"]);
	var_dump($array);
	exit;
	
	return $array ;
	else: 
	$array = array("c"=>$countselect);
	return $array ;
	endif; 
}
public function rs_des($_base,$__af_db,$__array_c_d){
	 
		 $__exploide = explode("/-/", $__array_c_d) ; 
		 $nom= $__exploide[0]; 
		 $prenom= $__exploide[1]; 
		 $e_mail= $__exploide[2]; 
	     $mdp= $__exploide[3];
		 $token= $__exploide[4]; 
		 $type= $__exploide[5]; 

		$nom= preg_replace('#[^a-zA-Z]#i','',$nom);
		$prenom= preg_replace('#[^a-zA-Z]#i','',$prenom);
		$e_mail= preg_replace('#[^a-zA-Z0-9@.]#i','',$e_mail);
        $mdp= preg_replace('#[^a-zA-Z0-9@.&]#i','', $mdp);
		$type= preg_replace('#[^1-2]#i','',$type);
       
     
        $_c_hash_mdp = $this->__c_creation_mdp($mdp);
      
		$arraycompte = array($nom,$prenom,$e_mail, $mdp); 
		$com = array("Le champ Nom est vide","Le champ Prenom est vide","Le champ Adresse E-mail est vide",
		 "Le champ mot de passe est vide !!!"); 
		$c=count($arraycompte); 
		
		for($i=0; $i<$c; $i++){
			// -- compte -- // 
			if($arraycompte[$i]==''): 
			return json_encode(array("code"=>"0","contenu"=>$com[$i],"label"=>"Valider Inscription"));  exit(); endif; 
			}; 
        
		
      if(!filter_var($e_mail, FILTER_VALIDATE_EMAIL)): 
      return json_encode(array("code"=>"0","contenu"=>"Adresse E-mail incorrect !!!","label"=>"Valider Inscription")); exit();  endif; 
      /*
      if(!is_numeric($contact)): 
      return json_encode(array("code"=>"0", "contenu"=>"Votre numero est incorrect !!!")); exit(); endif; */

		
		//$af_c_d=$__af_db["dessinateur"];
		$c_d="dessinateur"; 

		$sqlforma= $_base->prepare('INSERT INTO 
		'.$__af_db["dessinateur"].'.info_dessinateur(
		nom_dessinateur,
		prenom_dessinateur,
		contact_dessinateur,
		adresse_email_dessinateur,
		mdp_dessinateur
		) 
		VALUES(
		:nom_dessinateur,
		:prenom_dessinateur,
		:contact_dessinateur, 
		:adresse_email_dessinateur,
		:mdp_dessinateur)');
		$sqlforma->execute(array(
		':nom_dessinateur'=> $nom,
		':prenom_dessinateur' => $prenom, 
		':contact_dessinateur' =>'00000000', 
		':adresse_email_dessinateur' => $e_mail,
		':mdp_dessinateur' => $_c_hash_mdp
		));
		$userid= $_base->lastInsertId(); // recuperation de ID  
	
	$_SESSION["INFO_CONNECTER"]=array(
	'id_info'=>$userid,
	'nom'=>$nom,
	'prenom'=>$prenom,
	'contact'=>$contact,
	'email'=>$e_mail,
	'mdp'=>$_c_hash_mdp,
	'date'=>date("d-m-Y"),
	'nav'=>$_SERVER["HTTP_USER_AGENT"],
	'ip'=>$_SERVER["REMOTE_ADDR"],
    'type' => "2"   
	 ); 
	 return json_encode(array("code"=>"1","url"=>$this->connect_dessinateur)); exit(); 
}
public function rs_client($_base,$__af_db,$__array_c_d){
	 
     $__exploide = explode("/-/", $__array_c_d) ; 
	
	
	 $nom= $__exploide[0]; 
	 $prenom= $__exploide[1]; 
	 $contact= $__exploide[2];
	 $e_mail= $__exploide[3]; 
	 $token= $__exploide[4]; 
	 $type= $__exploide[5]; 
	 $commentaire= $__exploide[6]; 
     $secteur= $__exploide[7];
	 $connect= $__exploide[8];
	//$nom.'/-/'.$prenom.'/-/'.$contact.'/-/'.$e_mail.'/-/'.$token.'/-/'.$type.'/-/'.$commentaire.'/-/'.$secteur.'/-/'.;
	  
      
        $nom= preg_replace('#[^a-zA-Z]#i','',$nom);
        $prenom= preg_replace('#[^a-zA-Z]#i','',$prenom);
        $e_mail= preg_replace('#[^a-zA-Z0-9@.]#i','',$e_mail);
        $secteur= preg_replace('#[^a-zA-Z]#i','',$secteur);
	    $connect= preg_replace('#[^a-zA-Z]#i','',$connect);
        $com_add = addslashes($commentaire);
        
        $contact= preg_replace('#[^0-9]#i','',$contact);
        $type= preg_replace('#[^1-2]#i','',$type);
 
        $arraycompte = array($nom,$prenom,$e_mail, $contact ); 
        $com = array("Le champ Nom est vide","Le champ Prenom est vide","Le champ Adresse E-mail est vide",
        "Le champ Contact est vide ou incorrect !!!"); 
        $c=count($arraycompte); 

        for($i=0; $i<$c; $i++){
        // -- compte -- // ,"label"=>"Valider Inscription"
        if($arraycompte[$i]==''): 
        return json_encode(array("code"=>"0","contenu"=>$com[$i],"label"=>"Valider formulaire de  demande"));  exit(); endif; 
        }; 


        if(!filter_var($e_mail, FILTER_VALIDATE_EMAIL)): 
        return json_encode(array("code"=>"0","contenu"=>"Adresse E-mail incorrect !!!","label"=>"Valider formulaire de  demande ")); exit();  endif; 

        if(!is_numeric($contact)): 
        return json_encode(array("code"=>"0", "contenu"=>"Votre numero est incorrect !!!","label"=>"Valider formulaire de  demande ")); exit(); endif;
	
        
	 
        // creation de mot de passe client 
       $_count_rs = $this->confirme_mail($_base,$__af_db,$e_mail);
       if($_count_rs["c"]==0):
        $mdp ='vetech'.$nom[0].$prenom[0].rand(20,3000);
	    $_c_hash_mdp = $this->__c_creation_mdp($mdp);
       /*$sql_forma->bindValue(':nom_client', $nom);
        $sql_forma->bindValue(':prenom_client', $prenom);
        $sql_forma->bindValue(':contact_client', $contact);
        $sql_forma->bindValue(':adresse_email_client', $e_mail );
        $sql_forma->bindValue(':mdp_client',$_c_hash_mdp);
        $sql_forma->bindValue(':type_connect_client', '0');*/
        $valeur = array(
		':nom_client'=>$nom,
		':prenom_client'=>$prenom, 
		':contact_client'=>$contact, 
		':adresse_email_client'=>$e_mail,
		':mdp_client'=>$_c_hash_mdp,
        ':type_connect_client'=>'0'
		);
	 	$sqlforma = $_base->prepare('INSERT INTO  
		'.$__af_db["client"].'.info_client(
		nom_client,
		prenom_client,
		contact_client,
		adresse_email_client,
		mdp_client,
        type_connect_client
		)VALUES(
		:nom_client,
		:prenom_client,
		:contact_client, 
		:adresse_email_client,
		:mdp_client,
        :type_connect_client)');
        
		$sqlforma->execute($valeur);
        $userid= $_base->lastInsertId(); // recuperation de ID
      //nom_client 	prenom_client 	contact_client 	adresse_email_client 	mdp_client 	type_connect_client
	elseif($_count_rs['c']!=0):
	$userid=$_count_rs["id"]; 
	if($userid!=0){
	//id_client_service 	titre_demande 	contenu_client 
	$_id_demande = $this->insert_demande($_base,$__af_db,$secteur,$com_add,$userid);
	//return json_encode(array("code"=>"1","url"=>$this->connect_client)); 
	}else{
	return json_encode(array("code"=>"0", "contenu"=>"Erreur de connexion !!!","label"=>"Valider formulaire de  demande ")); 
	exit();  
	} 
	endif; 
	 
	$_SESSION["INFO_CONNECTER"]=array(
	'id_info'=>$_count_rs['id'],
	'nom'=>$nom,
	'prenom'=>$prenom,
	'contact'=>$contact,
	'email'=>$e_mail,
	'mdp'=>$_count_rs['mdp'],
	'date'=>date("d-m-Y"),
	'nav'=>$_SERVER["HTTP_USER_AGENT"],
	'ip'=>$_SERVER["REMOTE_ADDR"],
    'type' => "0"   
	 ); 
	 return json_encode(array("code"=>"1","url"=>$this->connect_client)); exit(); 
}
public function insert_demande($_db,$___af_db,$_secteur,$_demande,$_laste_id){
        $sql_service= $_db->prepare('INSERT INTO 
		'.$___af_db["client"].'.service_projet(
		id_client_service,
		titre_demande,
		contenu_client,
        service_ip,
        service_nav
		) 
		VALUES(
		:id_client_service,
		:titre_demande,
		:contenu_client, 
        :service_ip,
        :service_nav
        )');
		$sql_service->execute(array(
		':id_client_service'=>$_laste_id,
		':titre_demande'=>$_secteur, 
		':contenu_client'=>$_demande,
        ':service_ip'=>$_SERVER["HTTP_USER_AGENT"], 
        ':service_nav'=>$_SERVER["HTTP_USER_AGENT"] 
          ));
		$demande_id= $_db->lastInsertId(); // recuperation de ID  
        return $demande_id; 
    }
    
public function page($_db,$_af_db,$__array_c_d,$__type){
     
		$__type= preg_replace('#[^1-2]#i','',$__type);
		if(isset($__type)&&$__type==1): 
		return $this->rs_client($_db,$_af_db,$__array_c_d) ; 
		elseif(isset($__type)&&$__type==2): 
		return $this->rs_des($_db,$_af_db,$__array_c_d) ;
		else: 
		return json_encode(array("code"=>"0", "contenu"=>"Probleme de connexion!!!")); exit();
		endif;
		
		
	}
	
	
}
?> 
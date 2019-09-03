<?php

define('nav', $_SERVER["HTTP_USER_AGENT"]);//
define('ip', $_SERVER["REMOTE_ADDR"]);//

class union_client_des extends url{
	
	
	
public function __union($_base, $__af_db,$_info_connect,$__u){
		$info_explode= explode("/-/",$_info_connect); 
		$_adress_email =  $info_explode[0]; 
		$_mdp = $info_explode[1]; 
		
        $arraycompte = array($_adress_email , $_mdp); 
		$com = array("Le champ Adresse E-mail est vide",
		 "Le champ mot de passe est vide !!!"); 
		$c=count($arraycompte); 
		
		for($i=0; $i<$c; $i++){
			// -- compte -- // 
			if($arraycompte[$i]==''): 
			return json_encode(array("code"=>"0","contenu"=>$com[$i]));  exit(); endif; 
			}; 
    
    
	  $q= $_base->prepare('
		  SELECT 
		  '.$__af_db['client'].'.info_client.id_client as id_info,
		  '.$__af_db['client'].'.info_client.nom_client as nom,
		  '.$__af_db['client'].'.info_client.prenom_client as prenom,
		  '.$__af_db['client'].'.info_client.contact_client as contact,
		  '.$__af_db['client'].'.info_client.adresse_email_client as email,
		  '.$__af_db['client'].'.info_client.mdp_client  as mdp,
		  '.$__af_db['client'].'.info_client.date_client  as date_insc,
		  '.$__af_db['client'].'.info_client.type_connect_client as type
		  FROM 
		  '.$__af_db['client'].'.info_client 
		  WHERE 
		  '.$__af_db['client'].'.info_client.adresse_email_client=:email
		  
		  UNION
		  
		  SELECT 
		  '.$__af_db['dessinateur'].'.info_dessinateur.id_dessinateur  as id_info,
		  '.$__af_db['dessinateur'].'.info_dessinateur.nom_dessinateur as nom,
		  '.$__af_db['dessinateur'].'.info_dessinateur.prenom_dessinateur as prenom,
		  '.$__af_db['dessinateur'].'.info_dessinateur.contact_dessinateur as contact,
		  '.$__af_db['dessinateur'].'.info_dessinateur.adresse_email_dessinateur as email,
		  '.$__af_db['dessinateur'].'.info_dessinateur.mdp_dessinateur  as mdp,
		  '.$__af_db['dessinateur'].'.info_dessinateur.date_dessinateur  as date_insc,
		  '.$__af_db['dessinateur'].'.info_dessinateur.type_connect_dessinateur as type
		  FROM 
		  '.$__af_db["dessinateur"].'.info_dessinateur 
		  WHERE
		  '.$__af_db["dessinateur"].'.info_dessinateur.adresse_email_dessinateur=:email');
        $q->execute(array(':email'=>$_adress_email));
        $countselect = $q-> rowCount();
        $rs_info = $q-> fetch();
		
if(isset($countselect)&&$countselect>=1):
    $mdp_verify = $__u->__c_verify_mdp($_mdp,$rs_info["mdp"]); 
  if($mdp_verify==1):  
    
	

    $n = $rs_info["type"];
	if($n==1):
    $_SESSION["INFO_CONNECTER"]=array(
	'id_info'=>$rs_info["id_info"],
	'nom'=>$rs_info["nom"],
	'prenom'=>$rs_info["prenom"],
	'contact'=>$rs_info["contact"],
	'email'=>$rs_info["email"],
	'mdp'=>$rs_info["mdp"],
	'date'=>$rs_info["date_insc"],
	'nav'=>nav,
	'ip'=>ip,
    'type' => $rs_info["type"]   
	 ); 
	$_url_return = json_encode(array("code"=>1, "url"=>$this->connect_client));
	return($_url_return); 
	exit();
	elseif($n==2):
    $_SESSION["INFO_CONNECTER"]=array(
	'id_info'=>$rs_info["id_info"],
	'nom'=>$rs_info["nom"],
	'prenom'=>$rs_info["prenom"],
	'contact'=>$rs_info["contact"],
	'email'=>$rs_info["email"],
	'mdp'=>$rs_info["mdp"],
	'date'=>$rs_info["date_insc"],
	'nav'=>nav,
	'ip'=>ip,
    'type' => $rs_info["type"]   
	 ); 
	$_url_return = json_encode(array("code"=>1, "url"=>$this->connect_dessinateur));
	return($_url_return); 
	exit();
    elseif($n==2):
	$_url_return = json_encode(array("code"=>1, "url"=>$this->site_serveur));
	return($_url_return); 
	exit();
	elseif($n==10):	
	$_url_return = json_encode(array("code"=>0, "contenu"=>"Vérifier votre adresse E-mail !!! "));
	return($_url_return); 
	exit();
    endif; 
    
    else: 
    
    return json_encode(array("code"=>"0","contenu"=>'Erreur sur votre mot de passe !!!'));  exit();
    endif; 
  

	

	
	 else: 

	return json_encode(array("code"=>"0","contenu"=>' Vérifier votre adresse E-mail !!!'));  exit();
    
    
    endif;


	
		 
		 
		 
	 }
	
	
	
	
	
	
	
}






?>
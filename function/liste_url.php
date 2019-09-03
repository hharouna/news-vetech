<?php 


/*  */
class liste_url  {
	
public $p_client ="Client.php";
public $p_dessinateur ="dessinateur.php";
public $liste_url_array = "";
public $liste_url_vetech = array("client"=>"client",
								"dessinateur"=>"dessinateur",
								"promotion"=>"promotion",
								"immobilier"=>"immobilier",
								"terrain"=>"terrain",
								"statifait"=>"statifait"); 
	
/* function retour url contenu de la page   */ 
public function liste($url,$menu_site,$connect_user,$__all_module, $contenu_p_p, $erro_page, $_array_db,$_db,$fforurl,$__session_formation,$token){
            if(isset($url)){
            return  $this->contenu($url,$menu_site,$connect_user,$__all_module, $contenu_p_p,$erro_page,$_array_db,$_db,$fforurl,$__session_formation,$token); 
		   }
}
	
/* function contenu choix de la page */ 	
public function contenu($page_url,$m_site,$u_connect,$__module ,$contenu_pied_page,$u_error_page,$_array_db,$__db, $f_for_url,$___session_formation,$_token){
		$lien_controle = "../p_url/".$page_url.".php"; 
        $lien_controle_register = "../p_register/".$page_url.".php";
	if(isset($page_url)){
	if(file_exists($lien_controle)) :
			include_once($lien_controle);
			$p_af = new f_af();
	
		    return $m_site.$u_connect.$p_af->page($__db,$_array_db,$f_for_url,$___session_formation,$_token).$__module.$contenu_pied_page;
            exit();
    elseif(file_exists($lien_controle_register)) :
			include_once($lien_controle_register);
			$p_af = new f_af();
	
		    return $m_site.$u_connect.$p_af->page($__db,$_array_db,$f_for_url,$___session_formation,$_token).$__module.$contenu_pied_page;
        exit();
     else : 
		    return $m_site.$u_connect.$u_error_page.$__module.$contenu_pied_page; 
            exit();
     endif; 
		}
}

}



?> 
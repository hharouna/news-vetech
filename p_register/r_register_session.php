<?php 
require_once("../private/connexion.php");

extract($_POST);


//nom=haron&prenom=commande&e_mail=suivande&contact=05530080&url_register=TFVNSU9OLkJJTSBhbmQgVmlzdWFsaXphdGlvbi4yMS40NS4yOC4yNy0wNi0yMDE5LjA0LjEyLjMwLjI1MDAw&rs_session_f=rs_session_f

        $u = new url(); 
        $_db = $db; 
        $_af_db= $u->liste_db;// liste des connexion aux basse de données
 

        $d_decoder=$u->base64decode($url_register); // 
        $d_exploide = explode(".",$d_decoder);
        $count_exploide =  count($d_exploide);  
        $_info = $nom.'-'.$prenom.'-'.$e_mail.'-'.$contactform; // envois informations etudiant

        $N_FORMATION = $d_exploide[0];// NOM DE LA FORMATION 
        $N_TITRE_CHAPITRE= $d_exploide[1];// NOM DE LA TITRE DE LA FORMATION
        $ID_FORMATION= $d_exploide[2];// ID DE LA FORMATION 	
        $CHAPITRE= $d_exploide[3]; // ID DU CHAPITRE DE FORMATION 
        $SESSION = $d_exploide[4];// ID DE LA SESSION DE FORMATION 
        $DATE = $d_exploide[5];// DATE DE LA FORMATION
        $N_HEUR= $d_exploide[6];// NOMBRE D'HEUR
        $H = $d_exploide[7];// HEUR DEBUT FORMATION 
        $M = $d_exploide[8];// MINUTE DEBUT FORMATION 
        $MONTANT= $d_exploide[9];// MONTANT DE LA FORMATION
        $TVA = $MONTANT*0.18; // T.V.A 
        $MONTANT_TTC = 	$TVA+$MONTANT; // MONTANT TTC

        $page_url= $save_choix_session_formation; 

    $lien_controle_register = $page_url.".php";
    if(isset($page_url)){
    if(file_exists($lien_controle_register)) :
        
    if($count_exploide>=10): 
        include_once($lien_controle_register);
        $p_af = new f_af();
        echo $p_af->page($db,$_af_db,$d_exploide,$_info,$u);
                         
    else: 
        $rs_encoder = array("code"=>"0","reponse"=>$u->erro_page()); 
        $jsencoder = json_encode($rs_encoder);
        echo($jsencoder);
    endif;  

        endif; 
        
    }; 





?>
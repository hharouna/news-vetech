<?php  
 //action.php  
require_once("../private/connexion.php");
//session($_url_session_name); 
include_once('../p_mail/mail_vetech.php'); 
 

class f_af extends url{

    public function insert_validation_session($_base,$__af_db,$d__exploide,$__info_e,$__u,$_mail){
        $_info = explode("-",$__info_e); 
        $nomform =$_info[0];
        $prenomform =$_info[1]; 
        $adressemailform =$_info[2];
        $contact_form =$_info[3]; 
 
     	
		// retirer tous les element qui son pas des caractères alfa ou numérique  
		$nomform= preg_replace('#[^a-zA-Z]#i','',$nomform);
		$prenomform = preg_replace('#[^a-zA-Z]#i','',$prenomform);
		$adressemailform= preg_replace('#[^a-zA-Z0-9@.]#i','',$adressemailform);
        $contact_form= preg_replace('#[^0-9+]#i','',$contact_form);
       
		$arraycompte = array($nomform,$prenomform,$adressemailform, $contact_form ); 
		$com = array("Le champ Nom est vide","Le champ Prenom est vide","Le champ Adresse E-mail est vide",
		 "Le champ Contact est vide ou incorrect !!!"); 
		$c=count($arraycompte); 
		
		for($i=0; $i<$c; $i++){
			// -- compte -- // 
			if($arraycompte[$i]==''): 
			return json_encode(array("code"=>"1","contenu"=>$com[$i]));  exit(); endif; 
			}; 
        
		
          if(!filter_var($adressemailform, FILTER_VALIDATE_EMAIL)): 
		  return json_encode(array("code"=>"1","contenu"=>"Adresse E-mail incorrect !!!")); exit();  endif; 
		  
		  if(!is_numeric($contact_form)): 
		  return json_encode(array("code"=>"1", "contenu"=>"Votre numero est incorrect !!!")); exit(); endif; 
		
		   		
		$q= $_base->prepare('SELECT * FROM 
        '.$__af_db['formation'].'.formation
        WHERE 
        '.$__af_db['formation'].'.formation.adressemailform = ? ');
		$q->execute(array($adressemailform));
		$email_check = $q-> rowCount();
		$resultform = $q-> fetch();  
		if($email_check>0):
		$userid=$resultform['idformation'];
		 
		endif; 
		
		 
if($email_check <= 0):
                 
				// debut nouvelle inscription 
				$donnearray = array(
				"nomform" => $nomform,
				"prenomform"  => $prenomform , 
				"adressemailform"  => $adressemailform,
				"contact"  => 	$contact_form,	
				"ipform"  => $_SERVER['REMOTE_ADDR'],
				"usernavform"  => $_SERVER['HTTP_USER_AGENT']
				);
				
				$sqlforma= $_base->prepare('INSERT INTO 
                '.$__af_db['formation'].'.formation(
                nomform,
                prenomform,
				adressemailform,
                contact, 
                ipform, 
                usernavform) 
				VALUES(
                :nomform,	
                :prenomform, 
                :adressemailform,	
				:contact, 
				:ipform,	
                :usernavform)');
				
				$sqlforma->execute(array(
				':nomform' => $nomform,
				':prenomform'  => $prenomform, 
				':adressemailform'  => $adressemailform,
				':contact'  => 	$contact_form,
				':ipform'  => $_SERVER['REMOTE_ADDR'],
				':usernavform'  => $_SERVER['HTTP_USER_AGENT']
				));
				
				$userid= $_base->lastInsertId(); // recuperation de ID  
		 
			   // insertion de l'ensembles des modules 
		  
				$insert_selectform = $this->insert_selection($_base,$__af_db,$userid,1, $d__exploide);
			
				// fin nouvelle inscription 
				
	else : 
				// si le mail exite, controlons s'il exite déjà 
				
				
				$q= $_base->prepare('SELECT * 
                FROM 
                '.$__af_db['formation'].'.selectforma 
                WHERE 
                '.$__af_db['formation'].'.selectforma.id_etud_form = ? 
                AND
                '.$__af_db['formation'].'.selectforma.id_session_form = ?');
				$q->execute(array($userid,$d__exploide[4]));
				$countselect = $q-> rowCount();
				$resselectform = $q-> fetch();
	    // verifion s il exite déjà un session correspondante en fonction du chapitre
       // nettoyage dans les cookies de session les formations déjà existant  

        if($countselect <= 0): 
        
         $insert_selectform = $this->insert_selection($_base,$__af_db,$userid,1,$d__exploide);
        
        else : 
         $insert_selectform = $resselectform['idselectform']; 
        
        endif;

			
	
			
			
endif; //fin la function
		 
       		//version de php 
			// preparation envois mail 
				
				
	   
        $reqinfo = 'SELECT
				'.$__af_db['formation'].'.formation.nomform as nom , 
				'.$__af_db['formation'].'.formation.prenomform as prenom,
				'.$__af_db['formation'].'.formation.adressemailform as mails,
				'.$__af_db['formation'].'.listeformation.formation as liste_formation
				FROM
				'.$__af_db['formation'].'.selectforma, 
				'.$__af_db['formation'].'.formation, 
				'.$__af_db['formation'].'.listeformation
				
				WHERE
				'.$__af_db['formation'].'.selectforma.id_etud_form = ? 
				AND 
                '.$__af_db['formation'].'.listeformation.idforma=?
				AND 
                '.$__af_db['formation'].'.selectforma.id_etud_form='.$__af_db['formation'].'.formation.idformation
				';
				$info_q= $_base->prepare($reqinfo);
				$info_q->execute(array($userid,$d__exploide[2]));
				$c_forma = $info_q-> rowCount();
				$req_fetch = $info_q-> fetch();
				
				$jour = date("d-m-Y");  
				$jstrtime = strtotime($jour);// formatage de la date du jour en seconde
				
			    $reqsession = 'SELECT 
				'.$__af_db['formation'].'.sessionform.idsessionform as f_idsession ,
				'.$__af_db['formation'].'.sessionform.date_session as date_ses , 
				'.$__af_db['formation'].'.sessionform.heure_duree as duree,
				'.$__af_db['formation'].'.sessionform.date_str as datestr , 
				'.$__af_db['formation'].'.sessionform.heure_session as heure, 
				'.$__af_db['formation'].'.sessionform.minute_session  as minute , 
				'.$__af_db['formation'].'.sessionform.montant_session as montant, 
				'.$__af_db['formation'].'.listeformation.formation as titre_formation , 
				'.$__af_db['formation'].'.listeformation.idforma as f_idforma , 
				'.$__af_db['formation'].'.moduleform.idmodule as id_mod ,
				'.$__af_db['formation'].'.moduleform.titrechapitre as titre_module,
				'.$__af_db['formation'].'.selectforma.id_etud_form as  f_formation,
				'.$__af_db['formation'].'.selectforma.idselectform as  f_idselectform
				
				FROM
				'.$__af_db['formation'].'.selectforma, 
				'.$__af_db['formation'].'.sessionform, 
				'.$__af_db['formation'].'.moduleform,
				'.$__af_db['formation'].'.listeformation, 
				'.$__af_db['formation'].'.formation
				WHERE 
				'.$__af_db['formation'].'.selectforma.idselectform = ?
				AND
				'.$__af_db['formation'].'.selectforma.id_session_form = '.$__af_db['formation'].'.sessionform.idsessionform
				AND
				'.$__af_db['formation'].'.selectforma.id_module_form= '.$__af_db['formation'].'.moduleform.idmodule
				AND
				'.$__af_db['formation'].'.selectforma.id_etud_form = '.$__af_db['formation'].'.formation.idformation
				AND
				'.$__af_db['formation'].'.selectforma.id_forma_select = '.$__af_db['formation'].'.listeformation.idforma';
				
				$session_q= $_base->prepare($reqsession);
				$session_q->execute(array($insert_selectform));
				$c_session = $session_q-> rowCount();
				$res_fectall_session = $session_q-> fetchAll(PDO::FETCH_ASSOC);
				
				
$pay_vetech_url = 'https://pay.vetechdesign.net';
  
  
$rs_reponse = "<div class='liste-select-valider alert alert-success ' > <h5>Bonjour : ".$req_fetch['prenom']." ".$req_fetch['nom']." 
<br> Merci de consulter votre adresse Email: ".$req_fetch['mails']. "</h5></div>";
$contenu=	"<div class='liste-coontenu'  style='
width: 650px;  height: auto;    padding-bottom: 10px;  overflow: visible;  opacity: 1;  display: block;  padding-top:5px; margin-left:auto;margin-right:auto;' > ";

$commentaire = "<div class='liste-select-valider alert alert-success   > <h4>Bonjour : ".$req_fetch['prenom']." ".$req_fetch['nom']." 
<br> Merci de choisir un moyen de paiement pour finaliser votre inscription aux différentes sessions de formation.</h4></div>";
$contenu=	"<div class='liste-coontenu'  style='
width: 650px;  height: auto;    padding-bottom: 10px;  overflow: visible;  opacity: 1;  display: block;  padding-top:5px; margin-left:auto;margin-right:auto;' > ";

$contenu.= "<div class='liste-titre-fomation' style=' width: 650px;  height: auto;  overflow: visible;  opacity: 1;  display: block;  cursor: inherit;  margin-top: 6px;  color: #C61010;  font-size: 21px;
  letter-spacing: 3px;  word-spacing: 0px;  font-weight: bold;  text-align: center;
' >Formation : ".$req_fetch['liste_formation']."</div>";

//$parametre_get.=sprintf($_SESSION['IDFORMATION'],$rs_session['f_formation'],$rs_session['montant']); // identifiant id Etudiant pour la session connecté  f_participant=$6	
        $parametre_get=''; 
foreach($res_fectall_session as $session_affiche => $rs_session){ 
if(isset($rs_session['datestr'])&& $rs_session['datestr']>= $jstrtime): 
        $TVA =$rs_session['montant']*0.18;
        $MONTANT_TTC=$rs_session['montant']+($rs_session['montant']*0.18);
$parametre_get.=$rs_session['f_idselectform'];// identifiant session formation  id_session=$1
$parametre_get.="&".$rs_session['f_formation']; //identifiant id Etudiant id_forma=$4
$parametre_get.="&".$rs_session['id_mod'];//identifiant module formation id_chapitre=$3
$parametre_get.="&".$rs_session['f_idforma']; //identifant formation id_etudiant=$2;
$parametre_get.="&".$MONTANT_TTC; // montant de la session encours f_montant=$5
$parametre_get.="&".$userid; // identifiant id Etudiant pour la session connecté  f_participant=$6
$parametre_get.="&".$req_fetch['mails']; // identifiant id Etudiant pour la session connecté  f_participant=$6
$parametre_get.="&controle"; // identifiant id Etudiant pour la session connecté  f_participant=$6
$parametre_get.="&".$req_fetch['nom']; // identifiant id Etudiant pour la session connecté  f_participant=$6
$parametre_get.="&".$req_fetch['prenom']; // identifiant id Etudiant pour la session connecté  f_participant=$6
$parametre_get.="&".$rs_session['titre_formation']; // identifiant id Etudiant pour la session connecté  titre_formation=$6 
$parametre_get.="&".$rs_session['titre_module']; // identifiant id Etudiant pour la session connecté  titre_module=$6 
$parametre_get.="&".$rs_session['duree']; // identifiant id Etudiant pour la session connecté  titre_module=$6 date_ses
$parametre_get.="&".$rs_session['date_ses']; // identifiant id Etudiant pour la session connecté  titre_module=$6 
$parametre_get.="&".$rs_session['heure']; // identifiant id Etudiant pour la session connecté  titre_module=$6
$parametre_get.="&".$rs_session['minute']; // identifiant id Etudiant pour la session connecté  titre_module=$6

$contenu.= "<div class='contenu-choix'  style=' width: 650px;  height: auto;  overflow: visible;  opacity: 1; margin-top: 10px;  margin-bottom: 5px;  border-bottom: 1px solid #07437D; padding-bottom:10px; '> <div class='liste-select-formation'  style=' display: inline-block; margin-left:auto; margin-right:auto; border-bottom: 3px solid #07437D; '> <div class='liste-titre-chapitre'  style='  width: 360px;  height: 20px; margin-left:5px;  overflow: visible;  opacity: 1;  display: block;  padding-left: 14px;  position: static; float:left;  border-top: 0px solid #000;  border-left: 3px solid #07437D;  border-right: 4px solid #07437D;  border-bottom: 0px solid #07437D;  font-family: inherit;  color: #07437D;  font-size: 12px;  line-height: 20px;  font-weight: bold;' >Chapitre : ".$rs_session['titre_module']." </div>


<div class='liste-contenu-periode ' style='  width:auto;  height: auto;  overflow: visible;  opacity: 1;  display: -webkit-inline-box;  display: -webkit-inline-flex;  display: -ms-inline-flexbox;  display: inline-flex;  cursor: inherit; ' > <div class='liste-date'  style='width: 140px;  height: 20px;  overflow: visible; opacity: 1;  position: static; padding-left:5px;  border-right: 5px solid #07437D;  font-family: inherit;  color: #07437D;  font-size: 12px;  line-height:20px; font-weight: bold;  text-align: center;'>".$rs_session['date_ses']."</div>

<div class='liste-heure'  style=' width: 40px;  float:left;  height: 20px;  overflow: visible; opacity: 1;  position: static;  border-right: 5px solid #07437D;  font-family: inherit;  color: #07437D;  font-size: 12px;  line-height: 20px; font-weight: bold;  text-align: center;'>".$rs_session['heure']." </div>

<div class='liste-point' onMouseOver='   background: #34B426;  background-size: auto;  color: #FFFFFF;  font-size: 19px;' style='width: 20px;  height: 20px;  float:left;  overflow: visible; opacity: 1;  position: static;  border-right: 5px solid #07437D;  font-family: inherit;  color: #07437D;  font-size: 20px;  line-height: 20px; font-weight: bold;  text-align: center;' >: </div>

<div class='liste-minute' style='width: 40px;  height:30px;  overflow: visible; opacity: 1;  position: static;  border-right: 5px solid #07437D;  font-family: inherit;  color: #07437D;  font-size: 12px;  line-height:20px; font-weight: bold;  text-align: center;  float:left;' >".$rs_session['minute']."</div></div></div>

<div class='contenu-montant' style='  width: 650;  height: auto;  overflow: visible;  opacity: 1; margin-top:3px;  display: -webkit-inline-box;  display: -webkit-inline-flex;  display: -ms-inline-flexbox;  display: inline-flex;  border-bottom: 0px solid #07437D;  ' >
<div class='liste-minute' style='width: 150px;  height:20px;  overflow: visible; opacity: 1;  position: static; margin-left:5px; border-left: 3px solid #07437D;  border-right: 5px solid #07437D;  font-family: inherit;  color: #07437D;  font-size: 12px;  line-height:20px; font-weight: bold;  text-align: center;  float:left;' > Durée :  ".$rs_session['duree']." H </div>

 <div class='c-montant-chap' style='width: 250px;  height: 25px;  overflow: visible;  opacity: 1;  display: block;  border-top: 0px solid #07437D;   border-right: 3px solid #07437D;  border-bottom: 1px solid #07437D; font-family: inherit;  color: #07437D;   font-size: 18px;  line-height: 20px;  

font-weight: bold;  text-align: center; margin-right:5px;   '>".number_format($rs_session['montant'],0,","," ")." F CFA </div><div class='c-mode-paiement ' style='  width: 250px;  height: auto;  overflow: visible;  opacity: 1;  display: block;' >
 <a href='".$pay_vetech_url."/controle/controle.php?url=".$__u->base64encode($parametre_get)."' target='_blank'> <div class='c-btn-valide'  style='  width: 200px;  height: 25px;  overflow: visible;  opacity: 1;  display: block;  box-sizing: border-box;  border-top: 2px solid #07437D;  border-left: 2px solid #07437D;  border-right: 2px solid #07437D; background:#063;   border-bottom: 2px solid #07437D;  border-radius: 5px 5px 5px 5px;  color: #FFF;  font-size: 14px; cursor:pointer; line-height: 20px;  text-align: center;' montant='".$rs_session['montant']."'   idforma='".$rs_session['f_idforma']."' idmodule='".$rs_session['id_mod']."' formation='".$rs_session['f_formation']."'>Moyen Paiement </div></a>
 
 </div></div></div>"; 
		
						endif; 
				}
			
$contenu.=" </div>";
		/*$rs_reload= "<div class='card card-body'> <h5  class='text-success text text-center'>Pour effectuer une nouvelle demande de formation </h5>
		<button class='btn btn-success btn-nouveau-inscrit btn-success btn-sm' type='button' > <i class='fas fa-sync-alt'></i></button></div>";*/
       
     
			$arrayaffiche = array("code"=>"0","url"=>"confirm_register_formation","encoder"=>$__u->base64encode($insert_selectform));
			 // echo json_encode($arrayaffiche);
			
				$versionphp = phpversion();
				
				$A = $req_fetch['mails'];
				$from = "controle@vetechdesign.net"; 
				$sujet = 'Module de Formation : '.$req_fetch['liste_formation']; 
				$ptitle = "FORMATION"; 
          $mail_vetech= $_mail->cssmail($contenu,$req_fetch['mails'],$from,$sujet,$title,'Vetech&Design', $arrayaffiche, $commentaire); 	
        
        return $mail_vetech; 
			//cssmail($contenu,$req_fetch['mails'],$from ,$sujet, $title,'Vetech&Design', $arrayaffiche ,$commentaire);
			
			
				exit(); 		
    }
    
    
    
    public function insert_selection($base,$___af_db,$id_etudiant, $counts_choix, $d___exploide ){
					
       
 
        $sqlselect= $base->prepare('INSERT INTO 
        '.$___af_db['formation'].'.selectforma(id_session_form , id_module_form , id_etud_form, id_forma_select) 
        VALUES(:id_session_form ,:id_module_form, :id_etud_form, :id_forma_select)');
        $base->beginTransaction();
        $insert=""; 
        for($i=0; $i < $counts_choix; $i++) {
        if(isset($counts_choix)):	
        $sqlselect->bindValue(":id_session_form",$d___exploide[4]);// ID DE LA SESSION EN COURS
        $sqlselect->bindValue(":id_module_form",$d___exploide[3]); // IDMODULE CHAPITRE 
        $sqlselect->bindValue(":id_etud_form",$id_etudiant);// ID DE L'ETUDIANT 
        $sqlselect->bindValue(":id_forma_select", $d___exploide[2]);// ID DE LA FORMATION ENCOURS 
        $sqlselect->execute();
        $insert.= $base->lastInsertId();
        sleep(1);
        endif; 
        }
        $base->commit();
        
        $q= $base->prepare('SELECT * 
                FROM 
                '.$___af_db['formation'].'.selectforma 
                WHERE 
                '.$___af_db['formation'].'.selectforma.id_etud_form = ? 
                AND
                '.$___af_db['formation'].'.selectforma.id_session_form = ?');
				$q->execute(array($id_etudiant,$d___exploide[4]));
				//$countselect = $q-> rowCount();
				$resselectform = $q-> fetch();
      $insert_select = $resselectform['idselectform']; 
      return     $insert_select; 
    //	usleep(250000);

}
    
public function page($__db,$__array_db,$exploide,$_info_e,$_u){
	$u_mail = new mail_vetech();
	return $this->insert_validation_session($__db,$__array_db,$exploide,$_info_e,$_u,$u_mail); 
	
	
}
}



 ?>
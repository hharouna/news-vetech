<?php 



require_once("../private/connexion.php");

class f_af extends url {

	

  public   function __liste_mode_paiement($_id_select_form){

       
	
			$panier = '<div class="col-sm-6  mb-3">
			<div class="card  p-3">
			<div class="shadow-sm bg-light p-3 mb-3  rounded text text-left  text-danger text-center" ><h4> Moyens de paiement  </h4> </div>
            <div class="btn-group btn-group-sm" role="group" aria-label="...">
			<button class=" shadow-sm btn btn-light btn-sm" > <img src="img_vetech/images.jpg" style="width:63px; height: 56px;"  class="rounded mx-auto d-block" alt="...">

</button>
            <button class=" shadow-sm btn btn-default btn-sm" ><img src="img_vetech/images.png" style="width:63px; height: 56px;" class="rounded mx-auto d-block" alt="..."></button>
            <button class=" shadow-sm btn btn-default btn-sm" ><img src="img_vetech/moov.png" style="width:63px; height: 56px;"class="rounded mx-auto d-block" alt="..."></button>
            <button class=" shadow-sm btn btn-default btn-sm" ><i class="fab fa-cc-visa fa-4x"></i> </button>
            <button class=" shadow-sm btn btn-default btn-sm" ><i class="fab fa-cc-mastercard fa-4x"></i></button>
            </div>
			</div></div>' ; 
	
	     return $panier; 
		
        } 
	
	
  public function __confirm_register_formation($_base,$__af_db,$__exploide){
        
        
         $q= $_base->prepare('SELECT 
         '.$__af_db['formation'].'.formation.idformation as f_idformation,
         '.$__af_db['formation'].'.formation.nomform as f_nom,
         '.$__af_db['formation'].'.formation.prenomform as f_prenom,
         '.$__af_db['formation'].'.formation.adressemailform as f_mail,
         '.$__af_db['formation'].'.listeformation.formation as f_formation,
         '.$__af_db['formation'].'.listeformation.idforma as f_idforma,
         '.$__af_db['formation'].'.moduleform.titrechapitre as f_chapitre,
         '.$__af_db['formation'].'.moduleform.idmodule as f_idchapitre,
         '.$__af_db['formation'].'.sessionform.heure_duree as f_n_heure,
         '.$__af_db['formation'].'.sessionform.date_session as f_n_date,
         '.$__af_db['formation'].'.sessionform.date_str as f_n_str,
         '.$__af_db['formation'].'.sessionform.heure_session as f_n_h,
         '.$__af_db['formation'].'.sessionform.minute_session as f_n_m,
         '.$__af_db['formation'].'.sessionform.montant_session as f_n_montant,
         '.$__af_db['formation'].'.selectforma.date_select_form as f_date_rs_form
        FROM 
        '.$__af_db['formation'].'.selectforma,
        '.$__af_db['formation'].'.moduleform,
        '.$__af_db['formation'].'.formation,
        '.$__af_db['formation'].'.listeformation,
        '.$__af_db['formation'].'.sessionform
        WHERE 
        '.$__af_db['formation'].'.selectforma.idselectform = ?
        AND
        '.$__af_db['formation'].'.selectforma.id_session_form = '.$__af_db['formation'].'.sessionform.idsessionform
        AND
        '.$__af_db['formation'].'.selectforma.id_module_form= '.$__af_db['formation'].'.moduleform.idmodule
        AND
        '.$__af_db['formation'].'.selectforma.id_etud_form = '.$__af_db['formation'].'.formation.idformation
        AND
        '.$__af_db['formation'].'.selectforma.id_forma_select = '.$__af_db['formation'].'.listeformation.idforma');
        $q->execute(array($__exploide));
        $countselect = $q-> rowCount();
        $resselectform = $q-> fetch();
        $MONTANT =$resselectform['f_n_montant']; 
        $TVA =$resselectform['f_n_montant']*0.18;
        $MONTANT_TTC=($resselectform['f_n_montant']*0.18)+$MONTANT;
        $date = date('d-m-Y');
        $date_j = strtotime($date); 
        //strtolower();
        //strtoupper();
        $_controle_session = 
			   $__exploide.'
            &'.$resselectform['f_idformation'].'
            &'.$resselectform['f_idchapitre'].'
            &'.$resselectform['f_idforma'].'
            &'.$MONTANT_TTC.'
            &'.$resselectform['f_idformation'].'
            &'.$resselectform['f_mail'].'
            &controle
            &'.$resselectform['f_nom'].'
            &'.$resselectform['f_prenom'].'
            &'.$resselectform['f_formation'].'
            &'.$resselectform['f_chapitre'].'
            &'.$resselectform['f_n_heure'].'
            &'.$resselectform['f_n_date'].'
            &'.$resselectform['f_n_h'].'
            &'.$resselectform['f_n_m'];
        
        if($date_j<=$resselectform['f_n_str']):
        

	$_formuaire_part ='<div class=" shadow-sm bg-primary p-3 mb-2 rounded" > 
	<div class="row"> 
	<div class="col-sm-6  mb-3">
	<div class="card  p-3">
    <div class="shadow-sm bg-secondary p-3 mb-3  rounded text   text-light text-center" ><h4> Confirmation  </h4> </div>
    <div class="shadow-sm bg-success p-3 mb-3  rounded text   text-light " > '.strtoupper($resselectform['f_nom']).'    '.strtoupper($resselectform['f_prenom']).' nous confirmons votre inscription à la session de formation, 
    un mail de confirmation vient d\'être envoyé à cette adresse E-mail : ('.$resselectform['f_mail'].')  contenant le lieu de formation.
    Si vous n\'avez pas reçu le mail <button class="btn btn-warning text-light">cliquez-ici</button> pour recevoir de nouveau le mail.
    </div>
    <table class=" table table-hover shadow-sm rounded "> <tr>   <td class="table-success" colspan="6"> Formation: '.$resselectform['f_formation'].' </td> </tr>
			<tr>  <td class="table-secondary text text-dark"  colspan="6">Chapitre : '.$resselectform['f_chapitre'].' </td> </tr>
			<tr>  <td colspan="2"> '.$resselectform['f_n_date'].' </td> <td> '.$resselectform['f_n_h'].':'.$resselectform['f_n_m'].' </td> <td> '.$resselectform['f_n_heure'].' H </td><td></td><td> '.number_format($MONTANT,0,","," ").' F CFA </d> </tr>
			<tr>  <td colspan="5"> Montant H.T </td> <td> '.number_format($MONTANT,0,","," ").' F CFA</td> </tr>
			<tr>  <td colspan="5"> T.V.A 18% </td><td>'.number_format($TVA,0,","," ").' F CFA</td> </tr>
			<tr>  <td colspan="5"> Montant T.T.C </td><td>'.number_format($MONTANT_TTC,0,","," ").' F CFA</td> </tr>
            <tr>  <td colspan="6"> <a class="btn btn-warning btn btn-block text text-danger mb-3 btn-register-part" href="https://pay.vetechdesign.net/controle/controle.php?url='.$this->base64encode($_controle_session).'" target="_blank" type="button" ><h3>Payez maintenant </h3></a> <div class="alert-participation"> </td> </tr>
			</table>

     </div> </div>';
        $_formuaire_part.=$this->__liste_mode_paiement($_base,$__af_db,$__exploide).'</div></div> ';//
     
		return $_formuaire_part; 
	elseif($date_j>$resselectform['f_n_str']&&$countselect!=0):
        $f_array=$resselectform['f_formation'].'-'.$resselectform['f_idforma'];
        return '<div class=" shadow-sm bg-primary p-3 mb-5  rounded" >
        <div class=" shadow-sm bg-warning p-3 mb-5 text text-light rounded" > <h5>Excusez nous '.strtoupper($resselectform['f_nom']).'    '.strtoupper($resselectform['f_prenom']).' cette session est terminé, nous vous conseillons de consulter d\'autres sessions de Formation : <span class="text text-dark" >'.$resselectform['f_formation'].'</span> et du Chapitre : <span class="text text-dark"> '.$resselectform['f_chapitre'].'</span>  <a href="?url=formation&f_for='.$this->base64encode($f_array).'" class="btn btn-success"> Cliquez-ici </a></h4> </div></div>
        </div>';
            
    else: 
        return $this->erro_page();
    endif; 
	
	}
    

	
    public  function page($db,$_array_db,$_exploide,$_session_value){
	
        
     return $this->__confirm_register_formation($db,$_array_db,$_exploide);    
   
      }
    
}









?>
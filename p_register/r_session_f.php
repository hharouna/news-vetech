<?php 


require_once("../private/connexion.php");

class f_af extends url {

		public  function __c_email_exite(){


		}
		public  function __c_session_exite(){


		}

     public   function __save_session_cookies($info_exploide,$___session_value){

		 
	$d_exploide = explode(".",$info_exploide);
	$count_exploide =  count($d_exploide);  
		 
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
	$TVA = $MONTANT*0.18; 
	$MONTANT_TTC = 	$TVA+$MONTANT; 
	

	if(isset($info_exploide)): 	 

	    $_session_value[$ID_FORMATION][]=array("FORMATION"=>$ID_FORMATION,"CHAPITRE"=>$CHAPITRE,"SESSION"=>$SESSION,
				"DATE"=>$DATE,"N_HEUR"=>$N_HEUR,"H"=>$H,"M"=>$M,"MONTANT"=>$MONTANT);
		 $_count = count($_session_value[$ID_FORMATION]);
	
		 
		 endif;
		 
			$panier = '<div class="col-sm-6  mb-3">
			<div class="card  p-3">
			<div class="shadow-sm bg-secondary p-3 mb-3  rounded text text-left  text-light" ><h4>Votre Panier  <span class="badge badge-pill badge-warning text text-danger "><i class="fas fa-cart-arrow-down fa-1x "></i> '. $_count.'</span></h4> </div>
			<table class=" table table-hover shadow-sm rounded "> <tr>   <td class="table-success" colspan="6"> Formation: '.$N_FORMATION.' </td> </tr>
			<tr>  <td class="table-secondary text text-dark"  colspan="6">Chapitre : '.$N_TITRE_CHAPITRE.' </td> </tr>
			<tr>  <td colspan="2"> '.$DATE.' </td> <td> '.$H.':'.$M.' </td> <td> '.$N_HEUR.' H </td><td></td><td> '.number_format($MONTANT,0,","," ").' F CFA </d> </tr>
			<tr>  <td colspan="5"> Montant H.T </td> <td> '.number_format($MONTANT,0,","," ").' F CFA</td> </tr>
			<tr>  <td colspan="5"> T.V.A 18% </td><td>'.number_format($TVA,0,","," ").' F CFA</td> </tr>
			<tr>  <td colspan="5"> Montant T.T.C </td><td>'.number_format($MONTANT_TTC,0,","," ").' F CFA</td> </tr>
			</table>
			</div></div>' ; 
	
	     return $panier; 
		
        } 
	
	
	public function __identifiant_part($__db,$__array_db,$__exploide,$__session_value){

	$_formuaire_part ='<div class=" shadow-sm bg-dark  p-3 mb-5  rounded" > 
	<div class="row"> 
	<div class="col-sm-6  mb-3">
	<div class="card  p-3">
    <form di="form_participation">
	<div class=" shadow-sm bg-secondary p-3 mb-3  rounded text text-center text-light" ><h4>Formulaire de participation</h4></div>
    <div class="shadow-sm p-2 rounded">
	<div class="input-group mb-3">
	<div class="input-group-prepend">
	<span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-user fa-1x"></i> </span>
	</div>
	<input type="text" class="form-control" placeholder="Nom" name="nom" value="" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> 
	</div>
	
	<div class="input-group mb-3">
	<div class="input-group-prepend">
	<span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-user fa-1x"></i></span>
	</div>
	<input type="text" class="form-control" name="prenom" value="" placeholder="Prenom(s)" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
	</div>
	<div class="input-group mb-3">
	<div class="input-group-prepend">
	<span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-at"></i></span>
	</div>
	<input type="text" class="form-control" name="e_mail" value="" placeholder="Adresse E-mail" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
	</div>
    <div class="input-group mb-3">
	<div class="input-group-prepend">
	<span class="input-group-text" id="inputGroup-sizing-default"><i class="far fa-address-book fa-1x"></i></span>
	</div>
	<input type="text" class="form-control" placeholder="contact" name="contact" value="" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    <input type="hidden" class="form-control" placeholder="contact" name="url_register" value="'.$this->base64encode($__exploide).'" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    <input type="hidden" class="form-control" placeholder="contact" name="rs_session_f" value="rs_session_f" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
	</div>
    </form>
	<button class="btn btn-success btn btn-block mb-3 btn-register-part" url_register="'.$this->base64encode($__exploide).'">Confrimer participation </button>    </div></div> </div>';
	
	$_formuaire_part.=$this->__save_session_cookies($__exploide,$__session_value).'</div></div> ';//

		return $_formuaire_part; 
	}
	
    public  function page($db,$_array_db,$_exploide,$_session_value){
	
		$d_exploide = explode(".",$_exploide);
	   $count_exploide =  count($d_exploide);  
		
		if(isset($_exploide)&& $count_exploide>=10): 	 
        return $this->__identifiant_part($db,$_array_db,$_exploide,$_session_value); 
		
		elseif($count_exploide<10):  
		 $Erreur =  "<div class='shadow-sm p-3 mb-5 bg-warning rounded  text text-center '><h3>Problème de connexion à cette page merci de ressayer !!!</h3> </div>"; 
		 return $Erreur;
		 
		 else :
		 
		 header('Location: http://'.$this->serveur_site.'/');
		 exit(); 
		 endif; 
      }
    
}









?>
<?php 


require_once("../private/connexion.php");

class f_af extends url {


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
		 
			$panier = '

			<div class="col-sm-6  mb-3">
				<div class="card  p-3">
					<div class="shadow-sm bg-secondary p-3 mb-3  rounded text text-left  text-light" >
						<h4>Votre Panier  
							<span class="badge badge-pill badge-warning text text-danger ">
								<i class="fas fa-cart-arrow-down fa-1x "></i> '. $_count.'
							</span>
						</h4> 
					</div>

					<div class="row m-0 table table-hover shadow-sm rounded ">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12 table-success"> 
									Formation: '.$N_FORMATION.'
								</div> 
							</div>
							<div class="row border ">  
								<div class="col-md-12 table-secondary text text-dark">
									Chapitre : '.$N_TITRE_CHAPITRE.' 
								</div> 
							</div>
							<div class="row mt-2 border">  
								<div class="col-md-4">
									'.$DATE.' 
								</div>

								<div class="col-md-2"> 
								 	'.$H.':'.$M.' 
								</div> 

								<div class="col-md-2"> 
								 	'.$N_HEUR.' H 
								</div>

								<div class="col-md-4"> 
								 	'.number_format($MONTANT,0,","," ").' F CFA 
								</div> 
							</div>
							<div class="row mt-2 border">  
								<div class="col-md-8">
									Montant H.T 
								</div>

								<div class="col-md-4"> 
								 	'.number_format($MONTANT,0,","," ").' F CFA
								</div> 
							</div>

							<div class="row mt-2 border">  
								<div class="col-md-8">
									T.V.A 18% 
								</div>

								<div class="col-md-4">
									'.number_format($TVA,0,","," ").' F CFA
								</div>
							</div>

							<div class="row mt-2 border ">  
								<div class="col-md-8"> 
									Montant T.T.C 
								</div>
								<div class="col-md-4">
									'.number_format($MONTANT_TTC,0,","," ").' F CFA
								</div> 
							</div>

						</div>
					</div>
				</div>
			</div>' ; 
	
	     return $panier; 
		
        } 
	
	
	public function __identifiant_part($__db,$__array_db,$__exploide,$__session_value,$_token){

	$_formuaire_part ='<div class=" shadow bg-dark  p-3 mb-3 rounded" > 
	<div class="row"> 
	<div class="col-sm-6  mb-3">
	<div class="card  p-3">
    <form id="form_participation">
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
	<input type="text" class="form-control" placeholder="Contact" name="contactform" value="" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
	<input type="hidden" class="form-control" placeholder="" name="token" value="'.$_token.'" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    <input type="hidden" class="form-control" placeholder="" name="url_register" value="'.$this->base64encode($__exploide).'" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    <input type="hidden" class="form-control" placeholder="" name="save_choix_session_formation" value="save_choix_session_formation" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
	</div>
    
    </form>
	<button class="btn btn-success btn btn-block mb-3 btn-register-part" url_register="'.$this->base64encode($__exploide).' " type="button">Confirmer participation </button> <div class="alert-participation"></div>  </div> </div> </div>';
	
	$_formuaire_part.=$this->__save_session_cookies($__exploide,$__session_value).'</div></div> ';//

		return $_formuaire_part; 
	}
	
    public  function page($db,$_array_db,$_exploide,$_session_value,$token){
	
		$d_exploide = explode(".",$_exploide);
	    $count_exploide =  count($d_exploide);  
		
		if(isset($_exploide)&& $count_exploide>=10): 	 
        return $this->__identifiant_part($db,$_array_db,$_exploide,$_session_value,$token); 
		
		elseif($count_exploide<10):  
		 $Erreur =  "<div class='shadow p-3 mb-3 bg-warning rounded  text text-center '><h3>Problème de connexion à cette page merci de ressayer !!!</h3> </div>"; 
		 return $Erreur;
		 
		 else :
		 
		 header('Location: https://'.$this->serveur_site.'/');
		 exit(); 
		 endif; 
      }
    
}









?>
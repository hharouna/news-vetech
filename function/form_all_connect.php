<?php 

class form_all_connect extends url{
	
public function __identifiant_dessinateur($__db,$__array_db,$__exploide,$__session_value){

	$_formuaire_id_des ='<div class=" shadow-sm bg-dark  p-3 mb-3  rounded" > 
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
    <input type="hidden" class="form-control" placeholder="" name="url_register" value="" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    <input type="hidden" class="form-control" placeholder="" name="save_choix_session_formation" value="save_choix_session_formation" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
	</div>
    
    </form>
	<button class="btn btn-success btn btn-block mb-3 btn-register-part" url_register=" " type="button">Confrimer participation </button> <div class="alert-participation"></div>  </div> </div> </div></div></div> ';//

		return $_formuaire_part; 
	}

	
public function liste_module_service($___db,$___array_db){
		
		$sql='SELECT *  FROM '.$___array_db['annonce'].'.cathegorie ';
    
    $connect_db = $___db->prepare($sql);
    $connect_db->execute();
    $count_rs =$connect_db->rowCount();     
    $fetechall =$connect_db->fetchAll(PDO::FETCH_ASSOC);
	$_liste_option = "<option value=''>---Choix du services ---- </option> "; ; 
	foreach($fetechall as $rs_option => $option){
		$_liste_option.= "<option value='".$option["nom_cathegorie"]."'>".$option["nom_cathegorie"]." </option> "; 
		
	}
	return $_liste_option; 
}		
public function form_insc_des($_token){
	
$_contenu_option = '<option>---Consulter la liste---</option>
<option class="">CONSTRUCTION </option>
<option class="">DEMANDE DE VISITE</option>
<option class="">PROPOSITION PROJET</option>
<option class="">INDUSTRIE </option>
<option class="">ARCHITECTURE </option>
<option class="">AUTRES</option>
'; 
$_affiche_bup ='<div class="card mb-3 ">
<div class="mb-3 p-3 ">
<img src="img_vetech/partenaire.png" class="card-img-top" alt="...">
</div>
<div class="card-body card shadow-sm bg-dark text text-light p-2">
<h5 class="card-title"></h5>
<div class="">
<p class="card-text   "><h3>Nous restons a votre disposition pour tous renseignements complementaires</h3></p></div>
<p class="card-text"><small class="text-muted"></small></p>
</div>
</div>';

	$_formuaire_all_client ='<div class=" shadow-sm bg-secondary p-3 mb-3  rounded" > 
	<div class="row"> 
	<div class="col-sm-7 mb-3">'.$_affiche_bup.'
	</div>
	<div class="col-sm-5 mb-3">
	<div class="card  p-3">
    <form id="form_all_connect">
	<div class=" shadow-sm bg-secondary p-3 mb-3  rounded text text-center text-light" ><h4>Formulaire dessinateur</h4></div>
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
	<span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-lock fa-1x"></i></span>
	</div>
	<input type="password" class="form-control" placeholder="Mot de passe" name="mdp" value="" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
	</div> 
    
	
	<input type="hidden" class="form-control" placeholder="" name="token" value="'.$_token.'" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
   <input type="hidden" class="form-control" placeholder="" name="type" value="2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
   
    </form>
	<button class="btn btn-success btn btn-block mb-3 btn-register-c-d" url_register=" " type="button" token="'.$_token.'" >Valider Inscription</button> <div class="alert-form-all"></div>  </div> </div> </div></div></div> ';//

   return $_formuaire_all_client; 
	
}
public function form_demande_devis($__db,$array__db,$_explode,$_token){
	
		
	$_affiche_bup ='<div class="card mb-3 ">
	<div class="mb-3 p-3 ">
	<img src="img_vetech/partenaire.png" class="card-img-top" alt="...">
	</div>
	<div class="card-body card shadow-sm bg-dark text text-light p-2">
	<h5 class="card-title"></h5>
	<div class="">
	<p class="card-text   "><h3>Nous restons a votre disposition pour tous renseignements complementaires</h3></p></div>
	<p class="card-text"><small class="text-muted"></small></p>
	</div>
	</div>';

	$_formuaire_all_client ='<div class=" shadow-sm bg-secondary p-3 mb-3  rounded" > 
	<div class="row"> 
	<div class="col-sm-7 mb-3">'.$_affiche_bup.'
	</div>
	<div class="col-sm-5 mb-3">
	<div class="card  p-3">
    <form id="form_all_connect"">
	<div class=" shadow-sm bg-secondary p-3 mb-3  rounded text text-center text-light" ><h4>Formulaire client</h4></div>
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
	</div> 
    
	
<input type="hidden" class="form-control" placeholder="" name="token" value="'.$_token.'" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
<input type="hidden" class="form-control" placeholder="" name="type" value="1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
<div class="input-group mb-3">
<div class="input-group-prepend">
<span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-outdent"></i></span>
</div>
<select class="form-control" name="secteur">';
	if(isset($_explode)&& $_explode[0]==""): 
    $_formuaire_all_client.= $this->liste_module_service($__db,$array__db); 
	
	$_formuaire_all_client.='</select></div>
<div class="input-group mb-3">
	
	<textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Décrivez nous votre demande ici" name="commentaire" rows="3"></textarea>
	</div>';
	elseif(isset($_explode) && $_explode[0]!="") :

	$_service = $_explode[2]; 
	$_ser_tire = $_explode[3];	
	
	$_formuaire_all_client.='<option class="">'.$_service.'</option></select></div>
	<div class="input-group mb-3">
	<textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Décrivez nous votre demande ici" name="commentaire" rows="3">RDV :  '.$_ser_tire.'.
	</textarea>
	</div>';
	endif; 
$_formuaire_all_client.='

    </form>
	<button class="btn btn-success btn btn-block mb-3 btn-register-c-d" url_register=" " type="button" token="'.$_token.'" >Valider formulaire de  demande </button> <div class="alert-form-all"></div>  </div> </div> </div></div></div> ';//

   return $_formuaire_all_client; 
	
	
}	
	public function form_demande_connect($__db,$array__db,$_explode,$_token,$_session){
	
		
	$_affiche_bup ='<div class="card mb-3 ">
	<div class="mb-3 p-3 ">
	<img src="img_vetech/partenaire.png" class="card-img-top" alt="...">
	</div>
	<div class="card-body card shadow-sm bg-dark text text-light p-2">
	<h5 class="card-title"></h5>
	<div class="">
	<p class="card-text   "><h3>Nous restons a votre disposition pour tous renseignements complementaires</h3></p></div>
	<p class="card-text"><small class="text-muted"></small></p>
	</div>
	</div>';

	$_formuaire_all_client ='<div class=" shadow-sm bg-secondary p-3 mb-5  rounded" > 
	<div class="row"> 
	<div class="col-sm-7 mb-3">'.$_affiche_bup.'
	</div>
	<div class="col-sm-5 mb-3">
	<div class="card  p-3">
    <form id="form_all_connect"">
	<div class=" shadow-sm bg-secondary p-3 mb-3  rounded text text-center text-light" ><h4>Formulaire client</h4></div>
    <div class="shadow-sm p-2 rounded">
	<div class="input-group mb-3">
	<div class="input-group-prepend">
	<span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-user fa-1x"></i> </span>
	</div>
	<input type="button" class="form-control text text-left" placeholder="Nom" name="nom" value="'.$_session['nom'].'" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> 
	</div>
	<div class="input-group mb-3">
	<div class="input-group-prepend">
	<span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-user fa-1x"></i></span>
	</div>
	<input type="button" class="form-control text text-left" name="prenom" value="'.$_session['prenom'].'" placeholder="Prenom(s)" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
	</div>
	<div class="input-group mb-3">
	<div class="input-group-prepend">
	<span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-at"></i></span>
	</div>
	<input type="button" class="form-control text text-left" name="e_mail" value="'.$_session['email'].'" placeholder="Adresse E-mail" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
	</div>
    <div class="input-group mb-3">
	<div class="input-group-prepend">
	<span class="input-group-text" id="inputGroup-sizing-default"><i class="far fa-address-book fa-1x"></i></span>
	</div>
	<input type="button" class="form-control text text-left" placeholder="Contact" name="contactform" value="'.$_session['contact'].'" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
	</div> 
    
	
<input type="hidden" class="form-control" placeholder="" name="token" value="'.$_token.'" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
<input type="hidden" class="form-control" placeholder="" name="type" value="1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
<div class="input-group mb-3">
<div class="input-group-prepend">
<span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-outdent"></i></span>
</div>
<select class="form-control" name="secteur">';
	if(empty($_explode)): 
$_formuaire_all_client.= $this->liste_module_service($__db,$array__db); 
	$_formuaire_all_client.='</select></div>
<div class="input-group mb-3">
	
	<textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Décrivez nous votre demande ici" name="commentaire" rows="3"></textarea>
	</div>';
	else:
 

if(isset($_explode)): 		$_service = $_explode[2]; $_ser_tire = $_explode[3];	else: $_service = ''; $_ser_tire = '';endif; 
		
	$_formuaire_all_client.='<option class="">'.$_service.'</option></select></div>
	<div class="input-group mb-3">

	<textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Décrivez nous votre demande ici" name="commentaire" rows="3">RDV :  '.$_ser_tire.'.
	</textarea>
	</div>';
	endif; 
$_formuaire_all_client.='

    </form>
	<button class="btn btn-success btn btn-block mb-3 btn-register-c-d" url_register=" " type="button" token="'.$_token.'" >Valider formulaire de  demande </button> <div class="alert-form-all"></div>  </div> </div> </div></div></div> ';//

   return $_formuaire_all_client; 
	
	
}	
	
	
}

?> 
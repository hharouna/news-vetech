<?php

class f_af extends url{
    
    public function page($_db,$___array_db,$f__for_url,$__session_formation,$_token){

		
		$_formulaire_contact=' <div class=" shadow p-3 mb-3 bg-light rounded"> <div class="row"><div class="col-sm-7  mb-3"> 
		<div class="shadow-sm bg-secondary p-3 mb-3  rounded text text-center text-light" ><h4>Formulaire contact Vetech&design</h4>';
			
	   $_formulaire_contact.=	'</div><form id="form-contact" class="needs-validation shadow-sm bg-dark  p-3 mb-3  rounded text text-light" novalidate>
		<div class="form-row">';
     if(empty($_SESSION['INFO_CONNECTER'])): 
		   $_formulaire_contact.='<label for="validationCustom01">Nom</label>
		<input type="text" class="form-control" id="validationCustom01" placeholder="Nom" value="" required>
		<input type="hidden" class="form-control" id="validationCustom01" name="token" value="'.$_token.'" placeholder="Nom" value="" required>

     <label for="validationCustom02">Prenom(s)</label>
		<input type="text" class="form-control" id="validationCustom02" placeholder="Prenom(s)" value="" required>

		<label for="validationCustomUsername">Adresse E-mail</label>
		<div class="input-group">
		<div class="input-group-prepend">
		<span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-at"></i></span>
		</div>
		<input type="text" class="form-control" id="validationCustomUsername" placeholder="Adresse E-mail" aria-describedby="inputGroupPrepend" required>

		</div>';
			 else: 
		$_formulaire_contact.=	'<input type="hidden" class="form-control" id="validationCustom01" placeholder="Nom" value="'.$_SESSION['INFO_CONNECTER']["nom"].'" required>
		<input type="hidden" class="form-control" id="validationCustom01" name="token" value="'.$_token.'" placeholder="Nom" value="" required>
		<input type="hidden" class="form-control" id="validationCustom02" placeholder="Prenom(s)" value="'.$_SESSION['INFO_CONNECTER']["prenom"].'"required>	
		<input type="hidden" class="form-control" id="validationCustomUsername" placeholder="Adresse E-mail" value="'.$_SESSION['INFO_CONNECTER']["email"].'" aria-describedby="inputGroupPrepend" required>'; 
		
		
       endif; 
		


		$_formulaire_contact.= '<label for="validationCustom02">Objet du votre message</label>
		<input type="text" class="form-control" id="validationCustom02" placeholder="Objet de votre message : " value="" required>


		<label for="exampleFormControlTextarea1">Contenu de votre message </label>
		<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>


		<div class="form-group">
		<div class="form-check">
		<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
		<label class="form-check-label" for="invalidCheck
		</label>
		<div class="invalid-feedback">
		You must agree before submitting.
		</div>
		</div>
		</div >
		<button class="btn btn-success form-control" type="button" token="'.$_token.'">Envoyer message</button>
		</form>
		</div>
		<div class="col-sm-5 mb-3 "> <div class="shadow-sm  rounded text text-light p-2 bg-secondary">


		<address class="text text-center"><div class="shadow-sm  rounded  p-3 bg-light"><img src="imgformation/vetechdesign.png"> </div></address>
		<hr>
	    <p> <i class="fas fa-map-marker-alt fa-2x" > </i> Marcory derrière ORCA DECO cité Hibiscus</p>
		<p><i class="fas fa-phone-square-alt fa-2x" > </i> (+225) 21 000 312 / 74 79 49 04 </p>
		
		<p> <i class="fas fa-at fa-2x" > </i> contacts@vetechdesign.net</p>
        <hr>
		 <p> <a href="" class="text text-light"><i class="fab fa-facebook-square fa-2x" > </i> Facebook </a></p>
		 <p> <a href="" class="text text-light"><i class="fab fa-twitter-square fa-2x" > </i> Twitter  </a></p>
		 <p> <a href="" class="text text-light"><i class="fab fa-linkedin fa-2x" > </i> Linkedin </a></p>
		 <p> <a href="" class="text text-light"><i class="fab fa-instagram fa-2x" > </i> Instagram </a></p>
		 <p> <a href="" class="text text-light"><i class="fab fa-whatsapp-square fa-2x" > </i> Whatsapp </a></p>
		 
		</div>
		</div></div></div>
		<script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function() {
		use strict";
		window.addEventListener("load", function() {
		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.getElementsByClassName("needs-validation");
		// Loop over them and prevent submission
		var validation = Array.prototype.filter.call(forms, function(form) {
		form.addEventListener("submit", function(event) {
		if (form.checkValidity() === false) {
		event.preventDefault();
		event.stopPropagation();
		}
		form.classList.add("was-validated");
		}, false);
		});
		}, false);
		})();
		</script>'; 

return $_formulaire_contact;         
        
        
        
    }
    
    
}


?>
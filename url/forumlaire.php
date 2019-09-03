<?php 
class formulaire{
    
    public function c($btn,$type,$token){
     $formulaire ='<form class="form-inline" token="'.$token.'" type="'.$type.'">

    <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
    <div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
    <div class="input-group-text">@</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="E-mail">
    </div>
    <label class="sr-only" for="inlineFormInputName2">Name</label>
    <input type="password" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Mot de passe">

    <button type="button" class="btn btn-primary mb-2" btn="'.$btn.'" >Connexion</button>
    <div class="text text-info"><a>mot de passe oublié !!!  </a> </div>
    </form> '; 
    }
    public function rs($btn,$type,$token){
        
    $connect = '<form token="'.$token.'" type="'.$type.'">
    <div class="form-row align-items-center">
    <div class="col-auto">
    <label class="sr-only" for="inlineFormInput">Nom </label>
    <input type="text" class="form-control mb-2" id="inlineFormInput"  name="nom" placeholder="Votre nom">
    </div>
    <div class="col-auto">
    <label class="sr-only" for="inlineFormInput">Nom </label>
    <input type="text" class="form-control mb-2" id="inlineFormInput"  name="prenom" placeholder="Votre prenom">
    </div>
    <div class="col-auto">
    <label class="sr-only" for="inlineFormInputGroup">Prenom</label>
    <div class="input-group mb-2">
    <div class="input-group-prepend">
    <div class="input-group-text">@</div>
    </div>
    <input type="password" class="form-control" id="inlineFormInputGroup" name="email" placeholder="E-mail">
    </div>
    </div>
    <div class="col-auto">
    <label class="sr-only" for="inlineFormInput"> Mot de passe </label>
    <input type="password" class="form-control mb-2" id="inlineFormInput" name="mdp" placeholder="Mot de passe">
    </div>
    <div class="col-auto">
    <div class="form-check mb-2">
    <input class="form-check-input" type="checkbox" id="autoSizingCheck">
    <label class="form-check-label" for="autoSizingCheck">
    Acceptez nos termes 
    </label>
    </div>
    </div>
    <div class="col-auto">
    <button type="button" class="btn btn-primary mb-2" btn="'.$btn.'" >Valider</button>
    </div>
    </div>
    </form>'; 
     return $connect; 
    }
}




?>
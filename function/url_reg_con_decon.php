<?php
/* 
 CONTROLE -->
 REGISTREMENT 
 CONNEXION 
 DECONNEXION 
 SESSION DE FERTURE SITE ET REDIRECTION 
*/


class ins__{
    
    public $nom="";
    public $prenom="";
    public $email="";
    public $mdp="";
    
 public function inscript($__ins,$__db){
     
     $this->nom=$__ins['nom']; 
     $this->prenom=$__ins['prenom']; 
     $this->email= $__ins['email'];
     $this->mdp=$__ins['mdp']; 
     
     
 }
    
    
    
    
}

class connect_session extends ins__{
    
    
    
}


class deconnect_session extends ins__{
    
    
    
    
}



?>
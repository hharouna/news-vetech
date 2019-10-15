<?php 

class nav_all{
	
	public function inser_nav($_db,$___af_db,$_explode){
         $_extrait_ex= explode("/-/",$_explode);
         $_nav=$_extrait_ex[0];//nav
         $nom_prenom = $_extrait_ex[1];//nom 
         $email_adresse = $_extrait_ex[2];// email 
         $_don = array(":name_nav"=>$_nav,
                       ":nom_prenom"=>$nom_prenom, 
                       ":email"=>$email_adresse,
                       ":active_nav"=>"1"); 
        
	$sql_nav= $_db->prepare('INSERT INTO '.$___af_db["nav"].'.nav_all(name_nav,
                       nom_prenom, 
                       email,
                       active_nav)
                       VALUES(
                       :name_nav,
                       :nom_prenom, 
                       :email,
                       :active_nav)');
	$sql_nav->execute($_don);
	$id_nav= $_db->lastInsertId(); // recuperation de ID  
        if(!file_exists("../nav/".$_nav)){
			mkdir("../nav/".$_nav,0755);
			}
    $c_nav= json_encode(array("count"=>$id_nav,"nav"=>$id_nav));
	return  $c_nav; 
	}
	public function select_nav($___db,$___af_db,$_nav,$_nav_url, $_token){
			
	$sql_nav='SELECT * FROM '.$___af_db['nav'].'.nav_all WHERE '.$___af_db['nav'].'.nav_all.name_nav=? ';
	$connect_db = $___db->prepare($sql_nav);
	$connect_db->execute(array($_nav));
	$_count = $connect_db->rowCount(); 
	$nav_all =$connect_db->fetch(); 
        
    $_formuaire_nav ='<div class=" shadow bg-transparent p-3 mb-3 rounded" > 
	<div class="row  justify-content-md-center"> 
	<div class="col-sm-8 ml-0 mr-0  mb-3">
	<div class="card bg-transparen p-3">
    <div class=" shadow-sm bg-light p-3 mb-3  rounded text text-justifed text-light" >
    <img src="img_vetech/vetechdesign.png" class="rounded float-left" alt="vetechdesign Vision evolutive des technologie et design">
    </div>
    <form id="form_nav">
	<div class=" shadow-sm bg-secondary p-3 mb-3  rounded text  text-light" ><h4 class=" text text-center">Bienvenue sur notre nouvelle interface.</h4>
    <p class="text-break">Pour poursuivre, merci de remplir les champs ci-dessous, ainsi vous ne ratterez plus diffrentes offres  </p></div>
    <div class="shadow-sm p-2 rounded">
	<div class="input-group mb-3">
	<div class="input-group-prepend">
	<span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-user fa-1x"></i> </span>
	</div>
	<input type="text" class="form-control" placeholder="Nom et Prenom(s)" name="nom_nav" value="" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> 
	</div>
	<div class="input-group mb-3">
	<div class="input-group-prepend">
	<span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-at"></i></span>
	</div>
	<input type="text" class="form-control" name="email_nav" value="" placeholder="Adresse E-mail" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
	</div>
   
	<input type="hidden" class="form-control" placeholder="" name="encodenav" value="'.$_nav_url.'" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    <input type="hidden" class="form-control" placeholder="" name="token" value="'.$_token.'" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    <input type="hidden" class="form-control" placeholder="" name="controle" value="register" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    <input type="hidden" class="form-control" placeholder="" name="save_choix_session_formation" value="save_choix_session_formation" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    <button class="btn btn-success btn btn-block form-control mb-3 btn-register-nav" url_register=" " type="button">Poursuivre sur le site </button>
	</div>
    </form>
	 <div class="alert-nav"></div>  </div> </div> </div><div >
    <div class="row bg-dark text text-light rounded shadow-sm ">
      <div class="col ">
        <p>Nous utilisons des cookies pour vous garantir la meilleure expérience sur notre site. En poursuivant votre navigation sur notre site, vous acceptez l’utilisation de cookies, comme décrit dans notre<a href="https://app.vetechdesign.net/?url=cgu&f_for=Y2d1">Cookie Policy</a>.</p>      
      </div>
    
    </div>      
  </div>';   
        
        if($_count<=0):
    $d_nav =  array("count"=>$_count,"formulaire"=>$_formuaire_nav,"active"=>0);
    
	return json_encode($d_nav); 
        elseif($_count>0): 
          $d_nav =  array("count"=>$_count,"nav"=>$nav_all['name_nav'],"active"=>$nav_all['actice_nav']);
        return json_encode($d_nav); 
        else: 
         $d_nav =  array("count"=>'404',"nav"=>'erro',"active"=>'null');
        return json_encode($d_nav); 
        endif; 
	}
	
	public function controle_nav($__db,$__db_af,$__nav, $__nav__url, $token){

        if(isset($__nav)){
		$c_nav= $this->select_nav($__db,$__db_af,$__nav, $__nav__url,$token);
        return($c_nav); 
      	}else{
        $c_nav= json_encode(array("count"=>"0","nav"=>null)); 
        return $c_nav ; 
        }
       
		}
	public function controle_confirme($__db,$__db_af,$explode){
       
        if(isset($explode)){
		$c_rusltat= $this->inser_nav($__db,$__db_af,$explode);
         return($c_rusltat); 
      	}else{
        $c_nav= json_encode(array("count"=>"0","nav"=>null)); 
              return $c_nav ; 
        }
       
		}
			
	
	
}




?>
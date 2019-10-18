<?php 


require_once('../function/form_all_connect.php');



class f_af extends form_all_connect{

		public $f_affiche = '<div class=" shadow-sm bg-light text text-center p-3 mb-3  rounded"> 
		<div class=" shadow-sm bg-secondary text text-light  p-3 mb-3  rounded"><h3>Client ou Dessinateur ??? </h3></div>

		<a href="?url=client" class="btn btn-info shadow-sm p-5 mb-3" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fas fa-user fa-4x"></i><p> <h3>CLIENT</h3> </p></a>



		<a href="?url=dessinateur" class="btn btn-dark shadow-sm pt-5 pb-5 pl-1 pr-1 mb-3" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fas fa-users fa-4x"></i><p> <h3>DESSINATEUR</h3> </p></a>

		</div>';

	
		
	public function page($_db,$array_db,$ffor_url,$__session_formation,$token){
	
			return  $this->f_affiche ; 

}
	public function page_contenu_client(){
		

	}
	
	
}






?>
<?php 


require_once('../function/form_all_connect.php');



class f_af extends form_all_connect{
	 
	public $f_img = '<div class=" shadow-sm bg-light  p-3 mb-3 rounded"> <img src="imgformation/vetechdesign.png" class="img-fluid img-thumbnail" alt="Responsive image"> </div>
	<div class=" shadow-sm bg-dark p-3 mb-3 rounded"> <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="..." class="rounded mr-2" alt="...">
    <strong class="mr-auto">Bootstrap</strong>
    <small class="text-muted">11 mins ago</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
    Hello, world! This is a toast message.
  </div>
</div> </div>'; 
	
	
	
	public $f_affiche = '<div class=" shadow-sm bg-dark   p-3 mb-3  rounded"> 

	<button type="button" class="btn btn-info shadow p-3 mb-3"  data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fas fa-folder-open fa-5x"></i></button>
	<button type="button" class="btn btn-light shadow p-3 mb-3"  data-toggle="tooltip" data-placement="top" title="Tooltip on top" ><i class="fas fa-building fa-5x"></i></button>
	<button type="button" class="btn btn-dark shadow p-3 mb-3"  data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fas fa-id-badge fa-5x"></i></button>
	</div>';

	
		
	public function page($_db,$array_db,$ffor_url,$__session_formation,$token){
		$page_suite =''; 
	   if(empty($_SESSION['INFO_CONNECTER'])): 
		 $page_suite .= $this->form_insc_des($token); 
         endif; 	
		 $page_suite .= $this->f_img.$this->f_affiche ;
		return $page_suite; 
}
	
	
	
}






?>
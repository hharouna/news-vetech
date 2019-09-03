<?php 


require_once('../function/form_all_connect.php');



class f_af extends form_all_connect{
	 
	public $f_img = '<div class=" shadow bg-light  p-3 mb-3 rounded"> <img src="imgformation/vetechdesign.png" class="img-fluid img-thumbnail" alt="Responsive image"> </div>'; 

	public $f_affiche = '<div class=" shadow bg-dark   p-3 mb-3  rounded"> 

<button type="button" class="btn btn-info shadow p-3 mb-3"  data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fas fa-folder-open fa-5x"></i></button>
<button type="button" class="btn btn-light shadow p-3 mb-3"  data-toggle="tooltip" data-placement="top" title="Tooltip on top" ><i class="fas fa-building fa-5x"></i></button>
<button type="button" class="btn btn-dark shadow p-3 mb-3"  data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fas fa-id-badge fa-5x"></i></button>
</div>';
	
	public $f_image = '<div class=" shadow p-3 mb-3 bg-light rounded">
	<div class="row">
	<div class="col-4 ">
	<div id="list-example" class="list-group">
  <a class="list-group-item list-group-item-action" href="#list-item-1">Item 1</a>
  <a class="list-group-item list-group-item-action" href="#list-item-2">Item 2</a>
  <a class="list-group-item list-group-item-action" href="#list-item-3">Item 3</a>
  <a class="list-group-item list-group-item-action" href="#list-item-4">Item 4</a>
</div></div>
<div class="col-8 overflow-auto bg-light" style="max-width: 800px; max-height: 400px;">
<div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
  <h4 id="list-item-1">Item 1</h4>
  <p>Quis magna Lorem anim amet ipsum do mollit sit cillum voluptate ex nulla tempor. Laborum consequat non elit enim exercitation cillum aliqua consequat id aliqua. Esse ex consectetur mollit voluptate est in duis laboris ad sit ipsum anim Lorem. Incididunt veniam velit elit elit veniam Lorem aliqua quis ullamco deserunt sit enim elit aliqua esse irure. Laborum nisi sit est tempor laborum mollit labore officia laborum excepteur commodo non commodo dolor excepteur commodo. Ipsum fugiat ex est consectetur ipsum commodo tempor sunt in proident.</p>
  <h4 id="list-item-2">Item 1</h4>
  <p>Quis magna Lorem anim amet ipsum do mollit sit cillum voluptate ex nulla tempor. Laborum consequat non elit enim exercitation cillum aliqua consequat id aliqua. Esse ex consectetur mollit voluptate est in duis laboris ad sit ipsum anim Lorem. Incididunt veniam velit elit elit veniam Lorem aliqua quis ullamco deserunt sit enim elit aliqua esse irure. Laborum nisi sit est tempor laborum mollit labore officia laborum excepteur commodo non commodo dolor excepteur commodo. Ipsum fugiat ex est consectetur ipsum commodo tempor sunt in proident.</p>
  <h4 id="list-item-3">Item 1</h4>
  <p>Quis magna Lorem anim amet ipsum do mollit sit cillum voluptate ex nulla tempor. Laborum consequat non elit enim exercitation cillum aliqua consequat id aliqua. Esse ex consectetur mollit voluptate est in duis laboris ad sit ipsum anim Lorem. Incididunt veniam velit elit elit veniam Lorem aliqua quis ullamco deserunt sit enim elit aliqua esse irure. Laborum nisi sit est tempor laborum mollit labore officia laborum excepteur commodo non commodo dolor excepteur commodo. Ipsum fugiat ex est consectetur ipsum commodo tempor sunt in proident.</p>
  <h4 id="list-item-4">Item 1</h4>
  <p>Quis magna Lorem anim amet ipsum do mollit sit cillum voluptate ex nulla tempor. Laborum consequat non elit enim exercitation cillum aliqua consequat id aliqua. Esse ex consectetur mollit voluptate est in duis laboris ad sit ipsum anim Lorem. Incididunt veniam velit elit elit veniam Lorem aliqua quis ullamco deserunt sit enim elit aliqua esse irure. Laborum nisi sit est tempor laborum mollit labore officia laborum excepteur commodo non commodo dolor excepteur commodo. Ipsum fugiat ex est consectetur ipsum commodo tempor sunt in proident.</p>
</div></div>
	
	</div></div>';
		
	public function page($_db,$array_db,$ffor_url,$__session_formation,$token){
		//$__db,$_array_db,$f_for_url,$___session_formation,$_token
		if(isset($ffor_url)):
		$__explode = explode("-",$ffor_url);
		else: 
		$__explode =null ; 
		endif; 
		$page_suite =''; 
	if(empty($_SESSION['INFO_CONNECTER'])): 
			return  $this->form_demande_devis($_db,$array_db,$__explode,$token);
		else: 
		 	return  $this->form_demande_connect($_db,$array_db,$__explode,$token,$_SESSION['INFO_CONNECTER']);
       endif; 
		 $page_suite .= $this->f_img.$this->f_image.$this->f_affiche ;
		return $page_suite;
}
	
	
}






?>
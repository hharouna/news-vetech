<?php

class contenu_page{
	
	public function contenu($page_url){
		
		if(isset($page_url)){
			include_once($page_url.".php");
		}
	
		}
	};



?>
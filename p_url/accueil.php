<?php

class f_af{
	
	public function autre_lien()
{
    
    $autre_liens = "
    <center>

    
    	<div class='ro vetech_cont_qsn'>

	    	<div class=' vetech_cont_qsn_n '> 
			    <a  type='button' class='btn btn-default btn-block btn-dark  m-1 vetech_qsn' href='#'>
				    <div class='shadow-sm  rounded p-2'> 
				    	<i class='fas fa-handshake fa-2x '></i> <span class='align-middle'> <strong><h4>Qui sommes nous</h4></strong></span>
				    </div>
			    </a>
			</div>


			<div class='col-md- vetech_cont_qsn_n1'> 
				<a  type='button' class='btn btn-default btn-secondary btn-block m-1 p-2 vetech_qsn' href='#'>
				    <div class='shadow-sm  rounded p-2'> 
				    	<i class='fas fa-handshake fa-2x '></i> <span class='align-middle'> <strong><h4>Nos promotions</h4></strong></span>
				    </div>
			    </a> 
			</div>


			<div class='col-md- vetech_cont_qsn_n2 col-sm- col-xs-  col-'>
				<a  type='button' class='btn btn-default btn-dark btn-block m-1 p-2 vetech_qsn' href='#'>
					<div class='shadow-sm  rounded p-2 '> 
						<i class='fas fa-handshake fa-2x '></i> <span class='align-middle'> <strong><h4>Dévenir agent externes </h4></strong></span>
					</div>
				</a>

			</div>

			<div class='col-md- vetech_cont_qsn_n3 col-sm- col-xs-  col-'> 
				<a  type='button' class='btn btn-default btn-secondary btn-block  m-1 vetech_qsn' href='#'>
				    <div class='shadow-sm  rounded p-2'> 
				    	<i class='fas fa-handshake fa-2x '></i> <span class='align-middle'> <strong><h4>Nos partenaires</h4></strong></span>
				    </div>
			    </a>
			</div>
   
    	</div>
    ";
    
    
    return($autre_liens); 

    
    
    
    }
	public function slider(){
		$_slider ='<div class="shadow p-2  mb-3 rounded " >
        <div id="carouselExampleInterval" class="carousel slide shadow-sm rounded " style="max-height: 280px; width:auto; " data-ride="carousel">
		<div class="carousel-inner rounded">
		<div class="carousel-item active" data-interval="1000">
		<img src="img_vetech/img_slider/struture-vetech.jpg" style="max-height: 280px; width:1040px; "class="d-block" alt="..." >
		</div>
		<div class="carousel-item" data-interval="1000">
		<img src="img_vetech/img_slider/architecte-interieur.jpg" style="max-height: 280px; width:1040px; "  class="d-block" alt="...">
		</div>
		<div class="carousel-item">
		<img src="img_vetech/img_slider/partenaire.png" style="max-height: 280px;  width:1040px; " class="d-block " alt="...">
		</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
		</a>
		</div> <hr> '.$this->autre_lien().'</div>'; 
		return $_slider;
	}
	
	
	
	public function page(){
		return $this->slider(); 

		
	}
}




?>
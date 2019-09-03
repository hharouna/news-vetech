<?php 

class mail_vetech extends url{
public function cssmail($contenumail,$pmail,$pform,$psujet,$ptitle,$piedpage, $pdonnearray, $commentmail){
	
	/*
	$contenumail: contenu html tu mail
	$pmail: du desintaire 
	$pform: le mail qui envois
	$psujet: le sujet du mail 
	$title: title du documents
	$piedpage: contenu pied de page
	
	*/
	
	           $versionphp = phpversion();// version de php5.6 7.1
			
			
				$cssmail = $pmail;
				$frommail =  'VETECH&DESIGN<'.$pform.'>'; 
				$sujetmail = $psujet; 
				$message = "<html>	<head><title>".$ptitle."</title></head>";
				$message.= 	'<body style="background: #CCC;">';   
				$message.= 	'<div style="width:750px; height:auto;  margin-left:auto; margin-right:auto;"> ';   
				$message.= 	'<div style="width:750px; height:auto;  margin-left:auto; margin-right:auto;"> '; 
				$message.= '<div class="entete" style="width:750px; height:80; margin-left:auto; margin-right:auto; 
									border-bottom:#00F thin solid; margin-bottom: 10px;  background:#FFF;
									-webkit-box-shadow: 0px 0px 3px 3px rgba(10,15,107,1);
									-moz-box-shadow: 0px 0px 3px 3px rgba(10,15,107,1); box-shadow: 0px 0px 3px 3px rgba(10,15,107,1);  "> 
									<div style="width:750px; height:80;"> <a href="https://vetechdesign.net" target="_blank"><div class="logo-vetech" style="width: 269px; height: 75px; s ; cursor:pointer; "> <img src="https://formation.vetechdesign.net/imgformation/vetechdesign.png" width="269" height="75" />
									</div></div></a></div>';
				$message.= '<!-- debu contenu  -->
<div class="contenupage" style="width:auto; min-width:400px; height:auto; min-height:400px; margin-left:auto; margin-right:auto; border-bottom:#00F thin solid; background:#FFF; -webkit-box-shadow: 0px 0px 3px 3px rgba(10,15,107,1);
-moz-box-shadow: 0px 0px 3px 3px rgba(10,15,107,1);
box-shadow: 0px 0px 3px 3px rgba(10,15,107,1);  ">'		;
                 $message.=$commentmail; 
                $message.=$contenumail; 
				
				$message.=' </div><!-- fin contenu -->
<div  class="piedpage" style="width:750px; height:auto; margin-left:auto; margin-right:auto; margin-top:10px; border-bottom:#00F thin solid;   background: #5F5F5F;  -webkit-box-shadow: 0px 0px 3px 3px rgba(10,15,107,1);
-moz-box-shadow: 0px 0px 3px 3px rgba(10,15,107,1);
box-shadow: 0px 0px 3px 3px rgba(10,15,107,1); "> ';


            $message.='<p><strong>MENTIONS LEGALES: </strong>La soci&eacute;t&eacute; <span style="color:#3498db">VETECH&amp;DESIGN</span> en abr&eacute;g&eacute; <span style="color:#3498db">Vision Evolutive des TECHnologies et DESIGN </span>est situ&eacute;e en <strong>C&ocirc;te d&rsquo;Ivoire</strong> dans la capitale d&rsquo;Abidjan,quartier Marcory derri&egrave;re <strong>ORCA DECO</strong> cit&eacute; Hibiscus; sous le<strong> N&deg;RCCM :</strong><span style="color:#3498db"><strong> </strong>CI-ABJ-2018-B-31815</span>; sous le<strong> N&deg;CC : </strong><span style="color:#3498db">1864676 A;</span> sous le<strong> N&deg;CNPS :</strong><span style="color:#3498db"> 335634; BP 16 Abidjan 12; Fixe : 21 000 312. </span></p>';
					
			$message.="</div><!--fin pied de page -->	</div></div>	</body></html>";

			 $headers  = 'From: VETECH&DESIGN <'.$pform.'>'."\r\n";
			 $headers .= 'MIME-Version: 1.0'."\r\n";
			 $headers .= 'X-Mailer: PHP/'.$versionphp."\r\n";
			 $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
			 $headers .= 'X-Confirm-Reading-To: VETECH&DESIGN <'.$pform.'>'."\r\n";
			 $headers .= 'X-Priority: 3'."\r\n";
			 $headers .= 'Priority: urgent'."\r\n";
			 $arraymail = array($cssmail,$frommail,$message,$headers);
			 //$arraymail = array($mail,$frommail,$message,$headers); 
	         
	         if(mail($cssmail,$sujetmail ,$message,$headers)){
				
				   return $pdonnearray; 
				}
	}


}





?>
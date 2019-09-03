// JavaScript Document

$(document).ready(function(e) {
    
	var image = ['','imgformation/ActuAutoDesk.jpg', 'imgformation/ARCHICAD.jpg','imgformation/ARCHEOSSATURE.jpg', 'imgformation/Revitlogo.jpg', 'imgformation/ROBOTSTRUTURE.jpg','imgformation/RRFEM5.jpg', 'imgformation/LUMIONP.jpg'] 
	var img ='<div ><img src="imgformation/Double.gif" width="50" height="50"> </div>'

function confrimiscn(hideshow){
	
				if(hideshow==1){
				$('.hideshowliste')
				.attr('h',"2")
				.removeClass(" btn-success")
				.addClass(" btn-default")
				$('.showhidec')	
				.removeClass("  glyphicon-resize-small")
				.addClass(" glyphicon-resize-full ")
				}
				else if(hideshow==2){
				$('.hideshowliste').attr("h","1")
				.removeClass(" btn-default ")
				.addClass("  btn-success")
				$('.showhidec').removeClass(" glyphicon-resize-full")
				.addClass(" glyphicon-resize-small ")
					}
					
}

$(document).on("change","select#listeformation ", function(){
			
			var valc = ""; 
			var str = "";
			var idselect = "";
    $( "select option:selected" ).each(function() {
      valc += $(this).attr("at")+ " ";
	   idselect += $(this).attr("value");
	   $('.choixform').attr('value',idselect)
    });
 
			
			
			 
			//var idselect = $(this).attr("value"); 
			var $confirms = $('.btn-confrim-add')
			var inputchoixvel = '<input type="hidden" class="form-control choixform " value="'+idselect+'" placeholder="choixformat" />';
			if(idselect !=''){
			$confirms.removeClass('btn-default disabled btn-confrim-add').addClass('btn-success btn-confirm')
			$(".choix-format" ).html(valc + inputchoixvel);
			$(".btn-selection-text" ).html('<button class="btn btn-primary btn-sm moduleformation" type="button" data-toggle="modal" '+
			'data-target=".bs-example-modal-lg" idforma="'+idselect+'"> <span class="glyphicon glyphicon-eye-open"></span> MODULE </button>');
			
			$.ajax({
			beforeSend: function() {
			$('.listeformation').html(img)
			$('.liste-input').fadeTo(500,0.5);
			},
			url:"contenuform/listeformation.php",
			method:"POST",
			Type:"POST", 
			data: {controle:"listeformation", idselect : idselect },
			success: function(data)
			{ 
			$('.listeformation').html(data)
			$('.liste-input').fadeTo(500,1);
			$(".choix-format" ).html('');
			}
			})		
			
			}else{
			$confirms.removeClass('btn-success btn-confirm').addClass('disabled btn-default btn-confrim-add')
			$(".btn-selection-text" ).html("");
			$(".choix-format" ).html('');
			$('.listeformation').html('')
			$('.liste-input').fadeTo(500,1);
			}

})
		$(document).on("keyup","input", function()
			{
			
          $('.erreur-input').html("")
		})
		
	
$(document).on("click",".checkformsession", function(){
        
		var $this = $(this).attr('idsession')
		var value= $(this).attr('value')
		var idforma= $(this).attr('idforma'); 
		var idmodule= $(this).attr('idmodule'); 
		var $n = $(this).change()
		var nf = $n.prop("checked")
		var btnthis = $(this)
			
		$.ajax({
		beforeSend: function() {
		
	   btnthis.fadeTo(500,0.5);
		},
		url:"controle/controle.php",
		method:"POST",
		Type:"POST", 
		dataType: "json", 
		data: {controle:'check', idsession: value, nf:nf, idforma: idforma, idmodule: idmodule }, 
		success: function(data)
		{ 
		btnthis.fadeTo(500,1);
		}
		})
		   
		})
		
$(document).on("click",".btn-nouveau-inscrit", function(){
	
	location.reload(); 
	
	})
		
$(document).on("click",".btn-confirm", function(){
	
			var valc = $(this).attr("at"); 
			var idselect = $(this).attr("value"); 
			var $confirms = $(this)
			
			var nomform = $(".nomform").val();
			var prenomform = $(" .prenomform").val();
			var str = $( "form" ).serialize();
			var adressemailform = $(".adressemailform").val();
			var contact = $(".contact").val();
			var fonctionform  = $(".fonctionform ").val();
			var activeform = $(".activeform").val();
			var choixform = $(".choixform").val();
			var sessionform = $(" .sessionform").val();
			var img = '<div ><img src="imgformation/Double.gif" width="50" height="50"> </div>'
			var spnner =' <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>  Chargement...'
/*idformation 	nomform 	prenomform 	adressemailform 	contact 	fonctionform 	activeform 	choixform 	sessionform 	dateform 	ipform 	usernavform
				  "</div><div class='alert alert-warning'>- Pour Recevoir par mail  le module de formation cliquez ici <hr> <button class='module btn btn-primary btn-sm' type='button' at='"+data['choixform']+"'> <span class='glyphicon glyphicon-send'> </span>  Module</button></div>" */
	  
	  if ( nomform=="" || prenomform=="" || adressemailform=="" || contact=="" || fonctionform=="" || activeform=="" || choixform=="" || idselect==""  )
	  {
		$(".erreur-input").html('<span class="alert alert-danger form-controle" role="alert">	Merci de remplir tous les champs.</div>')
		} else if (str == ""){
			$(".erreur-input").html('<span class="alert alert-danger form-controle" role="alert">	Merci de selectionner un session de formation.</div>')
			}else{
	 
			 $.ajax({
			beforeSend: function() {
				
				
				$confirms.addClass('disabled btn-confrim-add')
				.removeClass("btn-confrim")
				.html(spnner)
				
				 $('.liste-input').fadeTo(500,0.5);
			},
			url:"controle/controle.php",
			method:"POST",
			Type:"POST", 
			dataType: "json", 
			data: {formation:"formation",
						nomform : nomform, 
						prenomform : prenomform,
						adressemailform : adressemailform,
						contact : contact,
						fonctionform : fonctionform,
						activeform : activeform,
						choixform : choixform, 
							      },
			success: function(data)
			{ 

			if(data[0]==1){
			$(".erreur-input").html('<span class="alert alert-danger">'+data["contenu"]+'</div>')
			$('.liste-input').fadeTo(500,1);
			$('.btn-confrim-add').html('Confirmation').addClass('btn-confrim').removeClass('disabled btn-confrim-add')
			
				}else{
			$('.formulaire-contenu').fadeTo(500,1);
			$('.formulaire-contenu').css({	"width": 650 })
		    $('.img').html('')
			$('.formulaire-contenu').html(data['reponse']+'</br>'+data['contenu']+'</br>'+data['reload']);
			}
			
			
			
			}
	})
	
					}


			
	});
	

			
	$(document).on("keyup","input.formation", function(){
		$('.resultatform').remove()
		})
		
		
		$(document).on("click","button.supp", function(){
			
			var suppid = $(this).attr('id')
			var mdp = prompt("Mot de passe", "");
			
		
		if(mdp != null){
			
	   
 $.ajax({
			beforeSend: function() {
		
			$('.'+suppid).fadeTo(500,0.5);
		
			},
			url:"contenuform/liste.php",
			method:"POST",
			Type:"POST",
			dataType:"json",
			data: {controle:"deleteform", mdp: mdp , id : suppid },
			success: function(data)
			{
				if(data["code"]==false){
					$('.'+suppid).fadeTo(500,1);
				alert("Impossible de supprimer !!!")
					}else{
						
					$('.'+suppid).hide(500);
					$('.'+suppid).remove(); 
					
					} 
				}
		
			})
		
			}
		})
		
		$(document).on("click","button.actmodule", function(){
			
			var id = $(this).attr('idact')
			var mdp = prompt("Mot de passe", "");
            var $this = $(this)
			var actmod = $(this).attr('actmod')
			
		 $.ajax({
			beforeSend: function() {
		$('#heading'+id).fadeTo(500,0.5);
				},
			url:"contenuform/ddliste.php",
			method:"POST",
			Type:"POST",
			dataType:"json",
			data: {controle:"act",   mdp: mdp , idmodule: id , actmod: actmod},
			success: function(data)
			{
		 
			              if(data[2]==1){
							$('#heading'+id).fadeTo(500,1);
						    
						    
							var arraydata =['btn-success','btn-warning']
							
							$this.attr('actmod',data[0])
							
							if(data[0]==0){
								alert("impossible d'activer: mot de passe incorrect !!!")
							$this.html(data[1]);
							$this.addClass(arraydata[0]).removeClass(arraydata[1])
							}else{
								alert("impossible de deactiver : mot de passe incorrect !!!")
							$this.html(data[1]);
							$this.addClass(arraydata[1]).removeClass(arraydata[0])
							}
							
							}else{
							$('#heading'+id).fadeTo(500,1);
							$this.html(data["actmodule"]);
							$this.attr('actmod',data['code'])
							var arraydata =['btn-success','btn-warning']
							if(data['code']==0){
							$this.addClass(arraydata[0]).removeClass(arraydata[1])}
							else{
							$this.addClass(arraydata[1]).removeClass(arraydata[0])}
							} 
			 
			}
		
			})	
	
			
		})
		
//
		$(document).on("click","button.suppmodule", function(){
			
			var idmodule = $(this).attr('idmod')
			var mdp = prompt("Mot de passe", "");
			
				if(mdp != null){	
				
				$.ajax({
				beforeSend: function() {
				$('#heading'+idmodule).fadeTo(500,0.5);
				},
				url:"contenuform/ddliste.php",
				method:"POST",
				Type:"POST",
				dataType:"json",
				data: {controle:"deleteform", mdp:mdp , idmodule:idmodule},
				success: function(data)
				{
				
				if(data["code"]==0){
				$('#heading'+idmodule).fadeTo(500,1);
				alert("Impossible de supprimer !!!")
				}else{
				$('#heading'+idmodule).remove();
				} 
				
				}
				
				})	
				}
			
		})
		
//		
		
		
	$(document).on("click","button.addvalide", function(){	
	
	var formation = $('.formation').val(); 
	var img = '<div ><img src="imgformation/Double.gif" width="50" height="50"> </div>'
	if(formation ==""){
		
		$('.addform').append('<div class="alert alert-warning resultatform">le champ est vide!!!</div>')
		
		}else{
	 $.ajax({
			beforeSend: function() {
				// $('.panel-principal').html(img)
				 $('.addform').append('<div class="alert alert-default resultatform">'+img+'</div>')
				 //$('.btn-confrim-add').html('Traitement ...')
				$('.addform').fadeTo(500,0.5);
				$('.contenuformation').fadeTo(500,0.5);
			},
			url:"contenuform/liste.php",
			method:"POST",
			Type:"POST",
			dataType:"json",
			data: {controle:"insertformation", formation: formation },
			success: function(data)
			{ 
			
			$('.contenuformation').fadeTo(500,1)
			$('.contenuformation').html(data['table'])
			$('.addform').fadeTo(500,1);
			$('.resultatform').addClass('alert-success').removeClass('alert-default')
			$('.resultatform').html('<h4> Nouvelle formation : '+data["formation"]+'</h4>')
			
			}
		
			})
			}
			})
			
			
$(document).on("click","button.addplus", function(){	
         
			var idform = $(this).attr('id')
			var hideshowlistes = $('button.hideshowliste').attr('h')
 $.ajax({
			beforeSend: function() {
		$(".retout").html(img)
		 $('.retout').fadeTo(500,0.5);
				},
			url:"contenuform/ddliste.php",
			method:"POST",
			Type:"POST",
			data: {controle:"module", idform: idform},
			success: function(data)
			{
			$('.retour').html(data)
			$('.contenuformation').hide("fast")
						
				confrimiscn(hideshowlistes)

			}
		
			})

	})			
	
	/*ajoute nouveau chapitre*/
$(document).on("click","button.addchapitre", function(){	
         
			var idform = $(this).attr('idform')
			var hideshowlistes = $('button.hideshowliste').attr('h')
			var $retour = $(".retour"); 
			//var mdp = prompt("Mot de passe", "");
			var img = '<div ><img src="imgformation/Double.gif" width="50" height="50"> </div>'
	
 $.ajax({
					beforeSend: function() {
					$retour.html(img);
					$retour.fadeTo(500,0.5);
					},
					url:"contenuform/ddliste.php",
					method:"POST",
					Type:"POST",
					data: {controle:"moduleplus", idform: idform},
					success: function(data)
					{
					$retour.html(data)
					$retour.fadeTo(500,1);
					$('.contenuformation').hide("slow");
					
					confrimiscn(hideshowlistes)
					}
					
			})
	
	
	})	

$(document).on("click","button.modchapitre", function(){	
         
			var idform = $(this).attr('idform')
			var idmodule = $(this).attr('idmodule')
			var hideshowlistes = $('button.hideshowliste').attr('h')
			var $retour = $(".retour"); 
			//var mdp = prompt("Mot de passe", "");
			var img = '<div ><img src="imgformation/Double.gif" width="50" height="50"> </div>'
	
 $.ajax({
			beforeSend: function() {
		$retour.html(img);
		$retour.fadeTo(500,0.5);
				},
			url:"contenuform/ddliste.php",
			method:"POST",
			Type:"POST",
			data: {controle:"modification", idform: idform, idmodule: idmodule},		
			success: function(data)
			{
		     $retour.html(data)
			$retour.fadeTo(500,1);
			$('.contenuformation').hide("slow");
			
			 //confrimiscn(hideshowlistes)
			}
		
			})
	
	
	})	





	
$(document).on("click","button.hideshowliste", function(){	
	var $contenuformation = $('.contenuformation')
	var divshow = $(this).attr("h")
	
	
		
	//$contenuformation.toggle('slow',function(divshow) {  }); 
	$contenuformation.toggle(divshow)
		//alert(divshow)
    if(divshow==1){
		$(this).attr('h',"2").removeClass(" btn-success")
		.addClass(" btn-default")
		$('.showhidec')
		.removeClass("  glyphicon-resize-small")
		.addClass(" glyphicon-resize-full")
		}
	else if(divshow==2){
		$(this).attr("h","1").removeClass(" btn-default ").addClass("  btn-success")
		$('.showhidec').removeClass("  glyphicon-resize-full").addClass(" glyphicon-resize-small ")
		}

	});
	
	$(document).on("click","button.modvalier", function(){	
	
		
	var idform = $(this).attr('idform')
	var cmodule = CKEDITOR.instances.editor1.getData();	
	var titrechapitre = $('.titrechapitre').val()	 
  //var mdp = prompt("Mot de passe", "");
    var img = '<div ><img src="imgformation/Double.gif" width="50" height="50"> </div>'
	if(cmodule ==""){
		
		$('.retour').append('<div class="alert alert-warning">Les champs est vide</div>')
		
		}else{
 $.ajax({
			beforeSend: function() {
		$(".retout").html(img)
		 $('.retout').fadeTo(500,0.5);
				},
			url:"contenuform/ddliste.php",
			method:"POST",
			Type:"POST",
			data: {controle:"enregistremodule", idform: idform, cmodule: cmodule, titrechapitre : titrechapitre},
			success: function(data)
			{
				$('.retour').html(data)
				 $('.retout').fadeTo(500,1);
				}

				})
	
	}
	
	
	
	});
	
$(document).on("click","button.validermodification", function(){	
	
	
	var idform = $(this).attr('idform')
	var idmodule = $(this).attr('idmodule')
	var cmodule = CKEDITOR.instances.editor1.getData();	
	var titrechapitre = $('.titrechapitre').val()	 
  //var mdp = prompt("Mot de passe", "");
    var img = '<div ><img src="imgformation/Double.gif" width="50" height="50"> </div>'
	if(cmodule ==""){
		
		$('.retour').append('<div class="alert alert-warning">Les champs est vide</div>')
		
		}else{
			
 $.ajax({
			beforeSend: function() {
			$(".retout").html(img)
			$('.retout').fadeTo(500,0.5);
			},
			url:"contenuform/ddliste.php",
			method:"POST",
			Type:"POST",
			data: {controle:"validermodification", idform: idform, cmodule: cmodule, 
			   titrechapitre : titrechapitre, idmodule : idmodule},
			success: function(data)
			{
			$('.retour').html(data)
			$('.retout').fadeTo(500,1);
			}
			
			})
	
	}
	
	});

$(document).on("click","button.enregmodule", function(){	
	
	
	var idform = $(this).attr('idform')
	var cmodule = CKEDITOR.instances.editor1.getData();	
	var titrechapitre = $('.titrechapitre').val()	 
  //var mdp = prompt("Mot de passe", "");
    var img ='<div ><img src="imgformation/Double.gif" width="50" height="50"> </div>'
	if(cmodule ==""){
		
		$('.retour').append('<div class="alert alert-warning">Les champs sont vide</div>')
		
		}else{
 $.ajax({
			beforeSend: function() {
		$(".retout").html(img)
		 $('.retout').fadeTo(500,0.5);
				},
			url:"contenuform/ddliste.php",
			method:"POST",
			Type:"POST",
			data: {controle:"enregistremodule", idform: idform, cmodule: cmodule, titrechapitre : titrechapitre},
			success: function(data)
			{
				$('.retour').html(data)
				}

				})
	
	}
	
	});
$(document).on("click",".sessionformation", function(){	
	
	
	
	
	
	
	});
	
$(document).on("click",".listeinscription", function(){	
	
	
	
	
	
	
	});
		
	
	/* fin read document*/
});
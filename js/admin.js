// JavaScript Document

$(document).ready(function(e) {
    
	  $('.panel-principal').load("contenuform/listecalender.php") 
	$(document).on('click',".btn-connect",function(){
		
		
		
			
			var email = $(".email").val();
			var mdp   = $(".mdp").val();
			
			
			var img = '<div ><img src="imgformation/Double.gif" width="50" height="50"> </div>'
	 
	  if ( email =="" || mdp ==""  )
	  {
		$(".btn-spinner").html('<span class="alert alert-danger form-controle">	Merci de remplir tous les champs.</div>')
		} else{
	 
			 $.ajax({
			beforeSend: function() {
				 $('.btn-spinner').html(img)
				 $(this).html('Traitement ...')
				 $(this).addClass('disabled btn-confrim-add').removeClass("btn-confrim")
				 //$('.btn-confrim-add').html('Traitement ...')
				 $('.liste-input').fadeTo(500,0.5);
			},
			url:"controle/controleacces.php",
			method:"POST",
			Type:"POST", 
			dataType: "json", 
			data: {connect:"connect",
						email : email, 
						mdp : mdp
						
			      },
			success: function(data)
			{ 
			 
			 if(data[0]==2){
				 
				 alert("Verifier vos ID")
				 
				 }	else if (data[0]==3){ 
				 
				 alert("Merci de remplir tous les champs")
				 
				 }else{
					 
				location.reload()
					 
					 
					 }
			
			} 
			
			
			
			} ) 
			} 
			
			} ) 
			
			
	
	$(document).on('click',"li.btn-deconnect",function(){
		
      var img = '<div ><img src="imgformation/Double.gif" width="50" height="50"> </div>'
	 
	
			 $.ajax({
			beforeSend: function() {
				 $('.panel-body').html(img)
				
				 //$('.btn-confrim-add').html('Traitement ...')
				// $('.liste-input').fadeTo(500,0.5);
			},
			url:"controle/controleacces.php",
			method:"POST",
			Type:"POST", 
			dataType: "json", 
			data: {deconnect:"deconnect"},
			success: function(data)
			{ 
			  if(data[0]=="deconnect"){
				 
				 location.reload()
				 
				 }	 }
			
			
			} ) 	} ) 
			
			
			
			$(document).on('click',"button.calender",function(){
			
			var img = '<div ><img src="imgformation/Double.gif" width="50" height="50"> </div>'
			var idmodule = $(this).attr('idmod')
			var idform = $(this).attr('idform')
			$.ajax({
			beforeSend: function() {
			$('.modal-content').html(img)
			
			//$('.btn-confrim-add').html('Traitement ...')
			// $('.liste-input').fadeTo(500,0.5);
			},
			url:"contenuform/calender.php",
			method:"POST",
			Type:"POST", 
			data: {controle:"calend", idform: idform, idmodule : idmodule},
			success: function(data)
			{  $('.modal-content').html(data) }
			
			
			
			} ) 	} ) 
			
			$(document).on('click',"li.Nsession",function(){
			
			var img = '<div ><img src="imgformation/Double.gif" width="50" height="50"> </div>'
			var idmodule = $(this).attr('chapitre')
			var idform = $(this).attr('idform')
			var bodycontenu = $(".body-contenu")
			$.ajax({
			beforeSend: function() {
			bodycontenu.html(img)
			},
			url:"contenuform/calender.php",
			method:"POST",
			Type:"POST", 
			data: {controle:"Nsession", idform: idform, idmodule : idmodule},
			success: function(data)
			{
			  bodycontenu.html(data) }
			
			}
			 ) 	
			
			} ) 
			
			
						
			$(document).on('click',"li.listepart",function(){
			
			var img = '<div ><img src="imgformation/Double.gif" width="50" height="50"> </div>'
			var bodycontenu = $(".body-contenu")
			var chapitre = $(this).attr('chapitre')
			$.ajax({
			beforeSend: function() {
			bodycontenu.html(img)
			
			//$('.btn-confrim-add').html('Traitement ...')
			// $('.liste-input').fadeTo(500,0.5);
			},
			url:"contenuform/calender/listepart.php",
			method:"POST",
			Type:"POST", 
			data: {controle:"listepart", chapitre : chapitre},
			success: function(data)
			{  bodycontenu.html(data) }
		
			} ) 	
			
			
			} ) 
			
							
			$(document).on('click',"li.Sterminer",function(){
			
			var img = '<div ><img src="imgformation/Double.gif" width="50" height="50"> </div>'
			var bodycontenu = $(".body-contenu")
			var chapitre = $(this).attr('chapitre')
			$.ajax({
			beforeSend: function() {
			bodycontenu.html(img)
			
			//$('.btn-confrim-add').html('Traitement ...')
			// $('.liste-input').fadeTo(500,0.5);
			},
			url:"contenuform/calender/historique.php",
			method:"POST",
			Type:"POST", 
			data: {controle:"terminer", chapitre : chapitre},
			success: function(data)
			{  bodycontenu.html(data) }
		
			} ) 	
			
			
			} ) 
			
			
			$(document).on('click',"button.valsession",function(){
				var	duree = $('select.duree option:selected').val()
			var	MN = $('select.MN option:selected').val()
			var	H = $('select.H option:selected').val()
			var	montantsession = $('.montantsession').val()
			var	datessession	 = $('.datessession').val()
			var img = '<div ><img src="imgformation/Double.gif" width="50" height="50"> </div>'
			var idmodule = $(this).attr('idmodule')
			var idform = $(this).attr('idform')
			
			if(MN =="" || H =="" || montantsession =="" || datessession =="" || idmodule == "" || idform== ""){
				
				alert(" Merci de remplir tous les champs ")
				} else{
			$.ajax({
			beforeSend: function() {
			$('.modal-content').html(img)
			//$('.btn-confrim-add').html('Traitement ...')
			// $('.liste-input').fadeTo(500,0.5);
			},
			url:"contenuform/calender.php",
			method:"POST",
			Type:"POST", 
			data: {controle:"calender", idform: idform, idmodule : idmodule, minute : MN, heure: H, montant: montantsession,
			datessession: datessession, duree:duree },
			success: function(data)
			{  $('.modal-content').html(data) }
			
			
			
			} ) 
			
			
			}	
			
			} ) 
	
	// function datepiker //		
$(document).on('focus','.datessession', function(){
$(".datessession").datepicker({
			altField: "#datepicker",
			changeMonth: true,
			changeYear: true,
			yearRange: '1941:2050',
			closeText: 'Fermer',
			prevText: 'Précédent',
			nextText: 'Suivant',
			currentText: 'Aujourd\'hui',
			monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
			monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
			dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
			dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
			dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
			weekHeader: 'Sem.',
			dateFormat: 'dd-mm-yy',
			inline: true
})

})

	
	/*session formation */
$(document).on("click","a.listeformation", function(){	
	
	
	var img ='<div ><img src="imgformation/Double.gif" width="50" height="50"> </div>'
	 $.ajax({
			beforeSend: function() {
				 $('.panel-principal').html(img); 
				// $('.btn-confrim').html('Traitement ...')
				 //$('.btn-confrim').addClass('disabled btn-confrim-add').removeClass("btn-confrim")
				 //$('.btn-confrim-add').html('Traitement ...')
				 //$('.liste-input').fadeTo(500,0.5);
			},
			url:"contenuform/liste.php",
			method:"POST",
			Type:"POST", 
			data: {controle:"liste"},
			success: function(data)
			{ 
			$('.panel-principal').html(data); 
			
			}
			})
				})

	$(document).on('click',"a.listeinscript",function(){
			
			var img = '<div ><img src="imgformation/Double.gif" width="50" height="50"> </div>'
			 $('.panel-principal').html(img); 
			$.ajax({
			beforeSend: function() {
				 $('.panel-principal').html(img); 
	
			},
			url:"contenuform/listeinscript.php",
			method:"POST",
			Type:"POST", 
			data: {controle:"terminer"},
			success: function(data)
			{  	 $('.panel-principal').html(data);  }
		
			} ) 	
			
			
			} ) 
			
			$(document).on('click',"a.listesession",function(){
			
			var img = '<div ><img src="imgformation/Double.gif" width="50" height="50"> </div>'
			 $('.panel-principal').html(img); 
			$.ajax({
			beforeSend: function() {
				 $('.panel-principal').html(img); 
	
			},
			url:"contenuform/listecalender.php",
			method:"POST",
			Type:"POST", 
			data: {controle:"calender"},
			success: function(data)
			{  	 $('.panel-principal').html(data);  }
		
			} ) 	
			
			
			} ) 
			
			$(document).on('click',"button.listedeclasse",function(){

			var idchapitre = $(this).attr('idchapitre'); 
			var idsession = $(this).attr('id-ligne-session'); 
			var img = '<div ><img src="imgformation/Double.gif" width="50" height="50"> </div>'
		
			$.ajax({
			beforeSend: function() {
			
			$('.modal-content').html(img)
			},
			url:"contenuform/calender/listedeclasse.php",
			method:"POST",
			Type:"POST", 
			data: {controle:"listedeclasse", chapitre : idchapitre , idsession : idsession},
			success: function(data)
			{  	$('.modal-content').html(data)  }
			
			} ) 	
			
			
			} ) 
			
	
});
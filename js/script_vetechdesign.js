// JavaScript 
/* 
VETECH&DESIGN
DPP: 
HAROUNA 
haruna 
recrutement@vetechdesign.net
contacts@vetechdign.net*/
$(function() {
	//$('.list-group').scrollspy({ target: '#navbar-example' })
//$('[data-toggle="tooltip"]').tooltip();
//$('body').scrollspy({ target: '#navbar-example' })
/*$('[data-spy="scroll"]').each(function () {
 // var $spy = $(this).scrollspy('refresh')
  $(this).scrollspy({ target: '#navbar-example' })
})*/
    var f_utils = {
		spinner : "<div class='container'><img src='img_vetech/spinner.gif' class='spinner' /> </div>",
		container: $( ".container" ),
        t_token : $("input#nav_token").val(),
        t_nav: $("input#nav").val(),
		alert_part:$( ".alert-participation"),
		alert_form_all:$( ".alert-form-all"),
		btn_spinner: '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>  Traitement...',
        load_wait: '<div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Chargement...</span></div>',
		disabled: 'disabled', 
		btn_success : "btn-success", 
		btn_warning : "btn-warning",
		btn_danger : "btn-danger",
		traitement : "traitement",
		liste_r_q : ".region_q",
        f_sp_css: function(){
         var f_css = {"width": 200,"height": 200, "margin-top": 100,"margin-left":"auto","margin-right": "auto", "margin-bottom": "auto"}
             return f_css
				 }, 
        f_sp_css_rest : function(){
         var f_css_rest= {"width": "auto","height": "auto","margin-top": "auto","margin-left":"auto","margin-right": "auto", "margin-bottom": "auto"}
         return f_css_rest;
				 }
    }
	
  
        
    
    var f_function = {
        controle_nav: function(nav_token,nav){
           var self = this ; 
           $.ajax({ 
		    url: "url/controle_nav.php",
            type: 'POST', 
            dataType:"json", 
            data: {controle:"nav", token : nav_token, encodenav:nav},
            success: function(rs_nav){
                if(rs_nav['count']==0){
                  $('#bd-example-modal-lg').modal({"backdrop": true})
                .addClass('mt-5 bg-transparent');
                $('.modal-content').html(rs_nav["formulaire"]).addClass('mt-5 bg-transparent');

                }else if(rs_nav['count']>0){
                
                }else{
                    
                    location.reload(); 
                }
              
             }
                        })
    }
,
        controle_nav_register: function($this_btn){
             var form_nav = $( "form#form_nav" ).serialize();
           var self = this ; 
         return $.ajax({ 
              beforeSend: function(){
           $this_btn.html(f_utils.btn_spinner)
              $this_btn.addClass(f_utils.disabled+' '+f_utils.traitement).
              removeClass("btn-register-nav")
            },
		    url: "url/controle_nav.php",
            type: 'POST', 
            dataType:"json", 
            data: (form_nav),
            success: function(rs_nav){
                if(rs_nav['champ']==0){
                $( ".alert-nav").html("<span class=' shadow-sm  p-2 text text-center text-danger alert alert-warning form-control'>"+rs_nav["name"]+"</span>");
                $this_btn.html("Poursuivre sur le site")
                $this_btn.addClass("btn-register-nav"+' '+f_utils.btn_warning).
               removeClass(f_utils.disabled+' '+f_utils.traitement)
                }
                else if(rs_nav['count']==0 || rs_nav['active']==0){
                 window.location.reload(); 
                }else if(rs_nav['count']>0 && rs_nav['active']=="1" ){
                 window.location.reload(); 
                }else{
                 window.location.reload(); 
                }
              
      
             }
                        })
    }
,
		resisgter_part: function(url,url_decoder,$this_btn){
        var form_participation = $( "form#form_participation" ).serialize();
      
         $.ajax({ 
		   beforeSend: function(){
           $this_btn.html(f_utils.btn_spinner)
              $this_btn.addClass(f_utils.disabled+' '+f_utils.traitement).
              removeClass("btn-register-part")
         },
            url: "p_register/r_register_session.php",
            type: 'POST', 
            dataType:"json", 
            data: (form_participation),  
            success: function(confrime_register) {
            if(confrime_register["code"]==1){
            $( ".alert-participation").html("<span class=' shadow-sm  p-2 text text-center text-danger alert alert-warning form-control'>"+confrime_register["contenu"]+"</span>");
                $this_btn.html("Confrimer participation")
                $this_btn.addClass("btn-register-part"+' '+f_utils.btn_warning).
               removeClass(f_utils.disabled+' '+f_utils.traitement)
            }else if(confrime_register["code"]==0){
            window.location.href ="?url="+confrime_register["url"]+"&f_for="+confrime_register["encoder"]   
            }else{
            location.reload;
            }

            }

       
    
        })
    }, 
		
        input_rest_alert: function(){
             
             f_utils.alert_part.html('')
         }, 
		
        connect_all: function(url,url_decoder,$this_btn){
            var form_connect_form = $( "form#form-inline" ).serialize();
            var token_vetech = $this_btn.attr('token')
            $.ajax({ 
            beforeSend: function(){
            $this_btn.html(f_utils.btn_spinner)
            $this_btn.addClass(f_utils.disabled+' '+f_utils.traitement).
            removeClass("btn-register-part")
            },
            url: "p_register/controle_connect.php",
            type: 'POST', 
            dataType:"json", 
            data: (form_connect_form),  
            success: function(confrime_register) {
            if(confrime_register["code"]==1){
            window.location.href =confrime_register["url"]
            }else if(confrime_register["code"]==0){
             $( ".alert-connect").html("<span class=' shadow-sm  p-2 text text-center text-danger alert alert-warning form-control'>"+confrime_register["contenu"]+"</span>");
            $this_btn.html('<i class="fas fa-sign-in-alt"></i> Connexion')
            $this_btn.addClass("connexion_all"+' '+f_utils.btn_warning).
            removeClass(f_utils.disabled+' '+f_utils.traitement)
            }else{
            location.reload;
            }

            }

            })
            }, 
		
		connect_register_all_form: function(url,url_decoder,$this_btn){
		var form_connect_form = $( "form#form_all_connect" ).serialize();
		//var token_vetech = $this_btn.attr('token')
		$.ajax({ 
		beforeSend: function(){
		 $this_btn.html(f_utils.btn_spinner)
              $this_btn.addClass(f_utils.disabled+' '+f_utils.traitement).
              removeClass("btn-register-c-d")
		},
			url: "p_register/controle_register_all_form.php",
			type: 'POST', 
			dataType:"json", 
			data: (form_connect_form),  
			success: function(confrime_register) {
			if(confrime_register["code"]==1){
			window.location.href =confrime_register["url"]
			}else if(confrime_register["code"]==0){
            $( ".alert-form-all").html("<span class=' shadow-sm  p-2 text text-center text-danger alert alert-warning form-control'>"+confrime_register["contenu"]+"</span>");
            $this_btn.html(confrime_register["label"])
            $this_btn.addClass("btn-register-c-d"+' '+f_utils.btn_warning).
            removeClass(f_utils.disabled+' '+f_utils.traitement)
			}else{
			location.reload;
			}

		}

		})
		},
		
        deconnect_all_: function($this__btn){
				$.ajax({ 
		beforeSend: function(){
		      $this__btn.html(f_utils.btn_spinner)
              $this__btn.addClass(f_utils.disabled+' '+f_utils.traitement).
              removeClass("deconnect_all")
		},
			url: "p_register/deconnect_all.php",
			type: 'POST', 
			dataType:"json",
            data:{control:"controle"},
			success: function(confrime_register) {
			if(confrime_register["code"]==0 ){
                  
                window.location.reload()
                
			}else{
			 window.location.reload()
			}
}

		})
		},
		
        contact_all: function($this__btn){
		$.ajax({ 
		beforeSend: function(){
		      $this__btn.html(f_utils.btn_spinner)
              $this__btn.addClass(f_utils.disabled+' '+f_utils.traitement).
              removeClass("contact_all")
		},	url: "p_register/controle_contact_all.php",
			type: 'POST', 
			dataType:"json",
            data:{control:"controle"},
			success: function(confrime_register) {
			if(confrime_register["code"]==0 ){
                  
                window.location.reload()
                
			}else{
			 window.location.reload()
			}

		}

		})
		}, 
		
		check_quatre: function __f_check_quart($this__btn,$_id_region,$_token){
			$.ajax({ 
			beforeSend: function(){
			//$this__btn.html(f_utils.btn_spinner)
			//$this__btn.addClass(f_utils.disabled+' '+f_utils.traitement).
			// removeClass("contact_all")
			},	url: "p_register/controle_recheche.php",
			type: 'POST', 
			dataType:"json",
			data:{control:"controle", id_r : $_id_region, token: $_token, f_page:"f_quartier" },
			success: function(rs_region) {
			if(rs_region["code"]==1){
			if(rs_region['count']>=1){
			$("select#edit-quartier").html(rs_region['liste'])
			}else if(rs_region['count'] ==0){alert('aucun quartier disponible')}
			}	} }
		)	 
 } , 	
		check_cathegorie: function __f_check_type_cathegorie($this__btn,$_id_cathegorie,$_token){
			$.ajax({ 
			beforeSend: function(){
			//$this__btn.html(f_utils.btn_spinner)
			//$this__btn.addClass(f_utils.disabled+' '+f_utils.traitement).
			// removeClass("contact_all")
			},	url: "p_register/controle_recheche.php",
			type: 'POST', 
			dataType:"json",
			data:{control:"controle", id_r : $_id_cathegorie, token: $_token, f_page:"f_typecat" },
			success: function(rs_cathegorie) {
			if(rs_cathegorie["code"]==1){
			if(rs_cathegorie['count']>=1){
			$("select#edit-typcat").html(rs_cathegorie['liste'])
			}else if(rs_cathegorie['count']==0){alert('aucun quartier disponible')}
			}	} }
		)	 
 } , 
		
		annonce_register: function __f_annonce_register($this__btn){
			var form_annonce = $( "form#form-annonce" ).serialize();
			$.ajax({ 
			beforeSend: function(){
			//$this__btn.html(f_utils.btn_spinner)
			//$this__btn.addClass(f_utils.disabled+' '+f_utils.traitement).
			//removeClass("btn-annonce-confirm")
			},	url: "p_register/controle_register_all_annonce.php",
			type: 'POST', 
			dataType:"json",
			data:(form_annonce),
			success: function(rs_annonce) {
			if(rs_annonce["code"]==1){
           window.location.href ="?url="+rs_annonce["url"]+"&f_for="+rs_annonce["encoder"]   
            }else if(rs_annonce["code"]==0){
             $( ".alert-annonce").html("<span class=' shadow-sm  p-2 text text-center text-danger alert alert-warning form-control'>"+rs_annonce["contenu"]+"</span>");
            $this__btn.html('<i class="fas fa-thumbs-up"></i> Confirmation')
            $this__btn.addClass("btn-annonce-confirm"+' '+f_utils.btn_warning).
            removeClass(f_utils.disabled+' '+f_utils.traitement)
            }else{
            location.reload;
            }	} }
		)	 
 } ,
		upload_file: function __f_upload_file($this__btn, $token){
			
			$.ajax({ 
			beforeSend: function(){
			
            $(".modal-content").html(f_utils.btn_spinner)
			},	url: "p_register/upload.php",
			type: 'POST', 
			data:{controle:'upload', token : $token},
			success: function(rs_upload) {
				
				$(".modal-content").html(rs_upload)
				
				} }
		)	 
 } ,
		
  		resultat_rechercher: function __f_resultat_recherche($this__btn,$_id_region,$_token){
			var form_recherche = $( "form#form-recherche" ).serialize();
			$.ajax({ 
			beforeSend: function(){
			//$this__btn.html(f_utils.btn_spinner)
			//$this__btn.addClass(f_utils.disabled+' '+f_utils.traitement).
			// removeClass("contact_all")
			},	url: "p_register/controle_recheche.php",
			type: 'POST', 
			dataType:"json",
			data:(form_recherche),
			success: function(rs_region) {
			if(rs_region["code"]==1){
			if(rs_region['count']>=1){
			$("select#edit-quartier").html(rs_region['liste'])
			}else if(rs_region['count'] ==0){alert('aucun quartier disponible')}
			}	} }
		)	 
            
 } 
	
	
	
	
	}// fin de a function 	

	
        function $_GET(param) {
        var vars = {};
        window.location.href.replace( location.hash, '' ).replace( 
        /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
        function( m, key, value ) { // callback
        vars[key] = value !== undefined ? value : '';
        }
        );

        if ( param ) {
        return vars[param] ? vars[param] : null;	
        }
        return vars;
        }
    

  
// parametre get  function url --> page correspondant
   
    
 function controle_url(t_url,url_para,par_url){
       
   
        $.ajax({ 
        beforeSend: function(){
        f_utils.container.html(f_utils.spinner).css(f_utils.f_sp_css())
        },
        url: "url/controle_url.php",
        type: 'POST', 
		data: {
        url_post: t_url, 
        url_para: url_para,
        par_url: par_url
        },  
        success: function( result ) {
        if(result!=""){
        $( ".container" ).html( "" + result + "" )
        .css(f_utils.f_sp_css_rest());
			$('title').html(t_url.toUpperCase()+" VETECH&DESIGN")
			$("meta[name='Description']").attr("content",t_url.toUpperCase()+" VETECH&DESIGN")
      
           f_function.controle_nav(f_utils.t_token,f_utils.t_nav);
          
  if(t_url=="annonce"){
					$('#fotorama').fotorama({
					width: 400,
					height:400,
					margin:2,
					ratio: 16/9,
					allowfullscreen: "native",
					nav: 'thumbs', 
					top:0,
					left:0,
					thumbmargin: 2,
					thumbwidth:64,
					thumbheight:64,
					spinner: {
					lines: 13,
					color: 'rgba(0, 0, 0, .75)'
					},  
					clicktransition: 'dissolve',
					autoplay:3000, 
					keyboard:true, 
					click:	true, 
					fit: "cover",
					thumbfit:"cover",
					transition:"crossfade", 
					direction:"ltr",
					hash: true,
					stopautoplayontouch:true,
						click:true,
						keyboard:{"space": true, "home": true, "end": true, "up": true, "down": true},
						trackpad:{" Arrows":true,"click":true,"swipe":true}

					});
			}

		}else{

        location.reload;
        }}


           
})
    }


  
/*liste des documents on  */

$(document).on("click","button.btn-register-part",function(){
         var para_decoder = $(this).attr('para')
         var para_url = $(this).attr('url')
         var $btn_this = $(this)
        f_function.resisgter_part(para_url,para_decoder,$btn_this);

            })
    $(document).on("click","button.btn-register-nav",function(){
        var $btn_this = $(this)
        f_function. controle_nav_register($btn_this);
            })
    
			
$(document).on("click","button.contact_all",function(){
         var para_decoder = $(this).attr('para')
         var para_url = $(this).attr('url')
         var $btn_this = $(this)
        f_function.contact_all(para_url,para_decoder,$btn_this);
       
        
            })		
$(document).on("click","button.btn-register-c-d",function(){
         var para_decoder = $(this).attr('para')
         var para_url = $(this).attr('url')
         var $btn_this = $(this)
         f_function.connect_register_all_form(para_url,para_decoder,$btn_this);
       
        
            })
$(document).on("click","button.connexion_all",function(){
         var para_decoder = $(this).attr('para')
         var para_url = $(this).attr('url')
         var $btn_this = $(this)
         f_function.connect_all(para_url,para_decoder,$btn_this);
       
        
            })
$(document).on("click","button.deconnect-all",function(){
          var $btn_this = $(this)
         f_function.deconnect_all_($btn_this);
       
        
            })
$(document).on("click","select#edit-lieu option",function(){
var $btn_this = $(this)
var id_val = $btn_this.attr("id_liste_region")
var token = $('input.token_recherche').val(); 

f_function.check_quatre($btn_this,id_val,token);
   })   	 	

$(document).on("click","select#edit-cat option",function(){
          var $btn_this = $(this)
		  var id_val = $btn_this.attr("id_liste_cat")
		  var token = $('input.token_recherche').val(); 
		
         f_function.check_cathegorie($btn_this,id_val,token);
                   })
$(document).on("click","button.btn-annonce-confirm",function(){
         var $btn_this = $(this)
         f_function.annonce_register($btn_this);
            })	
$(document).on("click","button.btn-update-file",function(){
         var $btn_this = $(this)
		 var $t = $(this).attr('token')
         f_function.upload_file($btn_this,$t);
         
            })	
	
$(document).on("click","button.btn-recherche-vetech",function(){
          var $btn_this = $(this)
		 f_function.resultat_rechercher($btn_this);
                   })	
$(document).on("keyup","input",function(){
        $( ".alert-participation").html('');
        $("button.btn-register-part").addClass(f_utils.btn_success).
        removeClass(f_utils.btn_warning);
        $( ".alert-form-all").html('');
        $("button.btn-register-c-d").addClass(f_utils.btn_success).
        removeClass(f_utils.btn_warning);
         $( ".alert-connect").html('');
        $("button.connexion_all").addClass(f_utils.btn_success).
        removeClass(f_utils.btn_warning);
	    $( ".alert-annonce").html('');
        $("button.btn-annonce-confirm").addClass(f_utils.btn_success).
        removeClass(f_utils.btn_warning);
        })
       

    
		var u = $_GET('url') ;
		var p = $_GET('f_for') ;
		var s = $_GET('par_url') ;
	
		if(u==null){
		var u = "accueil"; 
		controle_url(u,p,s); 
			
		}else{
		controle_url(u,p,s); 
			
		}
   
	



});

<?php 

class f_af{
	public function upload(){
		
		$_file ='<div id="fileuploader" class="p-2 m-2 shadow-sm rounded"></div>
		<script>
		$(document).ready(function() {
		$("#fileuploader").uploadFile({
		url:"update_news/update/php/upload.php",
		dragDrop: true,
		fileName: "myfile",
		returnType: "json",
		showDelete: true,
		showDownload:false,
		statusBarWidth:"96%",
		dragdropWidth:"100%",
		maxFileSize:500*5000,
		showPreview:true,
		previewHeight: "100%",
		previewWidth: "100%",

		onLoad:function(obj)
		{
		$.ajax({
		cache: false,
		url: "update_news/update/php/load.php",
		dataType: "json",
		success: function(data) 
		{
		for(var i=0;i<data.length;i++)
		{ 
		obj.createProgress(data[i]["name"],data[i]["path"],data[i]["size"]);
		}
		}
		});
		},
		deleteCallback: function (data, pd) {
		for (var i = 0; i < data.length; i++) {
		$.post("update_news/update/php/delete.php", {op: "delete",name: data[i]},
		function (resp,textStatus, jqXHR) {
		//Show Message	
		//alert("Ficher supprimer avec succès");
		});
		}
		pd.statusbar.hide(); //You choice.

		},
		downloadCallback:function(filename,pd)
		{
		location.href="update_news/update/php/download.php?filename="+filename;
		}
		});
		});
		</script>';

		return $_file; 		
		}


	
}

$_u = new f_af(); 

echo $_u->upload(); 


?>
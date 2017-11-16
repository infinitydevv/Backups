
	function modal(id){
		if(id!=""){

		  var xmlHttp = new XMLHttpRequest();
		  xmlHttp.onreadystatechange = function(){
		    if(xmlHttp.readyState === 4 && xmlHttp.status === 200){
		      document.getElementById("retorno").innerHTML = xmlHttp.responseText;
		    }
		  }
		  var url = "modal.php?id=" + id;
		  xmlHttp.open("GET", url, true);
		  xmlHttp.send();
		}else{
			alert("ERRO");
		}

	}

	
		$('#login').keyup(function (){
    	  var valor = $('#login').val();
		  
		  var xmlHttp = new XMLHttpRequest();
		  xmlHttp.onreadystatechange = function(){
		    if(xmlHttp.readyState === 4 && xmlHttp.status === 200){
		      $('#login').addClass(xmlHttp.responseText);
		      if(xmlHttp.responseText == 'is-valid'){
		      	$('#login').removeClass('is-invalid');
		      	$('#alert1').remove();
		      	$('#rs1').append('<div class="alert alert-success" id="alert1" role="alert">Login válido</div>');
		      }else if(xmlHttp.responseText == 'is-invalid'){
		      	$('#login').removeClass('is-valid');
		      	$('#alert1').remove();
		      	$('#rs1').append('<div class="alert alert-danger" id="alert1" role="alert">Login já existente</div>');
		      }
		    }
		  }
		  var url = "../usuario/verificaCampos.php?login=" + valor;
		  xmlHttp.open("GET", url, true);
		  xmlHttp.send();
		});

		$('#email').keyup(function (){
    	  var valor = $('#email').val();
		 
		  var xmlHttp = new XMLHttpRequest();
		  xmlHttp.onreadystatechange = function(){
		    if(xmlHttp.readyState === 4 && xmlHttp.status === 200){
		      $('#email').addClass(xmlHttp.responseText);
		      var teste = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		      if(teste.test($('#email').val())){
			      if(xmlHttp.responseText == 'is-valid'){
			      	$('#email').removeClass('is-invalid');
			      	$('#alert').remove();
			      	$('#rs').append('<div class="alert alert-success" id="alert" role="alert">Email válido</div>');
			      }else if(xmlHttp.responseText == 'is-invalid'){
			      	$('#email').removeClass('is-valid');
			      	$('#alert').remove();
			      	$('#rs').append('<div class="alert alert-danger" id="alert" role="alert">Email já cadastrado</div>');
			      }
			  }else{
			  	$('#email').removeClass('is-valid');
			    
			    $('#alert').remove();
			    $('#rs').append('<div class="alert alert-danger" id="alert" role="alert">Email inválido</div>');
			  }
		    }
		  }
		  var url = "../usuario/verificaCampos.php?email=" + valor;
		  xmlHttp.open("GET", url, true);
		  xmlHttp.send();

		});


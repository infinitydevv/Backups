		var cont = 0;
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
		      	cont += 1;
		      	$('#alert1').remove();
		      	$('#rs1').append('<div class="alert alert-danger" id="alert1" role="alert">Login já existente</div>');
		      }
		    }
		  }
		  var url = "../usuario/verificalogin.php?login=" + valor;
		  xmlHttp.open("GET", url, true);
		  xmlHttp.send();
		    if(cont != 0){
				$("#buttonn").prop("disabled", true);
			} else {
				$("#buttonn").removeAttr("disabled");
			}
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
			      	cont += 1;
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
		  var url = "../usuario/verificalogin.php?email=" + valor;
		  xmlHttp.open("GET", url, true);
		  xmlHttp.send();
		  	if(cont != 0){
				$("#buttonn").prop("disabled", true);
			} else {
				$("#buttonn").removeAttr("disabled");
			}

		});

		$('#senha').keyup(function(){
			var forca = 1;
			var senha = $('#senha').val();

			if((senha.length >= 7) && (senha.length <= 20)){
				forca += 10;
			}else if(senha.length>20){
				forca += 25;
			}
			if(senha.match(/[a-z]+/)){
				forca += 10;
			}
			if(senha.match(/[A-Z]+/)){
				forca += 20;
			}
			if(senha.match(/\d/)){
				forca += 20;
			}
			if(senha.match(/\W/)){
				forca += 25;
			}

			if(forca < 30){
				$('#forc').remove();
				$('#forca').append('<div class="progress"  id="forc"><div class="progress-bar bg-danger"  role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Senha fraca</div></div>');
			}else if(forca >= 30 && forca <= 49) {
				$('#forc').remove();
				$('#forca').append('<div class="progress"  id="forc"><div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Senha regular</div></div>');
			}else if(forca >= 50 && forca <= 60) {
				$('#forc').remove();
				$('#forca').append('<div class="progress"  id="forc"><div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">Senha regular</div></div>');
			}else if(forca >= 61 && forca <= 79){
				$('#forc').remove();
				$('#forca').append('<div class="progress"  id="forc"><div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">Senha forte</div></div>');
			}else if(forca >= 80 && forca <= 100){
				$('#forc').remove();
				$('#forca').append('<div class="progress"  id="forc"><div class="progress-bar bg-success" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">Senha forte</div></div>');
			}else if(forca >= 101 && forca <= 110){
				$('#forc').remove();
				$('#forca').append('<div class="progress"  id="forc"><div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Senha forte</div></div>');
			}
		});

		$('#senhaC').keyup(function(){
			var senha = $('#senha').val();
			var senhaC = $('#senhaC').val();
			if(senha != senhaC){
				cont += 1;
				$('#config').remove();
				$('#senha').addClass('is-invalid');
				$('#senhaC').addClass('is-invalid');
				$('#senha').removeClass('is-valid');
				$('#senhaC').removeClass('is-valid');
				$('#conf').append('<div class="alert alert-danger" id="config" role="alert">As senhas não correspondem, repita a senha corretamente!</div>');
			}else{
				$('#senha').addClass('is-valid');
				$('#senhaC').addClass('is-valid');
				$('#senha').removeClass('is-invalid');
				$('#senhaC').removeClass('is-invalid');
				$('#config').remove();
			}

			if(cont != 0){
				$("#buttonn").prop("disabled", true);
			} else {
				$("#buttonn").removeAttr("disabled");
			}
		
		});



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


 $(document).ready( function(){

    function igualarAltura (elem,tipoReturn='false'){
	    var boxService = $(elem);
	   	var aux=0, h, i, result;
	    for (i = 0; i < boxService.length; i++) {
	    	h = boxService.eq(i).height();
	    	if (h>=aux){
	    		result =  h;
	    		aux = result;
	    	}else{
	    		result = aux;
	    	}
	    }
	    if (tipoReturn===true){
	    	// valor
	    	return result;
	    }else{
	    	// aplica  aaltura aos elementos
	    	boxService.height(result);
	    }

    }
    //igualarAltura('.list-service .box-service');


    function limitador(text){
        var lim=280;
        return text.substring(0, lim)+'<span class="limit-str">'+text.substring(text.length,lim)+'</span><span class="reticencias">...&nbsp;&nbsp;</span><a class="ver-mais">ver mais...</a>';
    }

    $(".limit").each(function(i) {
        var limit = $(this);
        var text = $(this).text();
        var len = text.length;
        $(limit).html(limitador(text));
    });


    $(".ver-mais").click( function(e) {
        e.preventDefault(); 
        $(this).parents(".limit").eq(0).find('.limit-str').toggle().toggleClass('open-text');   
        $(this).parents(".limit").eq(0).find('.reticencias').toggle();    
        var text = ' ver mais...';
        var total = $(this).parents(".limit").eq(0).find('.open-text').size();
        if (total>0) {
            text = ' Ocultar ...';
        }
        $(this).parents(".limit").eq(0).find('.ver-mais').text(text);
    });











 });
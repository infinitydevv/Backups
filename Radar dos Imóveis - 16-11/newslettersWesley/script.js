
   	$('#janela1').ready(function(){
   		$('body').css({'overflow': 'hidden'});
        $('body').attr('id', 'body');
        var alturaTela = $(document).height();
        var larguraTela = $(window).width();
        //colocando o fundo preto
        $('#mascara').css({'width':larguraTela,'height':alturaTela});
        $('#mascara').fadeIn(1000); 
        $('#mascara').fadeTo("slow",0.8);
 
        var left = ($(window).width() /2) - ( $('#janela1').width() / 2 );
        var top = ($(window).height() / 2) - ( $('#janela1').height() / 2 );
     
        $('#janela1').css({'top':top,'left':left});
        $('#janela1').show();
        
    });
 
    $("#mascara").click( function(){
        $(this).hide();
        $(".window").hide();
        $('body').css({'overflow': 'scroll'});
        $('body').removeAttr('id');
    });
 
    $('.fechar').click(function(ev){
        ev.preventDefault();
        $("#mascara").hide();
        $(".window").hide();
        $('body').css({'overflow': 'scroll'});
        $('body').removeAttr('id');
    });

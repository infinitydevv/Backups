$(document).ready(function(){
            $(".cont_tab").hide();
            $("ul.tabs li:first").addClass("active").show();
            $(".cont_tab:first").show();
            $("ul.tabs li").click(function () {
                $("ul.tabs li").removeClass("active")
                $(this).addClass("active")
                $(".cont_tab").hide();
                var activeTab = $(this).find("a").attr("href");
                $(activeTab).fadeIn("slow");
                return false;
                                   });
 
		    /*Efeito Zebrado*/
		    $('tr:odd').css('background','#FFEBCC');
});
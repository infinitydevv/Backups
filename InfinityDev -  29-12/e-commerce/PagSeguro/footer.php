<script src="../bibliotecas/handlebars-v4.0.11.js"></script>
<script>
  $(function(){
    if(script instanceof Array){

      $.each(script, function(index, fn){
        if(typeof fn === 'function'){
          fn();
        }
      });

    }
  });
</script>
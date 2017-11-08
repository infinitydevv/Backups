<?php
  
  $nome = $_GET['foto'];
  $ext = $_GET['ext'];
  
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <title>Edição de Imagem</title>
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="../../bibliotecas/Croppie/croppie.css" />
    <style>
      body{
        background-color: #ffe101!important;
      }
    </style>
  </head>
  <body>
      <script src="../../bibliotecas/jquery-3.2.1.min.js"></script>
      <script src="../../bibliotecas/Croppie/croppie.js"></script>
      <script src="../../bibliotecas/Croppie/exif.js"></script>
      <div class="container">
        <br>
        <input type="hidden" id="nome" value="<?php echo $nome; ?>">
        <input type="hidden" id="ext" value="<?php echo $ext; ?>">
        <input type="hidden" id="foto" value="../fotos/<?php echo $nome; ?>.<?php echo $ext; ?>">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edição de imagem</h5>
            </div>
            <div class="modal-body">
                <div id="demo"></div>
            </div>
            <div class="modal-footer">
              <button id="mostrar" class="btn btn-danger">Cortar</button>
            </div>
          </div>
      </div>

                    <script>
                var im = $('#foto').val();
                var name = $('#nome').val();
                var ext = $('#ext').val();
                var demo = document.getElementById('demo');
                var crp = new Croppie(demo, {
                    enableExif: true,
                    viewport: {
                        width: 1000,
                        height: 500,
                        type: 'square'
                    },
                    boundary: {
                        width: 1000,
                        height: 500
                    },
                    mouseWheelZoom: false,
                    enableResize: true
                });

                  crp.bind({
                      url: im,
                      orientation: 1,
                      zoom: 0
                  });
              $('#mostrar').click(function(){
                crp.result('base64','viewport').then(function(canvas) {
                  $.ajax({
                    url: "upload.php",
                    type: "POST",
                    data: {"image":canvas, "name": name, "ext": ext},
                    success: function() {
                      window.location.assign("http://profglauber.com.br/canto-do-conto/");
                    }
                  });
                });
              });
              </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
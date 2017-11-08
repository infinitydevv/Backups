<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="stylesheet" type="text/css" href="../css/tex.css">
    <script type="text/javascript" src="../bibliotecas/push.js/bin/push.min.js"></script>
  </head>
  <body>
  	<script>
  		Push.create("Novidades", {
		    body: "Poesias e fotos adicionadas, clique para conferir!",
		    icon: 'img/logoglauber.png',
		    timeout: 5000,
		    onClick: function () {
		        window.focus();
		        window.open('http://www.profglauber.com.br/contos.php', '_blank');
		    }
		  });
	   </script>
     <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <a class="navbar-brand" href="#"><img src="../img/logoglauber.png" width="55"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="#"><img src="../img/home.png"> Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#sobre"><img src="../img/iinfox.png"> Sobre</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php"><img src="../img/iserv.png"> Serviços</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#instagram"><img src="img/mail.png"> Instagram</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#conto"><img src="../img/ibook.png"> Canto do Conto</a>
              </li>
        </ul>
      </div>
    </nav>
     <div class="container-fluid">
      <div class="row">
        <div class="col-3 fixed-top" id="col-3-menu">
          <div class="">
            <img src="../img/logoglauber.png" class="img-fluid rounded mx-auto d-block" id="logo" width="200">
            <h1 class="display-5 text-center" id="nome">Professor Glauber Gonçalves</h1>
            <hr class="hrs">
            <ul class="nav flex-column">
              <li class="nav-item as">
                <a class="nav-link" href="#"><img src="../img/home.png"> Home</a>
              </li>
              <li class="nav-item as">
                <a class="nav-link" href="#sobre"><img src="../img/iinfox.png"> Sobre</a>
              </li>
              <li class="nav-item as">
                <a class="nav-link" href="index.php"><img src="../img/iserv.png"> Serviços</a>
              </li>
              <li class="nav-item as">
                <a class="nav-link" href="#instagram"><img src="../img/mail.png"> Instagram</a>
              </li>
              <li class="nav-item as">
                <a class="nav-link" href="#conto"><img src="../img/ibook.png"> Canto do Conto</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-12 col-md-9 float-right">
          <div class="container">
            <div id="sobre" class="divs">
              <h3 class="text-center display-4">Sobre</h3>
              <blockquote class="blockquote">
                <p class="mb-0">Sou um profissional dedicado a tornar a vida pessoal e empresarial dos meus clientes mais
                  adequada aos novos desafios que encontramos hoje em dia em nossas vidas, busco sempre
                  elevar meus clientes do ponto atual A para o ponto desejado B.</p>
                <p class="mb-0">Para tal realizei minhas formações em Gestão Empresarial, tendo especializações pela
                  Fundação Getúlio Vargas e o Mestrado pelo INDEG – Instituto de Negócios da Universidade
                  Federal de Lisboa PT.</p>
                <p class="mb-0">Sejam em consultorias, ou em treinamentos busco adequar meus clientes na melhoria
                  continua de suas formas de gestão, pessoal ou profissional para o alcance de seus resultados e
                  metas traçadas.
                </p>
                <footer class="blockquote-footer">Glauber Gonçalves.</footer>
              </blockquote>
            </div>
          </div>
            <div id="contato">
                  <h3 class="text-center display-4">Instagram</h3><br>
                  <div id="wrapper">
                    <div class="container">
                      <div id="columns">
                        <?php
                          require_once('bibliotecas/instagramAPI/recent.php');

                          session_start();

                          include 'bibliotecas/instagramAPI/config.php'; // include app data

                          $access_token = "930481055.9f7ba20.5146265ccb9e44b2bc22f96e739a5851";
                          /* Get User popular media  */

                          $method = 0; // method = 1, because we want GET method

                          $url = "https://api.instagram.com/v1/users/930481055/media/recent/?access_token=$access_token";

                          $header = 0; // header = 0, because we do not have header

                          $data = 0; // because we want GET method


                          $json = 0; // json = 1, because we want JSON response

                          $json_data  = getdarausingcurl($method, $url, $header, $data, $json);

                          $get_recent_media = json_decode($json_data);

                          foreach ($get_recent_media->data as $media) {
                            // output media
                            /*if ($media->type === 'video') {
                            // video
                              $poster = $media->images->low_resolution->url;
                              $source = $media->videos->standard_resolution->url;
                              $content .= "<video class=\"media video-js vjs-default-skin\" width=\"250\" height=\"250\" poster=\"{$poster}\"
                              data-setup='{\"controls\":true, \"preload\": \"auto\"}'>
                              <source src=\"{$source}\" type=\"video/mp4\" />
                              </video>";
                            } else {
                              // image
                              $image = $media->images->low_resolution->url;
                              $content .= '<img class="card-img-top" src="'.$image.'" alt="Card image cap">';
                            }*/
                            // create meta section

                            $image = $media->images->low_resolution->url;
                            $content .= '<img class="card-img-top" src="'.$image.'" alt="Card image cap">';
                            $avatar = $media->user->profile_picture;
                            $username = $media->user->username;
                            $comment = (!empty($media->caption->text)) ? $media->caption->text : '';
                            $likes = $media->likes->count;
                            $comments = $media->comments->count;
                            echo '<div class="grid">
                                    <img src="'.$image.'" class="img-fluid"/><br>
                                    <div class="container">
                                      <span>'.$comment.'</span>
                                    </div>
                                    <hr>
                                    <div class="row">
                                      <div class="col-6 text-center">
                                        <img src="../img/like1.png">
                                        <span>'.$likes.'</span>
                                      </div>
                                      <div class="col-6 text-center">
                                        <img src="../img/chat.png">
                                        <span>'.$comments.'</span>
                                      </div>
                                    </div>
                                  </div>';
                          }
                        ?>
                    </div>
                  </div>
                </div>  
              </div>
            </div>
          </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>
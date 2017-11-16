<?php
  session_start();
  require_once('login/functions.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <!-- Required meta tags -->
  <title>Prof. Glauber</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/index1.css">
  <link rel="stylesheet" type="text/css" href="css/tex.css">
  <script type="text/javascript" src="bibliotecas/push.js/bin/push.min.js"></script>
</head>
<body>
 <script>
  Push.create("Novidades", {
    body: "Poesias e fotos adicionadas, clique para conferir!",
    icon: 'img/logoglauber.png',
    timeout: 5000,
    vibrate: [2000, 1000],
    onClick: function () {
      window.focus();
      window.open('http://www.profglauber.com.br/contos.php', '_blank');
    }
  });
</script>
<?php require_once('nav-bar-logado.php'); ?>
<div class="fixed-bottom">
  <div class="row">
    <div class="col-6 text-left">
      <a style="margin: 0px 0px 25px 25px;" href="https://api.whatsapp.com/send?phone=555193296514" target="_blank" class="btn btn-success "><img src="img/whats.png" width="30"></a>
    </div>
    <div class="col-6 text-right">
      <a style="margin: 0px 25px 25px 0px;" href="#tope" class="btn btn-danger"><img src="img/seta.png" width="30"></a>
    </div>
  </div>
</div>
<div class="container-fluid"><br>
  <h1 class="text-center" id="titu">Professor Glauber Gonçalves</h1>
  <div id="exampleAccordion" data-children=".item">
    <div class="item">
      <div class="row mobile">
        <div class="col-12 col-sm-3 text-center">
          <div class="div-c">
            <a href="#inst" class="btn btn-dark">
              <h3>Institucional</h3>
            </a>
          </div>
        </div>
        <div class="col-12 col-md-3 text-center">
          <div class="div-c">
            <a href="#voce" class="btn btn-dark">
              <h3>Para você</h3>
            </a>
          </div>
        </div>
        <div class="col-12 col-sm-3 text-center">
          <div class="div-c">
            <a href="#empresa" class="btn btn-dark">
              <h3>Para sua empresa</h3>
            </a>
          </div>
        </div>
        <div class="col-12 col-sm-3 text-center">
          <div class="div-c">
            <a href="#contato" class="btn btn-dark">
              <h3>Contato</h3>
            </a>
          </div>
        </div>
      </div>
      <br>
      <div class="container desk">
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link" href="#inst">Institucional</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#voce">Para você</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#empresa">Para sua empresa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contato">Contato</a>
          </li>
        </ul>
      </div>
      <hr>
    </div>
  </div>
</div>
<div class="jumbotron jumbotron-fluid" id="inst">
  <h2 class="text-center">Institucional</h2><br>
  <div class="container">
    <p class="lead">Somos uma empresa que por intermédio de atendimento direto ou com parceiros procura orientação para pessoas e empresas que buscam alcançarem seus objetivos com a perfeita combinação de melhor produtividade e melhores receitas.</p>
    <div class="row">
      <div class="col-12 col-sm-4">
        <img src="img/ideia.png" class="mx-auto d-block" width="128">
        <h3 class="text-center">Missão:</h3>
        <p class="lead text-center">Orientar você ou sua empresa em sua caminhada do ponto atual A ao ponto desejado B, sendo feliz.</p>
      </div>
      <div class="col-12 col-sm-4">
        <img src="img/visao.png" class="mx-auto d-block" width="128">
        <h3 class="text-center">Visão:</h3>
        <p class="lead text-center">Estar entre os melhores orientadores para seu sucesso ou o sucesso de sua empresa.</p>
      </div>
      <div class="col-12 col-sm-4">
        <img src="img/valor.png" class="mx-auto d-block" width="128">
        <h3 class="text-center">Valores:</h3>
        <p class="lead text-center">Ética na educação
          Respeito a todos os públicos
        Orientação baseada nos valores cristãos</p>
      </div>
    </div>
  </div>
</div>
<div class="prlx" id="voce">
  <h1 class="text-center">Para você</h1><br>
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-6">
        <h3 class="text-center">Análise financeira</h3>
        <p class="lead">Orientação para a saúde financeira com um trabalho focado na reeducação financeira abordando as entradas e saídas para que você melhore suas performances.</p>

        <h3 class="text-center">Análise de investimentos</h3>
        <p class="lead">Orientação para você que já tem uma boa educação financeira e deseja ampliar suas informações em um mix de opções para resguardar seus ativos.</p>


        <h3 class="text-center">Consultoria para viabilidade de projetos</h3>
        <p class="lead">Orientação para você que deseja viabilizar um novo projeto de vida, seja pessoal, profissional ou emprsarial, contando com a utilização das mais modernas ferramentas de apoio a tomada de decisão.</p>
      </div>

      <div class="col-12 col-sm-6">
        <h3 class="text-center">Recuperação financeira</h3>
        <p class="lead">Orientação para você que por algum motivo está vivendo um revez financeiro, auxiliando na tomada de decisão para uma melhoria em sua vida.</p>

        <h3 class="text-center">Técnicas de gestão</h3>
        <p class="lead">Orientação para que você retome o curso de sua vida ou reoriente suas estratégias para que alcance seus objetivos e metas.</p>

        <h3 class="text-center">Aulas particulares sobre gestão empresarial</h3>
        <p class="lead">Orientação para você que é dono ou dirigente de empresa e que precisa melhorar sua performance junto a empresa e ao mercado de trabalho.</p>
      </div>
    </div>
  </div>
</div>
<div class="jumbotron jumbotron-fluid" id="empresa">
  <h1 class="text-center">Para sua empresa</h1><br>
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-6">
        <h3 class="text-center">Diagnostico financeiro</h3>
        <p class="lead">Orientação para realização de um diagnostico financeiro e economico de sua empresa, com objetivo de verificar como estão as performances até o momento e quais ações de melhoria são necessárias para que a empresa alcance suas metas e objetivos.</p>

        <h3 class="text-center">Apoio a tomada de decisão</h3>
        <p class="lead">Orientação para que o gestor tome as decisões necessárias para a retomada de crescimento buscada pela empresa ou incremento de resultados por novos projetos.</p>

        <h3 class="text-center">Gerenciamento financeiro</h3>
        <p class="lead">Orientação para realizar um bom gerenciamento financeiro na empresa, buscando melhorar as performances nessa área tão importante para o sucesso empresarial.</p>
      </div>
      <div class="col-12 col-sm-6">

        <h3 class="text-center">Análise economica</h3>
        <p class="lead">Orientação para verificar os atuais projetos da empresa e estudar a inclusão de novos.</p>

        <h3 class="text-center">Treinamentos diversos</h3>
        <p class="lead">Orientação para a realização de treinamentos em todas as áreas empresariais, como por exemplo comercial, financeira, qualidade e produção.</p>

        <h3 class="text-center">Análise de processos</h3>
        <p class="lead">Orientação para a melhoria contínua de processos sejam industriais, comerciais ou de serviços.</p>
      </div>
    </div>
  </div>
</div>
<div class="prlx" id="contato">
  <div class="container">
  <h1 class="text-center display-4">Contato</h1>
      <form>
        <div class="form-row">
          <div class="col-12 col-sm-6">
            <label for="inputEmail4" class="col-form-label">Nome Completo:</label>
            <input type="text" class="form-control texto" placeholder="Nome Completo">
            <label for="inputEmail4" class="col-form-label">E-mail:</label>
            <input type="text" class="form-control texto" placeholder="E-mail">
            <label for="inputEmail4" class="col-form-label">Assunto:</label>
            <input type="text" class="form-control texto" placeholder="Assunto">
          </div>
          <div class="col-12 col-sm-6">
            <label for="exampleFormControlTextarea1">Descrição:</label>
            <textarea class="form-control texto" id="exampleFormControlTextarea1" rows="5"></textarea><br>
            <button type="submit" class="btn btn-warning btn-block btn-sub">Enviar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
    <div class="amarelo">

    </div>
    <div class="footer">
     <div class="container">
      <div class="row">
       <div class="col-12 col-sm-3">
        <img src="img/logoglauber.png" class="mx-auto d-block" width="150">
        <h5 class="text-center">Prof. Glauber Gonçalves</h5>
      </div>
      <div class="col-12 col-sm-3 text-center">
        <br>
        <h5 class="">Serviços</h5>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="index.php#voce">Para você</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#empresa">Para sua empresa</a>
          </li>
        </ul>
        <br><br>
      </div>
      <div class="col-12 col-sm-3 text-center">
        <h5 class="">Mídias sociais</h5>
        <a href="https://www.facebook.com/glauber.r.goncalves"><img src="img/fb.png" width="35">
        Glauber Rogerio Barbieri Gonçalves</a><br><br>
        <a href="https://www.instagram.com/glauber_prof"><img src="img/inst.png" width="35">
        @glauber_prof</a><br><br>
        <a href="https://api.whatsapp.com/send?phone=5551993296514"><img src="img/whats.png" width="35">
        51 99329-6514</a><br><br><br>
      </div>
      <div class="col-12 col-sm-3 text-center">
        <span>Desenvolvido por</span><br>
        <img src="http://radardosimoveis.com.br/infinitydev/img/logo-InfinityDev.png" width="120">
      </div>
    </div>
  </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script>
    $('.prlx').each(function() {
        var $obj = $(this);
        $obj.css('background-position', '30% 0');
        $obj.css('background-attachment', 'fixed');
        if ($(window).width() > 940) {
            $obj.css('background-size', '100%');
            $(window).scroll(function() {
                var offset = $obj.offset();
                var yPos = -($(window).scrollTop() - offset.top) / 8;
                var bgpos = '50% ' + yPos + 'px';
                $obj.css('background-position', bgpos);
            });
        }
    });
  </script>
</body>
</html>
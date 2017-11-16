<nav class="navbar navbar-expand-lg navbar-dark bg-dark"  id="tope">
  <a class="navbar-brand" href="#"><img src="https://profglauber.com.br/img/logoglauber.png" width="50" height="50">Prof. Glauber</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="https://profglauber.com.br/index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://profglauber.com.br/canto-do-conto.php">Canto do Conto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://profglauber.com.br/area-aluno.php">Área do aluno</a>
      </li>
      <?php
         if(logado()){
            echo '<li class="nav-item">
                  <a class="nav-link text-right" href="https://profglauber.com.br/perfil.php">Seu perfil, '.$_SESSION['nomeUser'].'</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-right" href="https://profglauber.com.br/login/sair.php">Sair</a>
                </li>
                ';
          }else{
            echo '<li class="nav-item">
                <a class="nav-link text-right" href="https://profglauber.com.br/login.php">Login</a>
            </li>';
          }
      ?>
    </ul>
  </div>
</nav>

  <div class="navbar-laranja">
      <nav class="navbar navbar-default navbar-fixed-top bg-faded" style="background-color: #282828; color:#ffffff;">
        <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-navegacao" >
                <span class="icon-bar" style="background-color: #fff"></span>
                <span class="icon-bar" style="background-color: #fff"></span>
                <span class="icon-bar" style="background-color: #fff"></span>
              </button>
              <a class="navbar-brand le-le" href="../index.php">Radar dos Imóveis</a>
            </div>
            <div class="collapse navbar-collapse menu-navegacao" id="menu-navegacao">
              <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="../imoveis/index.php" class="under1" style="color:#fff">Imóveis</a>
                </li>
                <li>
                  <a href="../mensagem/index.php" class="under1"  style="color:#fff">Mensagens</a>
                </li>
                <li class="dropdown-cli">
                  <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <span class="dropdown-cli" style="color:#fff">Usuário<span>
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="../usuario/index.php" style="color:#ee6e06">Usuários</a></li>
                      <li><a href="../captador/index.php" style="color:#ee6e06">Captadores</a></li>
                    </ul>
                  </div>
                </li>
                <li class="dropdown-cli">
                  <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <span class="dropdown-cli" style="color:#fff">Cliente<span>
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="../clientecomprador/index.php" style="color:#ee6e06">Cliente Comprador</a></li>
                      <li><a href="../clientevendedor/index.php" style="color:#ee6e06">Cliente Vendedor</a></li>
                    </ul>
                  </div>
                </li>
                <li>
                  <a class="le-le" style="color:#fff"><?php echo $logado ?></a>
                </li>
                <li>
                  <a href="../logout.php" class="under1" style="color:#fff; font-size: 10pt;">Sair</a>
                </li>
              </ul>
            </div>
        </div>
      </nav>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </div>

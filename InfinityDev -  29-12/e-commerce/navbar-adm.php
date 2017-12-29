
  <nav>
    <div class="nav-wrapper red">
      <a href="https://infinitydev.com.br/e-commerce/" class="brand-logo"><img src="https://infinitydev.com.br/e-commerce/img/logo.png" class="responsive-img" width="150" alt=""></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a class='dropdown-button' href='#' data-activates='dropdown1'><i class="material-icons">apps</i></a></li>
        <li><a class='dropdown-button' href='#' data-activates='dropdown2'><strong><?php echo $_SESSION['nomeAdm']; ?><i class="material-icons right">arrow_drop_down</i></strong></a></li>
        <ul id='dropdown1' class='dropdown-content'>
          <li><a class="grey-text text-darken-4" href="https://infinitydev.com.br/e-commerce/"><i class="material-icons">home</i>Home</a></li>
          <li class="divider"></li>
          <li><a class="grey-text text-darken-4" href="https://infinitydev.com.br/e-commerce/usuario/"><i class="material-icons">face</i>Usuários</a></li>
          <li><a class="grey-text text-darken-4" href="https://infinitydev.com.br/e-commerce/adm/"><i class="material-icons">account_circle</i>Adm</a></li>
          <li><a class="grey-text text-darken-4" href="https://infinitydev.com.br/e-commerce/produto/"><i class="material-icons">local_offer</i>Produtos</a></li>
          <li><a class="grey-text text-darken-4" href="https://infinitydev.com.br/e-commerce/pedido/"><i class="material-icons">shopping_basket</i>Pedidos</a></li>
          <li><a class="grey-text text-darken-4" href="https://infinitydev.com.br/e-commerce/desconto/"><i class="material-icons">attach_money</i>Descontos</a></li>
        </ul>
        <ul id='dropdown2' class='dropdown-content'>
          <li>
            <span class="title center red-text"><?php echo $_SESSION['nomeAdm']; ?></span>
            <span class="center red-text darken-4"><strong><?php echo $_SESSION['emailAdm']; ?></strong></span>
          </li>
          <li><a class="grey-text text-darken-4" href="https://infinitydev.com.br/e-commerce/area-adm.php"><i class="material-icons">all_inclusive</i>Área do Administrador</a></li>
          <li class="divider"></li>
          <li><a class="grey-text text-darken-4" href="https://infinitydev.com.br/e-commerce/login/deslogar.php"><i class="material-icons">arrow_forward</i>Sair</a></li>
        </ul>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><p class="title center-align red-text"><?php echo $_SESSION['nomeAdm']; ?></p></li>
        <li><p class="center-align red-text darken-4"><strong><?php echo $_SESSION['emailAdm']; ?></strong></p></li>
        <li><a href="https://radardosimoveis.com.br/e-commerce/">Home</a></li>
        <li class=''><a href="https://radardosimoveis.com.br/e-commerce/produto/">Produtos</a></li>
        <li><a href="https://infinitydev.com.br/e-commerce/usuario/">Usuarios</a></li>
        <li><a href="https://infinitydev.com.br/e-commerce/adm/">Administradores</a></li>
        <li><a href="https://infinitydev.com.br/e-commerce/pedido/">Pedidos</a></li>
        <li><a href="https://infinitydev.com.br/e-commerce/login/deslogar.php">Sair</a></li>
      </ul>
    </div>
  </nav>
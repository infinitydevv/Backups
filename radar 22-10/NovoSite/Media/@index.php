
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" dir="ltr" lang="en-US"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" dir="ltr" lang="en-US"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" dir="ltr" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html dir="ltr" lang="en-US">
<!--<![endif]-->
	<head>
		<title>Radar do Imóveis</title> 
		<link href='/favicon.ico' rel='shortcut icon' type='image/x-icon'> 
		<link href='/favicon.ico' rel='icon' type='image/x-icon'> 
		<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /> 
		<meta http-equiv='expires' content='Sat, 20 Aug 2016 03:17:20' /> 
		<meta name='robots' content='none' /> 
		<meta name='content-language' content='pt-br' /> 
		<meta name='cache-control' content='no-cache' /> 
		<meta name='rating' content='general' /> 
		<meta charset='UTF-8' /> 
		<meta name='viewport' content='width=device-width, initial-scale=1.0' /> 
		<link type='text/css' media='screen' rel='stylesheet' href='./Media/bootstrap/css/bootstrap.css' /> 
		<link type='text/css' media='screen' rel='stylesheet' href='./Media/bootstrap/css/bootstrap-responsive.css' /> 
		<link type='text/css' media='screen' rel='stylesheet' href='./Media/icons/css/style.icons.css' /> 
		<link type='text/css' media='screen' rel='stylesheet' href='./Media/icons/css/animation.css' /> 
		<link type='text/css' media='screen' rel='stylesheet' href='./Media/css/style.global.css' /> 
		<link type='text/css' media='screen' rel='stylesheet' href='./Media/css/mq.css' /> 
		<script type='text/javascript' src='./Media/js/JQuery/jquery-1.12.0.min.js'></script> 
		<script type='text/javascript' src='./Media/bootstrap/js/bootstrap-popover-sem-tooltip.js'></script> 
		<script type='text/javascript' src='./Media/bootstrap/js/widgets.js'></script> 
		<script type='text/javascript' src='./Media/bootstrap/js/jquery.js'></script> 
		<script type='text/javascript' src='./Media/bootstrap/js/bootstrap-transition.js'></script> 
		<script type='text/javascript' src='./Media/bootstrap/js/bootstrap-alert.js'></script> 
		<script type='text/javascript' src='./Media/bootstrap/js/bootstrap-modal.js'></script> 
		<script type='text/javascript' src='./Media/bootstrap/js/bootstrap-dropdown.js'></script> 
		<script type='text/javascript' src='./Media/bootstrap/js/bootstrap-scrollspy.js'></script> 
		<script type='text/javascript' src='./Media/bootstrap/js/bootstrap-tab.js'></script> 
		<script type='text/javascript' src='./Media/bootstrap/js/bootstrap-tooltip.js'></script> 
		<script type='text/javascript' src='./Media/bootstrap/js/bootstrap-button.js'></script> 
		<script type='text/javascript' src='./Media/bootstrap/js/bootstrap-collapse.js'></script> 
		<script type='text/javascript' src='./Media/bootstrap/js/bootstrap-carousel.js'></script> 
		<script type='text/javascript' src='./Media/bootstrap/js/bootstrap-typeahead.js'></script> 
		<script type='text/javascript' src='./Media/bootstrap/js/bootstrap-affix.js'></script> 
		<script type='text/javascript' src='./Media/bootstrap/js/holder/holder.js'></script> 
		<script type='text/javascript' src='./Media/bootstrap/js/google-code-prettify/prettify.js'></script> 
		<script type='text/javascript' src='./Media/js/script.global.js'></script> 
	</head> 
    <body>
		<div id="bg-mask"></div>
		<div class="row-fluid">
			<div class="menu-topo">
				<div id="menu-show-1" class="grid-90 margin-auto">
					<div class="navbar" id="nav-top">
						<div class="navbar-inner">
							<div class="container">
								<div class="nav-collapse collapse navbar-responsive-collapse">
									<div class="nav-menu">
										<a class="brand" href="/">Radar dos Imóveis</a>
										<ul class="nav pull-right">
											<li class="active"><a href="#" class="list-items-nav">Inicio</a></li>
											<li><a href="#" class="list-items-nav" for="box-ache-facil">Sobre</a></li>
											<li><a href="#" class="list-items-nav" for="box-ache-facil">Serviços</a></li>
											<li><a href="#" class="list-items-nav" for="box-ache-facil">Adminstrativo</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="page container-fluid">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<div class="form-type-service container">
						<div class="content">
							<div class="logo">	
								<img class="logo-1 giragira" src="./Media/img/logo-1.png">
								<img class="logo-2" src="./Media/img/logo-2.png">
							</div>
							<div class="forms">
							  	<!-- Nav tabs -->
								  <ul class="nav nav-tabs" role="tablist">
									    <li role="presentation" class="active">
									    	<a href="#quer-comprar" aria-controls="quer-comprar" role="tab" data-toggle="tab">Quer comprar?</a>
									    </li>
									    <li role="presentation">
									    	<a href="#quer-vender" aria-controls="quer-vender" role="tab" data-toggle="tab">Quer vender?</a>
									    </li>
								  </ul>

							  	<!-- Tab panes -->
							  	<div class="tab-content">
								    <div role="tabpanel" class="tab-pane active quer-comprar" id="quer-comprar">
										<form>
											<div class="form-group">
												<label for="cidade">Cidade</label>
												<select name="cidade" class="form-control">
													<option value="" selected="false">Selecione</option>
													<option value="Sapucaia do sul">Sapucaia do sul</option>
													<option value="Esteio">Esteio</option>
													<option value="Gravatai">Gravatai</option>         
												</select>
											</div>
											<div class="form-group">
												<label for="bairro">Bairro</label>
												<select name="bairro" class="form-control" id="cidade">
												    <option value="" selected="false">Selecione</option>
												    <option value="Centro">Centro</option>
												    <option value="Vargas">Vargas</option>
												    <option value="Sao Geraldo">Sao Geraldo</option>    
												</select>
											</div>
											<div class="form-group">
												<label for="imovel">Imóvel</label>
												<select name="tipo" class="form-control" id="tipo">
													<option value="" selected="false">Selecione</option>
													<option value="Apartamento">Apartamento</option>
													<option value="casa">casa</option>
													<option value="Terreno">Terreno</option>
												</select>
											</div>
											<div class="form-group">
												<label for="valor">Valor</label>
												<select name="valores" class="form-control" id="valores">
													<option value="" selected="false">Selecione</option>";
													<option value="<50000.00">Abaixo de 50 mil</option>";
													<option value="50000.00 and 100000.00">entre 50 mil e 100 mil </option>";
													<option value="101000.00 and 200000.00">entre 101 mil e 200 mil </option>";
													<option value="201000.00 and 400000.00">entre 201 mil e 400 mil </option>";
													<option value=">400000.00">Acima de 400 mil </option>          
												</select>
											</div>
											<div class="form-group-submit">
													<button type="submit" class="btn btn-default">Pesquisar</button>
											</div>	
										</form>
								    </div>
								    <div role="tabpanel" class="tab-pane quer-vender" id="quer-vender">
											<form>
												<div class="form-group">
													<label for="cidade">Cidade</label>
													<select name="corr" class="form-control" id="corr">
														<option value="" selected="false">Selecione</option>
														<option value="1">Sao Leopoldo</option>
														<option value="2">Sapucaia do Sul</option>
														<option value="3">Esteio</option>
													</select>
												</div>
												<div class="form-group-submit">
														<button type="submit" class="btn btn-default">Pesquisar</button>
												</div>	
											</form>
								    </div>
							    </div>
							</div>
						</div>
					</div>

					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<div class="img-1 img"></div>
							<div class="carousel-caption">
								caption 1
							</div>
						</div>
						<div class="item">
							<div class="img-2 img"></div>
							<div class="carousel-caption">
								caption 2
							</div>
						</div>
						<div class="item">
							<div class="img-3 img"></div>
							<div class="carousel-caption">
								caption 3
							</div>
						</div>
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>

				<div id="main" class="container main-content">
					<div class="row-fluid">
						<h1>Em destaque</h1>
						<div class="list-imoveis">
							<div class="box-imoveis">
								<h2>Belém Novo - Posto Alegre</h2>
								<div class="photo"><img src="./Media/img/imoveis/01.jpg"></div>
								<div class="descript">Casa 120m - 4 quartos- Garagens para 2 carros - 3 banheiros</div>
							</div>
							<div class="box-imoveis">
								<h2>Belém Novo - Posto Alegre</h2>
								<div class="photo"><img src="./Media/img/imoveis/01.jpg"></div>
								<div class="descript">Casa 120m - 4 quartos- Garagens para 2 carros - 3 banheiros</div>
							</div>
							<div class="box-imoveis">
								<h2>Belém Novo - Posto Alegre</h2>
								<div class="photo"><img src="./Media/img/imoveis/01.jpg"></div>
								<div class="descript">Casa 120m - 4 quartos- Garagens para 2 carros - 3 banheiros</div>
							</div>
							<div class="box-imoveis">
								<h2>Belém Novo - Posto Alegre</h2>
								<div class="photo"><img src="./Media/img/imoveis/01.jpg"></div>
								<div class="descript">Casa 120m - 4 quartos- Garagens para 2 carros - 3 banheiros</div>
							</div>
							<div class="box-imoveis">
								<h2>Belém Novo - Posto Alegre</h2>
								<div class="photo"><img src="./Media/img/imoveis/01.jpg"></div>
								<div class="descript">Casa 120m - 4 quartos- Garagens para 2 carros - 3 banheiros</div>
							</div>
							<div class="box-imoveis">
								<h2>Belém Novo - Posto Alegre</h2>
								<div class="photo"><img src="./Media/img/imoveis/01.jpg"></div>
								<div class="descript">Casa 120m - 4 quartos- Garagens para 2 carros - 3 banheiros</div>
							</div>
							<div class="box-imoveis">
								<h2>Belém Novo - Posto Alegre</h2>
								<div class="photo"><img src="./Media/img/imoveis/01.jpg"></div>
								<div class="descript">Casa 120m - 4 quartos- Garagens para 2 carros - 3 banheiros</div>
							</div>
							<div class="box-imoveis">
								<h2>Belém Novo - Posto Alegre</h2>
								<div class="photo"><img src="./Media/img/imoveis/01.jpg"></div>
								<div class="descript">Casa 120m - 4 quartos- Garagens para 2 carros - 3 banheiros</div>
							</div>
						</div>
						<div class="list-service">
							<h2>Serviços</h2>
							<div class="box-service">
								<h3>Representação</h3>
				                <p class="limit">
				                	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum posuerenisl 
				                    vitae erat elementum aliquam. Sed scelerisque vehicula felis, id placerat nunc 
				                    hendrerit sit. Ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum posuerenisl 
				                    vitae erat elementum aliquam. Sed scelerisque vehicula felis, id placerat nunc 
				                    hendrerit sit amet. Nullam eget ante era.  
				                </p>
				                <a href="#" class="more">Saiba mais</a>
							</div>
							<div class="box-service">
								<h3>Suporte</h3>
				                <p class="limit">
				                	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum posuerenisl 
				                    vitae erat elementum aliquam. Sed scelerisque vehicula felis, id placerat nunc 
				                    hendrerit sit. Ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum posuerenisl 
				                    vitae erat elementum aliquam. Sed scelerisque vehicula felis, id placerat nunc 
				                    hendrerit sit amet. Nullam eget ante era.  
				                </p>
				                <a href="#" class="more">Saiba mais</a>
							</div>
							<div class="box-service">
								<h3>Outros serviços</h3>
				                <p class="limit">
				                	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum posuerenisl 
				                    vitae erat elementum aliquam. Sed scelerisque vehicula felis, id placerat nunc 
				                    hendrerit sit. Ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum posuerenisl 
				                    vitae erat elementum aliquam. Sed scelerisque vehicula felis, id placerat nunc 
				                    hendrerit sit amet. Nullam eget ante era.  

				                </p>
				                <a href="#" class="more">Saiba mais</a>
							</div>
						</div>
					</div>
				</div>
				<div class="site-map">
					<div class="container">
						<div class="item-site-map">
							<h2>Radar dos Imóveis</h2>
							<ul>
								<li class="active"><a href="#" class="list-items-nav">Inicio</a></li>
								<li><a href="#" class="list-items-nav" for="box-ache-facil">Sobre</a></li>
								<li><a href="#" class="list-items-nav" for="box-ache-facil">Serviços</a></li>
								<li><a href="#" class="list-items-nav" for="box-ache-facil">Adminstrativo</a></li>
							</ul>
						</div>
						<div class="item-site-map">
							<h2>Radar dos Imóveis</h2>
							<ul>
								<li class="active"><a href="#" class="list-items-nav">Facebook</a></li>
								<li><a href="#" class="list-items-nav" for="box-ache-facil">Twitter</a></li>
								<li><a href="#" class="list-items-nav" for="box-ache-facil">Instagram</a></li>
							</ul>
						</div>
						<div class="item-site-map">
							<h2>Radar dos Imóveis</h2>
							<ul>
								<li class="active"><a href="#" class="list-items-nav">2° via de doc</a></li>
								<li><a href="#" class="list-items-nav" for="box-ache-facil">Cliente online</a></li>
								<li><a href="#" class="list-items-nav" for="box-ache-facil">Fichas e documentos</a></li>
								<li><a href="#" class="list-items-nav" for="box-ache-facil">Anúncie seu imóvel</a></li>
							</ul>
						</div>
						<div class="item-site-map">
							<ul>
								<li>
									<h2>Suporte e Contato</h2>
									<span>(51) 3024-9000</span>
								</li>
								<li>
									<h2>Endereço</h2>
									<span>Av. Cristavão Colombo, 2452</span><br>
									<span>Floresta - Porto Alegre - RS</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="footer">
					<div class="container">
						<span>Radar dos Imóveis - 2016 - Todos os direitos reservados</span>
					</div>
				</div>
			</div>
		</div>
	</body> 
</html>

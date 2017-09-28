<?php
$msg = 0;
@$msg = $_REQUEST['msg'];
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SOLUTION - Diagnóstico Empresarial</title>
    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
      
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      
  </head>
  <body data-spy="scroll" data-target=".menu-navegacao" data-offset="80">
      <!-- Menu da aplicação -->
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-navegacao" >
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>                
                <a class="navbar-brand" href="index.php">SOLUTION
                </a>
            </div>  
            
            <div class="collapse navbar-collapse menu-navegacao" id="menu-navegacao">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#page-top"></a></li>
                    <li>
                        <a class="" href="#servicos">Serviços</a>
                    </li>
                    <li>
                        <a class="" href="#portfolio">Portfolio</a>
                    </li>
                    <li>
                        <a class="" href="#quemsomos">Quem Somos</a>
                    </li>
                    <li>
                        <a class="" href="#localizacao">Localização</a>
                    </li>
                    <li>
                        <a class="" href="#contato">Contato</a>
                    </li>
                </ul>
            </div>
        </div>
      </nav>
      <!-- // Menu da aplicação -->
      
      <!-- slider da aplicação -->
      <div class="divslider">
        <div class="container">
            <div class="col-xs-12">
                <div id="sliderprincipal" class="carousel slide" data-ride="carousel">
                    
                    <ol class="carousel-indicators">
                        <li data-target="#sliderprincipal" data-slide-to="0" class="active"></li>
                        <li data-target="#sliderprincipal" data-slide-to="1"></li>
                        <li data-target="#sliderprincipal" data-slide-to="2"></li>
                    </ol>
                    
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="imgs/slider/slider111.png" alt="Imagem slider 1">
                        </div>
                        <div class="item">
                            <img src="imgs/slider/slider21.png" alt="Imagem slider 2">
                        </div>
                        <div class="item">
                            <img src="imgs/slider/slider31.png" alt="Imagem slider 3">
                        </div>
                    </div>  
                    
                    <a class="left carousel-control" href="#sliderprincipal" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    
                    <a class="right carousel-control" href="#sliderprincipal" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Próximo</span>
                    </a>
                    
                </div>
            </div>
        </div>
      </div>      
      <!-- // slider da aplicação -->
      
      <!-- serviços -->
      <section id="servicos">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-header"><h1>PESSOA JURÍDICA <small> - Serviços </small></h1></div>
                </div>                 
            </div> 
			<!-- primeira linha --> 
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 servicos_item">
                    <div><img src="imgs/ps.png" class="img-responsive grayscale grayscale center-block" /></div>
                    <h4>Planejamento Estratégico</h4>
                    <p>Ato de pensar e fazer planos de uma maneira estratégica. 
					É uma área do planejamento empresarial, que facilita a gestão de uma empresa.</p>

                     <h1>Benefícios:</h1>
						<ul>	
						    <li>Maior flexibilidade;</li> 
						    <li>Agilidade nas tomadas de decisões;  </li>
						    <li>Melhor comunicação entre os funcionários; </li>
							<li>Maior capacitação gerencial; </li>
							<li>Maior motivação e comprometimento dos envolvidos; </li>
							<li>Consciência coletiva e  visão sistêmica;</li>
							<li>Melhor relacionamento entre empresa-ambiente;</li> 
                        </ul>

					<p>Esse produto tem por objetivo auxiliar a empresa a desenvolver, e por em prática, sua visão de futuro.
					</p>
                </div>
                
                <div class="col-xs-12 col-sm-4 col-md-4 servicos_item">
                    <div><img src="imgs/mugo.png" class="img-responsive grayscale grayscale center-block" /></div>
                    <h4>Diagnóstico Empresarial</h4>
                    <p>Levantamento de dados para ações corretivas ou melhorias para a organização. 
					Esse diagnóstico é realizado por intermédio da metodologia MUGO.</p>
					<h1>Benefícios:</h1>
					<ul>
						<li>Mapeamento dos processos organizacionais;</li>
						<li>Verificação e propostas de soluções alternativas;</li>
						<li>Criação de Indicadores qualitativos e quantitativos;</li>
						<li>Realização de ações de melhoria;</li>
					</ul>
					<p> Este produto tem  por objetivo desenvolver a empresa do estado atual para o desejado.</p>

					

                </div>
                
                <div class="col-xs-12 col-sm-4 col-md-4 servicos_item">
                    <div><img src="imgs/mo.png" class="img-responsive grayscale grayscale center-block" /></div>
                    <h4>Assessoria Econômico Financeira</h4>
                    <p>Análise Econômico Financeira realizada por profissionais especializados a pessoas jurídicas
					com a finalidade de ajudá-las a tomar decisões de cunho financeiro.</p>
						<h1>Benefícios:</h1>
					
					<ul>
						<li>Planejamento Financeiro;</li>
						<li>Ajustes Econômicos;</li>
						<li>Análise de Investimentos;</li>
						<li>Recuperação Financeira;</li>
					</ul>
					<p> Esse produto tem por objetivo  analisar a estrutura e processos do seu negócio, com objetividade, 
					para encontrar as melhores, mais rentáveis e eficientes soluções de mercado.</p>

                </div>
                
				
            </div>
			 <div class="row">
                <div class="col-xs-12">
                    <div class="page-header"><h1>PESSOA JURÍDICA <small> - Mais serviços </small></h1></div>
                </div>                 
            </div> 
			
			<!-- SEGUNDA LINHA PJ -->
			 <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 servicos_item">
                    <div><img src="imgs/cinco.png" class="img-responsive grayscale  center-block" /></div>
                    <h4> Programa 5’S </h4>
                    <p>O papel do 5S é cuidar da base, facilitando o aprendizado e prática de 
					conceitos e ferramentas para a qualidade. Isso inclui cuidar dos ambiente, 
					equipamentos, materiais, métodos, medidas, e, especialmente, pessoas. </p>

                     <h1>Benefícios:</h1>
						<ul>	
						    <li>Melhoria do ambiente de trabalho;</li>
							<li>Prevenção de acidentes;</li>
							<li>Incentivo à criatividade;</li>
							<li>Redução de custos;</li>
							<li>Eliminação de desperdício;</li>
							<li>Desenvolvimento do trabalho em equipe;</li>
							<li>Melhoria das relações humanas;</li>
							<li>Melhoria da qualidade de produtos e serviços;</li> 
                        </ul>

					<p>Esse produto tem por objetivo conscientização da importância da qualidade
					no ambiente de trabalho com foco em aumentar a produtividade impactando nos resultados.</p>
					
                </div>
                
                <div class="col-xs-12 col-sm-4 col-md-4 servicos_item">
                    <div><img src="imgs/ppr.png" class="img-responsive grayscale grayscale center-block" /></div>
                    <h4>Programa de Participação nos Resultados (PPR)</h4>
                    <p>É uma forma de remuneração variável, utilizada mundialmente pelas empresas para cumprimento
					das estratégias das organizações.</p>
					<h1>Benefícios:</h1>
					<ul>
						<li>Motivação dos funcionários;</li>
			            <li>Não incidência de encargos trabalhistas;</li>
						<li>Maior integração entre o binômio capital-trabalho;</li>
					</ul>
					<p> Este produto tem como objetivo a implementação e validação do Programa de Participação 
					nos Resultados de acordo com a Lei  Federal nr. 10.101/2000. focando na satisfação colaboradores 
					e buscando com isso o aumento da produtividade. </p>		

                </div>
                
                <div class="col-xs-12 col-sm-4 col-md-4 servicos_item">
                    <div><img src="imgs/treino
					.png" class="img-responsive grayscale grayscale center-block" /></div>
                    <h4>Treinamentos</h4>
                    <p>O treinamento envolve a transmissão de informações específicos relativos 
					   ao trabalho, atitudes frente a aspectos da organização, da tarefa e do ambiente,
					   e desenvolvimento de habilidades. Qualquer tarefa seja complexa ou simples envolve 
					   necessariamente estes três aspectos. </p>
						<h1>Benefícios:</h1>
					<ul>
						<li>Transmissão de informações;</li>
						<li>Desenvolvimento de habilidades;</li>
						<li>Desenvolvimento ou modificação de atitudes;</li>
						<li>Desenvolvimento de conceitos;</li>
					</ul>
					<p> Esse produto tem por objetivo preparar o pessoal para execução imediata das diversas 
						tarefas do cargo, proporcionando oportunidades para o continuo desenvolvimento pessoal, 
						não apenas em seus cargos atuais, mas também para outras funções para as quais a pessoa 
						pode ser considerada. Mudando a atitude das pessoas, seja para criar um clima mais 
						satisfatório entre empregados, aumentar-lhes a motivação e torná-las mais receptivas às 
						técnicas de supervisão e gerencia. </p>

                </div>
                
				
            </div>
			
			<!-- FIM DA SEGUNDA LINHA PJ -->
			
			
			
			<!-- fim da primeira linha -->
			
			<div class="row">
                <div class="col-xs-12">
                    <div class="page-header"><h1>PESSOA FISICA <small> - Serviços </small></h1></div>
                </div>                 
            </div> 
			<!-- segunda linha -->
			<div class="row">
                
                <div class="col-xs-12 col-sm-4 col-md-4 servicos_item">
                    <div><img src="imgs/acessoria.png" class="img-responsive grayscale grayscale center-block" /></div>
                    <h4>Assessoria Econômico Financeira</h4>
                    <p>Análise Econômico Financeira realizada por profissionais especializados a pessoas físicas com 
					a finalidade de ajudá-las a tomar decisões de cunho financeiro.</p>

                     <h1>Benefícios:</h1>
						<ul>	
						    <li>Planejamento Financeiro;</li> 
						    <li>Análise de Investimentos;</li>
						    <li>Recuperação Financeira; </li>
							<li>Maior capacitação gerencial; </li>
							<li>Tornar sonhos em realidade; </li>
						</ul>	
					<p>Esse produto tem por objetivo  analisar a sua vida financeira, com objetividade, para 
					encontrar as melhores, mais rentáveis e eficientes soluções  para o seu futuro.</p>
                </div>
                
                <div class="col-xs-12 col-sm-4 col-md-4 servicos_item">
                    <div><img src="imgs/evento.png" class="img-responsive grayscale grayscale center-block" /></div>
                    <h4>Realização Eventos</h4>
                    <p>Evento é um acontecimento que pode ser social, artístico, desportivo ou profissional.</p>
					<h1>Benefícios:</h1>
					<ul>
						<li>A economia de tempo;</li>
						<li>A segurança de saber que tudo que é necessário no evento está sendo organizado;</li>
						<li>Contar com o apoio de uma empresa especializada para auxiliar e aconselhar nas mais diversas escolhas;</li>
						<li>Ter a segurança de ter feito a melhor negociação;</li>
						<li>Ter o melhor custo x benefício dos materiais comprados ou locados;</li>
					</ul>
					<p> O objetivo deste produto é garantir a organização de um evento inesquecível, de 
					acordo com seus planos e sonhos. Para isso assessoramos o antes, o durante e o depois do 
					seu evento social.</p>

					

                </div>
                
                <div class="col-xs-12 col-sm-4 col-md-4 servicos_item">
                    <div><img src="imgs/agenda.png" class="img-responsive grayscale grayscale center-block" /></div>
                    <h4>Agenda</h4>
                    <p>Mecanismo que permite o registro de compromissos em geral para o 
					acompanhamento e efetiva participação nos mesmos.</p>
						<h1>Benefícios:</h1>
					
					<ul>
						<li>Otimização do tempo;</li>
						<li>Registro e realização de compromissos;</li>
					</ul>
					<p> Este produto tem por objetivo  auxiliar no correto agendamento dos compromissos, 
					sejam eles profissionais ou pessoais, garantindo assim um melhor aproveitamento do tempo.</p>

                </div>
                
				
            </div>
			
			<!-- fim da segunda linha -->
            
           
        </div>
      </section>
      <!-- // serviços -->
      
      <!-- portfolio -->
      <section id="portfolio" class="div_colorida">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-header"><h1>Portfolio <small>Conheça nossos Clientes</small></h1></div>
                </div>                
            </div>
            <div class="row portfolio_row">
                <div class="col-sm-4">
                    <div class="portfolio_item">
                        <div><img src="imgs/sanizidoro.png" class="img-responsive grayscale grayscale"/></div>
                        <h4>SANIZIDORO</h4>
                    </div>
                </div>
				<div class="col-sm-4">
                    <div class="portfolio_item">
                        <div><img src="imgs/victoria.png" class="img-responsive grayscale"/></div>
                        <h4>VICTÓRIA HAIR</h4>
                    </div>
                </div>               

			   <div class="col-sm-4">
                    <div class="portfolio_item">
                        <div><img src="imgs/sulfer.png" class="img-responsive grayscale"/></div>
                        <h4>SULFER COM. DE FERROS</h4>
                    </div>
                </div>
               
            </div>
            <div class="row portfolio_row">
                <div class="col-sm-4">
                    <div class="portfolio_item">
                        <div><img src="imgs/bemfortis.png" class="img-responsive"/></div>
                        <h4>BEMFORTIS UNIFORMES</h4>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="portfolio_item">
                        <div><img src="imgs/centropolo.png" class="img-responsive"/></div>
                        <h4>CENTRO PÓLO</h4>
                    </div>
                </div>
				<!--
                <div class="col-sm-4">
                    <div class="portfolio_item">
                        <div><img src="imgs/foto2.jpg" class="img-responsive"/></div>
                        <h4>Nome do cliente</h4>
                    </div>
                </div>
            </div> 
            
            <div class="row">
                <div class="col-xs-12 text-center">
                    <a href="portfolio.html" class="btn btn-default btn-lg">Clique aqui para conhecer <br>todos os nossos clientes</a>
                </div>
            </div>
        </div>-->
      </section>
      <!-- // portfolio -->
      
      <!-- quem somos -->
      <section id="quemsomos">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-header"><h1>Quem Somos <small>Conheça nossa história</small></h1></div>
                </div> 
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="col-sm-8 text-right">
                        <h4>A Solution</h4>
                        <p>Uma empresa especializada em prover soluções que buscam maximizar os resultados dos seus clientes.

                           A necessidade por respostas rápidas aos novos desafios, motivaram a criação da Solution, hoje a 
						   empresa conta com a expertisse de vários profissionais preparados para auxiliarem seus clientes 
						   a obterem resultados eficazes.</p>

                         <p>A Solution surgiu da vasta experiência em análises quantitativas e qualitativas executada por 
						    um de seus consultores, O Sr. Glauber Gonçalves especialista em diagnóstico Empresarial, 
							Economista e Mestre em Gestão Empresarial pela Universidade de Lisboa (Portugal).</p>
                        
                    </div>
                    <div class="col-sm-4">
                        <img src="imgs/foto.jpg" class="img-responsive img-circle center-block"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-sm-4">
                        <img src="imgs/foto2.jpg" class="img-responsive img-circle center-block" />
                    </div>
                    <div class="col-sm-8">
                        <h4>Missão da empresa</h4>
                        <p>Ser o elo entre pessoas e resultados.</p>
						<h4>VISÃO</h4>
                        <p>Prover soluções eficazes para empresas e empresários da região metropolitana de Porto Alegre.</p>
						<h4>Valores</h4>
						<ul>
						<li>Qualidade;</li>
						<li>Credibilidade;</li>
						<li>Cliente satisfeito;</li>
						<li>Comprometimento;</li>
						<li>Simplicidade e agilidade;</li>
						<li>Ética e confidencialidade;</li>
						<li>Excelência em resultados.</li>
						
					</ul>
						
                    </div>
                </div>
            </div>
            
            
            
          
           
        </div>
      </section>
      <!-- // quem somos -->
      
      <!-- localização -->
      <section id="localizacao" class="div_colorida">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-header"><h1>Localização <small>Veja onde estamos</small></h1></div>
                </div>  
            </div>
            
            <div class="row">
                <div class="col-xs-12">
                   <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d13846.084279409986!2d-51.1423987!3d-29.8203778!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1439588246537" class="iframe-map center-block" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
      </section>      
      <!-- // localização -->
      
      <!-- contato -->
      <section id="contato">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
				
                    <div class="page-header"><h1>Contato <small>Fale conosco agora mesmo!</small></h1></div>
                </div>
            </div>
            
            <div class="row contato">
                <div class="col-xs-12">
                    <p class="bg-success aviso">Preencha o formulário abaixo para entrar em contato conosco!</p>
                </div>
            </div>
            
            <div class="row contato">
                <div class="col-xs-12">
                    
                    <form name="frmContato" id="formContato" method="POST" action="ProcessaForm.php" >
                        <div class="row">
                            <div class="col-md-6">
                               
                                <div class="form-group">
                                    <input type="text"  name = "nome" class="form-control input-lg" placeholder="Qual seu nome? *" required value="<?echo $nome ;?>" />
                                </div>
                                
                                <div class="form-group">
                                    <input type="email" name = "email" class="form-control input-lg" placeholder="Qual seu e-mail? *" required value="<?echo $email ;?>" />
                                </div>
                                
                                <div class="form-group">
                                    <input type="tel" name="telefone" class="form-control input-lg" placeholder="Seu telefone?" value="<?echo $assunto_user;?>" />
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control input-lg" name="textodamensagem" placeholder="Sua mensagem! *" required <?echo $mensagem;?>></textarea>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="alert alert-success">
								<?php if($msg==enviado): ?>
									<h1> Mensagem enviada, agradecemos seu contato!</h1>
								
								<?php endif;//else: ?>
								</div>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" name="enviar" class="btn btn-success btn-lg">Enviar Formulário</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
      </section>      
      <!-- // contato -->
      
      <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10">
                    <strong>Telefone:(51)3450-3659<br/>Celular/WhatsApp:(51)9329-6514
					<br/>E-mail:contato@solutionadvice.com.br</strong>
                </div>
                <div class="col-xs-12 col-sm-2 text-right">
                    <small>Desenvolvido por:</small><br/>
                    <strong>Jeferson Leon - 2015</strong>
                </div>
            </div>  
        </div>
      </footer>
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
  </body>
</html>
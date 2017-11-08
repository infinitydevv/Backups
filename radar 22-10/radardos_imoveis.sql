-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 20/10/2017 às 14:26
-- Versão do servidor: 5.6.37
-- Versão do PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `radardos_imoveis`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `captador`
--

CREATE TABLE `captador` (
  `idcap` int(11) NOT NULL,
  `nomecap` varchar(150) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `fonecel` bigint(15) DEFAULT NULL,
  `foneres` int(15) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `captador`
--

INSERT INTO `captador` (`idcap`, `nomecap`, `email`, `fonecel`, `foneres`, `status`, `cidade`, `foto`) VALUES
(2, 'Pedro Henrique Comassetto', 'pedrocomassetto@gmail.com', 51995728930, 0, 0, 'Esteio', '15092017_PP.jpg'),
(3, 'Dalmo Souza', 'dalmo@radardosimoveis.com.br', 51995513505, 2147483647, 0, 'Esteio', '27102016_dalmo.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidade`
--

CREATE TABLE `cidade` (
  `idcidade` int(11) NOT NULL,
  `cidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientecomprador`
--

CREATE TABLE `clientecomprador` (
  `idclicom` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL,
  `celular` varchar(14) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `status` varchar(8) NOT NULL,
  `obs1` text NOT NULL,
  `obs2` text NOT NULL,
  `obs3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `clientecomprador`
--

INSERT INTO `clientecomprador` (`idclicom`, `nome`, `cpf`, `email`, `celular`, `telefone`, `logradouro`, `numero`, `cep`, `cidade`, `bairro`, `status`, `obs1`, `obs2`, `obs3`) VALUES
(3, 'Rodrigo Souza', '031.450.730-28', 'rodrigoejenifer@hotmail.com', '51985071206', '', 'Rua Almirante Tamandaré', 67, '93218-030', 'Sapucaia do Sul', 'São José', 'Ativo', 'Casa 2 dormitórios, acessível.', 'Preferencialmente em Sapucaia do Sul', 'Depende da venda da sua casa atual, descrita no código 2.\r\n\r\nCom a venda, pretende disponibilizar R$80.000 de entrada e financiar o restante.\r\n\r\nA casa atual possui financiamento e dívida a ser quitada na venda.\r\n\r\nQuestão: pode realizar novo financiamento pelo MCMV tendo quitado este?'),
(4, 'Thiago Lima de Melo', '550.999.390-15', 'souza.dalmo@gmail.com', '51999938521', '', 'Rua Hergasto Crespo Travessa 1', 20, '93224-110', 'Sapucaia do Sul', 'Pasqualini', 'Ativo', 'Terreno. Preferencialmente que possua pequena casa para iniciar obra.', 'Em Sapucaia próximo ao centro, junto a João Pereira de Vargas ou em Esteio próximo ao centro.', ' Valor à vista, aproximado, de R$180.000\r\n\r\nDepende da venda da casa atual.'),
(5, 'Marcos Vinicius Cardoso', '754.356.910-97', 'souza.dalmo@gmail.com', '(51)98585944', '5198626565', 'Rua Dulcimar Cardoso', 213, '93220-560', 'Esteio', 'Paraíso', 'Ativo', 'Procura terreno para investimento: construção de casas populares', 'Esteio ou Sapucaia', ' Valores diferenciados. Negócio de ocasião para investimento.'),
(6, 'Vanessa Silva de Souza', '00418983038', 'vanessa-souza@susepe.rs.gov.br', '981733018', '', 'Rua Gravataí', 323, '93260010', 'Sapucaia do Sul', 'Centro', 'Ativo', 'Procura Imóvel de 3 dormitórios, preferencial casa. ', 'Sapucaia do Sul', 'Possui salário de R$3.794\r\nSem FGTS\r\nDivorciada.\r\nvalor para entrada da venda futura de um veículo: R$10.000'),
(7, 'Wesley Schneider', '222.222.222-21', 'wesleyschneideraires@gmail.com', '44444444444', '3333333333', '555', 666666666, '7777777', 'Aceguá', '9999999', 'Ativo', '888888888', '999999999', ' 000000000000');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientevendedor`
--

CREATE TABLE `clientevendedor` (
  `idcliven` int(11) NOT NULL,
  `nomecliven` varchar(100) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `cnpj` varchar(18) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `cidade` varchar(80) NOT NULL,
  `bairro` varchar(80) NOT NULL,
  `conjuge` varchar(150) NOT NULL,
  `cpfconjuge` varchar(14) NOT NULL,
  `pessoacontato` varchar(150) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `login` varchar(80) NOT NULL,
  `senha` varchar(8) NOT NULL,
  `obs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `clientevendedor`
--

INSERT INTO `clientevendedor` (`idcliven`, `nomecliven`, `cpf`, `cnpj`, `email`, `telefone`, `celular`, `logradouro`, `numero`, `cep`, `cidade`, `bairro`, `conjuge`, `cpfconjuge`, `pessoacontato`, `status`, `login`, `senha`, `obs`) VALUES
(4, 'Marcos Vinicius Cardoso', '754.356.910-97', '', 'jefersonleonblue@gmail.com', '5198626565', '(51)98585944', 'Rua Dulcimar Cardoso', 213, '93220-560', 'Sapucaia do Sul', 'Paraíso', 'Marcos Vinícius Cardoso', '754.356.910-97', 'Marcos Vinícius', 'Ativo', 'marcos', '1', 'Casas no Bairro Bela Vista em Sapucaia\r\n\r\nComissão fechada em R$5.000'),
(5, 'Rodrigo Souza', '031.450.730-28', '', 'rodrigoejenifer@hotmail.com', '5134735512', '51985071206', 'Rua Almirante Tamandaré', 67, '93218-030', 'Sapucaia do Sul', 'São José', 'Jenifer Auriene da Rosa', '03145073028', 'Rodrigo Souza', 'Ativo', 'Rodrigo', '59dece15', 'Deseja vender casa para comprar outra. Motivo: divergência com vizinhos.'),
(6, 'Viga Construções e Incorporações Ltda.', '', '', 'contato@vigaconstrutora.com', '5134586402', '5197796402', ' Rua 24 de Agosto', 2190, '93280-082', 'Esteio', 'Parque Amador', '', '', 'Cibele Brock', 'Ativo', 'Cibele', 'Cibele', 'empreendimentos somente em Sapucaia.'),
(7, 'Lauro Gabriel Gallas', '012.965.400-06', '', 'souza.dalmo@gmail.com', '5186008928', '5184127950', 'Rua 24 de Agosto', 449, '93265-169', 'Esteio', 'Centro', 'Moronea A. Gallas', '', '', 'Ativo', 'Lauro', 'rk30e2gi', 'Possui vários (4) imóveis à venda.\r\nNegociação facilitada pela urgência'),
(8, 'Nilton Medeiros Palma', '353.517.850-70', '', 'souza.dalmo@gmail.com', '5134734055', '51993160411', 'Rua Gravataí', 215, '93260010', 'Esteio', 'Centro', '', '', '', 'Ativo', 'Nilton', 'rk30e2gi', 'Cliente em processo de separação, mas com concordância da esposa em vender.'),
(9, 'Thiago Lima de Melo', '550.999.390-15', '', 'souza.dalmo@gmail.com', '', '51999938521', 'Rua Hergasto Crespo Travessa 1', 20, '93224-110', 'Sapucaia do Sul', 'Pasqualini', '', '', '', 'Ativo', 'Thiago', 'rk30e2gi', 'Contrato de compra e venda'),
(10, 'João Léu Damasceno Filho', '550.999.390-15', '', 'souza.dalmo@gmail.com', '5134732621', '51999661082', 'Rua Castro Alves', 1347, '93260-460', 'Esteio', 'Tamandaré', '', '', '', 'Ativo', 'Leu', 'rk30e2gi', 'Deseja vendar casa para comprar terreno para construir casa menor.'),
(11, 'Jailson Calheiro', '934.298.869-53', '', 'jailsoncalheiro@hotmail.com', '5134533062', '51998532534', 'Rua Benjamin constant', 400, '93222000', 'Sapucaia do Sul', 'Boa Vista', '', '', '', 'Ativo', 'Jailson', 'jailson', 'Vende sobrado desocupado'),
(12, 'Alexandro Marc', '550.999.390-15', '', 'alexandromarc@gmail.com', '', '51981412181', 'Rua Euclides Correa Machado', 200, '93218-350', 'Sapucaia do Sul', 'Freitas', '', '', '', 'Ativo', 'Alexandro', 'Alexandr', 'Atualmente, proprietário reside em SC'),
(13, 'Ocledis Julianotti', '550.999.390-15', '', 'souza.dalmo@gmail.com', '', '991727556', 'Rua 25 de Julho', 564, '93222000', 'Sapucaia do Sul', 'Vargas', '', '', '', 'Ativo', 'Ocledis', 'rk30e2gi', 'Aceita imóvel de menor valor'),
(14, 'IMOPART PPNI Construtora e Incorporadora Ltda', '', '09.262.831/000', 'adm@imopart.com.br', '513034.4188', '51980404578', 'Rua Capitão Camboim', 32, '93220-070', 'Sapucaia do Sul', 'Centro', '', '', 'Jônatas G. Grie', 'Ativo', 'Jônatas', 'Jonatas', 'Diversos empreendimentos em Sapucaia do Sul'),
(15, 'Everton Strasburger Zeppenfeld', '999.627.050-05', '', 'ulbrazepp@gmail.com', '5137853669', '51996879942', 'Rua 24 de Outubro', 67, '92200770', 'Canoas', 'Fátima', '', '', '', 'Ativo', 'Everton', 'Everton', 'Venda apto para mudar para sua casa em Nova Santa Rita.'),
(16, 'Paulo Paim', '550.999.390-15', '', 'imobiliaria@paimimoveis.com', '513416.3449', '5198465.6003', 'Rua Encantado', 1143, '95555-000', 'Capão da Canoa', 'Zona Nova', '', '', 'Paulo', 'Ativo', 'Paulo', 'Paulo', 'Imóveis em parceria com imobiliária Paim, www.paimimoveis.com\r\n\r\nRadar divulga, capta e encaminha. Paim, contata, recebe e vende.'),
(17, 'Ana Lúcia Gonzales', '416.663.800-91', '', 'souza.dalmo@gmail.com', '', '5198140954', 'Rua Lobo da Costa', 141, '93270-440', 'Esteio', 'Novo Esteio', '', '', 'Fernando', 'Ativo', 'Fernando', 'rk30e2gi', 'São duas casa no terreno'),
(18, 'Multti Servicos Tecnologia Ambiental Ltda', '1058461144', '03.588.763/000', 'jmartins@multtiservicos.com.br', '5134529100', '51999583955', 'R. Carlos Fantinél', 515, '93230-110', 'Sapucaia do Sul', 'Nova Sapucaia', '', '', 'João Martins', 'Ativo', 'Joao', 'Joao', 'Possui terrenos no Loteamento Recanto Verde e Aptos no MRV Kurashik'),
(19, 'Gisele Venhofen', '725.666.120-72', '', 'souza.dalmo@gmail.com', '5134736127', '51981909835', 'Rua Fernando Ferrari', 130, '93216-210', 'Esteio', 'Centro', '', '', '', 'Ativo', 'Gisele', 'rk30e2gi', 'Deseja vender para comprar casa menor.'),
(20, 'Gustavo Flores Oliveira', '693.184.330-34', '', 'gfo557@gmail.com', '5198626565', '51985128093', 'Rua Gravataí', 120, '93260010', 'Esteio', 'Centro', '', '', '', 'Ativo', 'Gustavo', 'Gustavo', 'Precisa vender com urgência para quitar débitos de financiamento da casa.'),
(21, 'Fabiano Freitas', '550.999.390-15', '', 'fabvarfre@gmail.com', '5134734412', '51996355771', 'Coxilha de Amaral Ferrador', 100, '96635-000', 'Amaral Ferrador', 'Cochilha', '', '', '', 'Ativo', 'Fabiano', 'Fabiano', 'Vendo/troco chácara de 14 hectares na Coxilha de Amaral Ferrador. Possui 6 nascentes, mata nativa dentro dos limites do Ibama, matos de eucaliptos para lenha e toras, cercada, escriturada (tudo em dia), energia elétrica CEEE, uma estufa comum e uma LL par'),
(22, 'Fernanda Daniele Oliveita pereira', '550.999.390-15', '', 'souza.dalmo@gmail.com', '5334735512', '51982589764', 'Rua Tomé de Souza', 36, '93115-270', 'São Leopoldo', 'Santos Dumont ', '', '', '', 'Ativo', 'Fernanda', 'rk30e2gi', 'Apto alugado'),
(23, 'Ângela', '550.999.390-15', '', 'souza.dalmo@gmail.com', '34735512', '51982329361', 'Rua Manoel Serafim', 792, '93220-250', 'Sapucaia do Sul', 'Centro', '', '', '', 'Ativo', 'Ângela', 'rk30e2gi', 'Documentação em dia'),
(24, 'Adir Celso Jantsch', '524.737.750-87', '', 'adir.cj@hotmail.com', '', '5192461794', 'Rua São Francisco', 373, '93285040', 'Esteio', 'Olímpica', 'Simone Jantsch', '', 'Adir', 'Ativo', 'pedro', 'Pedro', 'Cliente com 1 apartamento e 1 casa para venda, obteve-se contato apartir do amigo Guilherme de Pedro Comassetto.'),
(25, 'New Invest Brazil', '550.999.390-15', '', 'souza.dalmo@gmail.com', '5134735512', '51982833434', 'Rua Santana', 597, '93285-000', 'Esteio', 'Olímpica', '', '', 'Andreus', 'Ativo', 'dalmo', 'rk30e2gi', 'Contato com Andreus para visitação'),
(26, 'Diego', '550.999.390-15', '', 'souza.dalmo@gmail.com', '34735512', '991991342', 'Rua Gravataí', 225, '93260010', 'Esteio', 'Centro', '', '', 'Diego', 'Ativo', 'Diego', 'rk30e2gi', 'Documentação do imóvel necessita inventário'),
(27, 'Sílvia Bernanrdes', '541.890.630-53', '', 'souza.dalmo@gmail.com', '34735512', '995509655', 'Rua Barlotolomeu de Gusmão', 60, '93270-400', 'Esteio', 'Novo Esteio', '', '', '', 'Ativo', 'Silvia', 'rk30e2gi', 'Aceita financiamento'),
(28, 'Luciana Oliveira Müller Roduíte', '728.709.820-20', '', 'lucianamulleroliveira@outlook.com.br', '', '981910862', 'Rua Rio Grande', 2255, '93265-001', 'Esteio', 'São Sebastião', '', '', 'Luciana', 'Ativo', 'Luciana', 'Luciana', 'Apto quitado, mas não transferido. Luciana possui contrato de compra e venda.'),
(29, 'Adriana Januária dos Santos Bernardo', '672.293.790-91', '', 'souza.dalmo@gmail.com', '34735512', '51983078012', 'Rua Firmo Pereira de Vargas', 115, '93222-060', 'Sapucaia do Sul', 'Vargas', '', '', 'Adriana', 'Ativo', 'Adriana', 'rk30e2gi', 'Em processo de Usocapião'),
(30, 'Márcio Roberto da Silva', '952.105.800--5', '', 'marcioroberto883@gmail.com', '', '992986535', 'Rua Luis Lopes', 380, '93228-190', 'Sapucaia do Sul', 'Passo de Sapucaia', '', '', '', 'Ativo', 'Márcio', 'Márcio', 'Terreno pode ser desmembrado. Em fase de regularização com pagamento de ITBI.'),
(31, 'Mário Pies', '550.999.390-15', '', 'souza.dalmo@gmail.com', '34735512', '51982804080', 'Rua Castro Alves', 1338, '93260-460', 'Esteio', 'Tamandaré', '', '', '', 'Ativo', 'Mário', 'rk30e2gi', 'Atualizar dados de e-mail e cpf'),
(32, 'Wagner Jordão', '550.999.390-15', '', 'souza.dalmo@gmail.com', '34735512', '51999532990', 'Rua da Acácias', 637, '93180-000', 'Portão', 'Centro', '', '', '', 'Ativo', 'Wagner', 'rk30e2gi', 'Condomínio Rural com contrato de compra e venda.'),
(33, 'Régis Teixeira', '550.999.390-15', '', 'souza.dalmo@gmail.com', '34735512', '51997526703', 'Rua Rio Pardo', 1420, '93260-480', 'Esteio', 'Tamandaré', '', '', '', 'Ativo', 'Régis', 'rk30e2gi', 'Possui vários imóveis à venda.'),
(34, 'Construtora e Incorporadora Edifique', '550.999.390-15', '', 'souza.dalmo@gmail.com', '5135024237', '51982063682', 'Avenida Central', 736, '95555-000', 'Capão da Canoa', 'Zona Nova', '', '', 'Sandro', 'Ativo', 'Edificque', 'rk30e2gi', 'Diversos Empreendimentos na cidade'),
(35, 'Fábio Tatuador', '550.999.390-15', '', 'souza.dalmo@gmail.com', '', '985166078', 'Rua Salgado Filho', 1120, '93260-010', 'Esteio', 'Centro', '', '', '', 'Ativo', 'Fábio', 'rk30e2gi', 'Avalia carro'),
(36, 'Maurício Azeredo Jacobini', '550.999.390-15', '', 'souza.dalmo@gmail.com', '', '981642452', 'Rua Padre Réus', 1511, '95560-000', 'Torres', 'Centro', '', '', '', 'Ativo', 'Mauricio', 'rk30e2gi', 'Em processo de inventário'),
(37, 'Wesley Schneider', '222.222.222-22', '22222222222222', 'ww@gmail.com', '3333333333', '44444444444', '555555', 2147483647, '677777777', 'Aceguá', '333333333', '666666', '777777777', '7777777777', 'Ativo', 'wwww', '1', '22222'),
(38, 'Wesley Schneider', '557.333.240-00', '', 'wesleyschneideraires@gmail.com', '', '51985504072', 'Anjo Rafael', 133, '93212400', 'Sapucaia do Sul', 'Pasqualine', '', '', '', 'Ativo', 'wesley', '8jty2v6l', 'Eai');

-- --------------------------------------------------------

--
-- Estrutura para tabela `historico`
--

CREATE TABLE `historico` (
  `idhistorico` int(11) NOT NULL,
  `data` date NOT NULL,
  `descricao` text NOT NULL,
  `idimo` int(11) NOT NULL,
  `idcliven` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `historico`
--

INSERT INTO `historico` (`idhistorico`, `data`, `descricao`, `idimo`, `idcliven`) VALUES
(2, '2016-11-20', 'DIVULGADO PARA 2 NOVOS POSSIVEIS CLIENTES', 2, 5),
(3, '2016-11-18', 'Anuncio Jornal', 1, 4),
(4, '2016-11-10', 'ANUNCIO OLX', 1, 4),
(5, '2016-11-21', 'ANUNCIO ZH', 2, 5),
(6, '2016-11-11', 'Anuncios em veiculos de comunicaÃ§Ã£o cxcx', 4, 6),
(7, '2016-11-21', 'visita ao imovel com possivel cliente', 5, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `imovel`
--

CREATE TABLE `imovel` (
  `idimo` int(10) UNSIGNED NOT NULL,
  `idusu` int(10) UNSIGNED DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL,
  `datacadimo` date DEFAULT NULL,
  `idcliven` int(10) UNSIGNED DEFAULT NULL,
  `tipoimo` varchar(150) DEFAULT NULL,
  `tipo` varchar(100) NOT NULL,
  `lougradouro` varchar(200) NOT NULL,
  `numero` int(11) NOT NULL,
  `bloco` varchar(20) NOT NULL,
  `bairro` varchar(80) NOT NULL,
  `cidade` varchar(80) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `estado` varchar(80) NOT NULL,
  `numdormimo` int(10) UNSIGNED DEFAULT NULL,
  `areaimo` varchar(100) DEFAULT NULL,
  `vagasimo` int(10) UNSIGNED DEFAULT NULL,
  `valorcondominioimo` varchar(100) DEFAULT NULL,
  `valoriptuimo` varchar(100) DEFAULT NULL,
  `piso` varchar(100) DEFAULT NULL,
  `tetoimo` varchar(100) DEFAULT NULL,
  `paredesimo` varchar(100) DEFAULT NULL,
  `hidraulicaimo` varchar(100) DEFAULT NULL,
  `arcondicionadoimo` varchar(100) DEFAULT NULL,
  `armariosimo` varchar(100) DEFAULT NULL,
  `salaofestaimo` varchar(100) DEFAULT NULL,
  `churrasqueiraimo` varchar(100) DEFAULT NULL,
  `portariaimo` varchar(100) DEFAULT NULL,
  `areaservicoimo` varchar(100) DEFAULT NULL,
  `piscinaimo` varchar(100) DEFAULT NULL,
  `academiaimo` varchar(100) DEFAULT NULL,
  `valorimo` varchar(100) DEFAULT NULL,
  `planoimo` varchar(100) DEFAULT NULL,
  `inclinadoimo` varchar(100) DEFAULT NULL,
  `gramadoimo` varchar(100) DEFAULT NULL,
  `calcadoimo` varchar(100) DEFAULT NULL,
  `comissaoimo` varchar(100) DEFAULT NULL,
  `valorvendaimo` decimal(10,0) DEFAULT NULL,
  `observacao1` varchar(255) DEFAULT NULL,
  `observacao2` varchar(255) DEFAULT NULL,
  `observacao3` varchar(255) NOT NULL,
  `medidasimo` varchar(100) DEFAULT NULL,
  `foto1` varchar(255) DEFAULT NULL,
  `foto2` varchar(255) DEFAULT NULL,
  `foto3` varchar(255) DEFAULT NULL,
  `foto4` varchar(255) DEFAULT NULL,
  `foto5` varchar(255) DEFAULT NULL,
  `destaqueimo` int(11) NOT NULL,
  `empreendimento` int(11) NOT NULL,
  `nomeempreendimento` varchar(200) NOT NULL,
  `numunidades` int(11) NOT NULL,
  `numandares` int(11) NOT NULL,
  `numpredios` int(11) NOT NULL,
  `aptosporandar` int(11) NOT NULL,
  `numlotes` int(11) NOT NULL,
  `esperasplit` varchar(3) NOT NULL,
  `sacada` varchar(3) NOT NULL,
  `quadraesporte` varchar(3) NOT NULL,
  `mcmv` varchar(3) NOT NULL,
  `idcap` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `imovel`
--

INSERT INTO `imovel` (`idimo`, `idusu`, `ativo`, `datacadimo`, `idcliven`, `tipoimo`, `tipo`, `lougradouro`, `numero`, `bloco`, `bairro`, `cidade`, `cep`, `estado`, `numdormimo`, `areaimo`, `vagasimo`, `valorcondominioimo`, `valoriptuimo`, `piso`, `tetoimo`, `paredesimo`, `hidraulicaimo`, `arcondicionadoimo`, `armariosimo`, `salaofestaimo`, `churrasqueiraimo`, `portariaimo`, `areaservicoimo`, `piscinaimo`, `academiaimo`, `valorimo`, `planoimo`, `inclinadoimo`, `gramadoimo`, `calcadoimo`, `comissaoimo`, `valorvendaimo`, `observacao1`, `observacao2`, `observacao3`, `medidasimo`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `destaqueimo`, `empreendimento`, `nomeempreendimento`, `numunidades`, `numandares`, `numpredios`, `aptosporandar`, `numlotes`, `esperasplit`, `sacada`, `quadraesporte`, `mcmv`, `idcap`) VALUES
(1, 4, 1, '2016-10-28', 4, 'Casa', 'Alvenaria', 'Rua Cuiabá', 58, '', 'Bela Vista', 'Sapucaia do Sul', '93222000', '', 2, '50', 1, '0', '10', 'Cerâmica', 'PVC', 'Reboco pintado', 'Água Fria', 'Não', 'Não', 'Não', 'Sim', 'Não', 'Sim', 'Não', 'Não', '130000', 'Sim', 'Não', 'Sim', 'Sim', '6', '135000', 'Até 100% Financiado pelo Minha Casa Minha Vida\r\nCom Uso do FGTS\r\nPrestações a partir de R$499,00 (mediante cadastro)\r\nAceita imóvel e veículo como parte do pagamento', 'Comissão Fechada em R$5.000,00', '', '6m x 12m', '../imoveis/fotosprodutos/62579IMG_20161022_100901831 (1).jpg', '../imoveis/fotosprodutos/52118IMG_20161022_100842047.jpg', '../imoveis/fotosprodutos/padrao.png', '../imoveis/fotosprodutos/padrao.png', '../imoveis/fotosprodutos/padrao.png', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '1', 3),
(2, 4, 0, '2016-10-30', 5, 'Casa', 'Alvenaria', 'Rua Almirante Tamandaré', 67, 'Casa 2', 'São José', 'Sapucaia do Sul', '93218-030', '', 2, '42', 2, '0', '0', 'CerÃ£mica', 'Madeira', 'Reboco pintado', 'Água Fria', 'Não', 'Não', 'Não', 'Sim', 'Não', 'Sim', 'Não', 'Não', '130000', 'Sim', 'Não', 'Não', 'Sim', '6', '140000', '', 'Imóvel requer reformas estruturais: rachaduras em paredes e forro caÃ­do. *** Proprietário recomendado a efetuar reparos e estética.\r\n', '', '7m x 15m', '../imoveis/fotosprodutos/66354IMG-20161030-WA0009 (1).jpg', '../imoveis/fotosprodutos/76429IMG-20161030-WA0008 (1).jpg', '../imoveis/fotosprodutos/56134Imagem1.jpg', '../imoveis/fotosprodutos/padrao.png', '../imoveis/fotosprodutos/padrao.png', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(3, 4, 0, '0000-00-00', 8, 'Casa', 'Alvenaria', 'Rua Gravataí', 215, '', 'Centro', 'Esteio', '93260010', '', 2, '120', 3, '0', '4,50', 'Cerâmica', 'Chapa pintada', 'Reboco pintado', 'Água Fria', 'Não', 'Não', 'Sim', 'Não', 'Não', 'Sim', 'Não', 'Não', '500000', 'Sim', 'Não', 'Sim', 'Sim', '6', '550000', 'Aceita imóvel de menor valor.', '', '', '11m x 43m', '../imoveis/fotosprodutos/27338Frente 1.jpg', '../imoveis/fotosprodutos/57235Lateral 2.jpg', '../imoveis/fotosprodutos/2662Lateral 1.jpg', '../imoveis/fotosprodutos/12544Fundos 1.jpg', '../imoveis/fotosprodutos/97877Estar.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(4, 4, 1, '0000-00-00', 6, 'Casa', 'Alvenaria', 'Rua Macapá', 10, '', 'Bela Vista', 'Sapucaia do Sul', '93219-073', '', 2, '53', 1, '0', '2,00', 'Cerâmica', 'Chapa pintada', 'Reboco pintado e azulejos nas Área molhadas', 'Água Quente', 'Espera elétrica para split', 'Não', 'Não', 'Não', 'Não', 'Sim', 'Não', 'Não', '160000', 'Sim', 'Sim', 'Sim', 'Sim', '6', '170000', 'Até 100% financiados pelo Programa Minha Casa Minha Vida (mediante cadastro)\r\nOs imóveis estão prontos para morar e com a documentação aprovada e em dia.', 'Agendamento de visita pelo 51.9779.6402 ou pelo 51. 3458.6402', '', '7m x 11m', '../imoveis/fotosprodutos/39734Externa.jpg', '../imoveis/fotosprodutos/26310Viga - Sala e cozinha.jpg', '../imoveis/fotosprodutos/80631Viga - planta baixa.png', '../imoveis/fotosprodutos/padrao.png', '../imoveis/fotosprodutos/padrao.png', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '1', 3),
(5, 4, 1, '0000-00-00', 6, 'Casa', 'Alvenaria', 'Rua Eduardo Santa Rita Nunes', 225, '', 'Lomba da Palmeira', 'Sapucaia do Sul', '93224-000', '', 2, '53', 2, '0', '0', 'Cerâmica', 'Chapa com gesso', 'Reboco pintado e azulejos nas Área molhadas', 'Água Quente', 'Espera elétrica para split', 'Não', 'Não', 'Não', 'Não', 'Sim', 'Não', 'Não', '164500', 'Sim', 'Não', 'Sim', 'Sim', '6', '175000', 'Até 100% financiados pelo programa Minha casa Minha Vida (mediante Cadastro).\r\nPrestaÃ§Ãµes acessíveis (no valor de um aluguel  - mediante cadastro).\r\nEntrada parcelada.', 'Imóvel esgotado', 'Imóvel pronto para morar, constituído de dois quartos, sala e cozinha integradas, banheiro, Área de serviços, vagas para dois carros. Com 53m2 construídos em terreno de 120m2 com pátio na frente e nos fundos.', '10m x 12m', '../imoveis/fotosprodutos/207Imagem Frontal - Viga Construtora (1).jpg', '../imoveis/fotosprodutos/2229Imagem Lateral - Viga Construtora.jpg', '../imoveis/fotosprodutos/22510Imagem Fundos - Viga Construtora.jpg', '../imoveis/fotosprodutos/42758Cozinha, Jantar - Viga Construtora.jpg', '../imoveis/fotosprodutos/68614DormitÃ³rio Solteiro - Viga Construtora.jpg', 0, 1, '', 0, 0, 0, 0, 0, '', '', '', '1', 3),
(6, 4, 1, '0000-00-00', 7, 'Apartamento', 'Padrão', 'Rua 24 de Agosto', 449, '104', 'Centro', 'Esteio', '93265-169', '', 2, '90', 1, '2,50', '8,00', 'Laminado', 'Gesso em todos os ambientes', 'Massa corrida e azulejos nas Área molhadas', 'Água Quente', '100% climatizado', 'Não', 'Não', 'Não', 'Não', 'Sim', 'Não', 'Não', '400000', 'Sim', 'Não', 'Sim', 'Sim', '6', '430000', '', 'Possui procuração do imóvel\r\nAvalia proposta', '', '', '../imoveis/fotosprodutos/18885Fachada ParaÃ­so.jpg', '../imoveis/fotosprodutos/25391Estar.jpg', '../imoveis/fotosprodutos/36219Cozinha 2.jpg', '../imoveis/fotosprodutos/97818DormitÃ³rio 1.jpg', '../imoveis/fotosprodutos/14001LocalizaÃ§Ã£o.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(7, 4, 1, '0000-00-00', 7, 'Apartamento', 'Padrão', 'Rua Padre Felipe', 220, '103 B', 'Centro', 'Esteio', '93265-169', 'RS', 3, '100', 2, '250', '800', 'Laminado e Cerâmica', 'Chapa com molduras em gesso', 'Massa corrida e reboco', 'Água Quente', 'Split nos domitório', 'Não', 'Não', 'Sim', 'Não', 'Sim', 'Não', 'Não', '400000', 'Sim', 'Não', 'Sim', 'Sim', '6', '430000', 'Aceita apartamento de menor valor.', 'Neste imóvel mora o filho do proprietário.', '', '', '../imoveis/fotosprodutos/53869fachada.jpg', '../imoveis/fotosprodutos/68582Cozinha 3.jpg', '../imoveis/fotosprodutos/73953DormitÃ³rio 1.jpg', '../imoveis/fotosprodutos/36836DormitÃ³rio 3.jpg', '../imoveis/fotosprodutos/60883Garagem.jpg', 0, 0, '', 0, 0, 1, 0, 0, 'Não', 'Não', 'Não', '0', 3),
(8, 4, 1, '0000-00-00', 7, 'Comercial', 'Alvenaria', 'Rodovia RS 118', 4242, '', 'Capão da Cruz', 'Sapucaia do Sul', '93226-210', '', 0, '2800', 0, '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '2162000', 'Sim', 'Não', '', '', '6', '2300000', 'Possui Prédio de 300m2. Pode ser desmembrada e reduzida para 32 m de frente por 56 m de fundo, incluindo o prédio, por R$1.500.000,00.', '', '', '50m x 56m', '../imoveis/fotosprodutos/57587Mapa Ferro Velho.jpg', '../imoveis/fotosprodutos/73988Ferro Velho 2.jpg', '../imoveis/fotosprodutos/7812Ferro Velho 1.jpg', '../imoveis/fotosprodutos/padrao.png', '../imoveis/fotosprodutos/padrao.png', 1, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(9, 4, 1, '0000-00-00', 7, 'Apartamento', 'Padrão', 'Avenida Emancipação', 630, '101', 'Centro', 'Tramandaí', '95590-000', '', 3, '100', 1, '2,50', '8,00', 'Cerâmica', 'Chapa', 'Reboco pintado e azulejos nas Área molhadas', 'Água Quente', 'Nos domitório', 'Sim', 'Não', 'Sim', 'Não', 'Sim', 'Não', 'Não', '400000', '', '', '', '', '6', '430000', 'Avalia imóvel de menor valor', 'Apto térreo.', '', '', '../imoveis/fotosprodutos/35277Fachada.jpg', '../imoveis/fotosprodutos/86044Banho.jpg', '../imoveis/fotosprodutos/96142Cozinha.jpg', '../imoveis/fotosprodutos/86465Banhos2.jpg', '../imoveis/fotosprodutos/9371Dormitorio4 - CÃ³pia.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(10, 4, 0, '0000-00-00', 9, 'Casa', 'Alvenaria', 'Rua Hergasto Crespo ', 20, 'Travessa 1', 'Pasquilini', 'Sapucaia do Sul', '93224-110', '', 2, '130', 1, '0', '0', 'Cerâmica', 'PVC', 'Textura e Cerâmica', 'Água Fria', 'Não', 'Não', 'Sim', 'Sim', 'Não', 'Sim', 'Não', 'Não', '155000', 'Sim', 'Não', 'Não', 'Sim', '6', '165000', 'Avalia terreno de menor valor em Sapucaia ou Esteio.', 'Procura terreno em Sapucaia ou esteio Até R$180000.', '', '8m x 15m', '../imoveis/fotosprodutos/53145b6090132-cf0a-43fc-96b3-20c82b26ace5.jpg', '../imoveis/fotosprodutos/35608d4ec50a8-7d15-44db-87ac-31eded4570bf (1).jpg', '../imoveis/fotosprodutos/941154b2d5559-9230-461e-b511-922eea034a9d.jpg', '../imoveis/fotosprodutos/50400a2578b2-4c00-42b1-8f1d-c67a342cfe4a.jpg', '../imoveis/fotosprodutos/44440Mapa.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(11, 4, 1, '2016-11-01', 10, 'Casa', 'Alvenaria', 'Rua Castro Alves', 1347, '', 'Tamandaré', 'Esteio', '93260-460', '', 3, '230', 3, '0', '4', 'Cerâmica e taboão', 'Chapa e gesso em todos os ambientes', 'Textura e massa corrida', 'Água Quente', 'Nos domitório', 'Não', 'Sim', 'Sim', 'Não', 'Sim', 'Não', 'Não', '750000', 'Sim', 'Não', 'Sim', 'Sim', '6', '780000', 'Avalia terreno em Esteio como parte do pagamento.', 'Deseja vender para adquirir terreno e construir casa menor.', '', '12m x 35m', '../imoveis/fotosprodutos/75010Jantar Estar 2.jpg', '../imoveis/fotosprodutos/2803Gabinete 1.jpg', '../imoveis/fotosprodutos/10899Sala TV.jpg', '../imoveis/fotosprodutos/52096SalÃ£o de Festas 2.jpg', '../imoveis/fotosprodutos/17039PÃ¡tio.jpg', 1, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(12, 4, 1, '0000-00-00', 11, 'Casa', 'Alvenaria', 'Rua Princesa Isabel', 74, '', 'Nova Sapucaia', 'Sapucaia do Sul', '93224-280', '', 2, '65', 1, '', '250,00', 'Porcelanato', 'Chapa e gesso rebaixado', 'Reboco pintado e azulejos nas Área molhadas', 'Água Fria', 'Não', 'Não', 'Não', 'Não', 'Não', 'Sim', 'Não', 'Não', '185000', 'Sim', 'Não', 'Não', 'Sim', '6', '197000', 'Financiável pelo Minha casa Minha Vida.\r\nAceita imóvel e veículo de menor valor como parte do pagamento.', 'Ajustar entrada direta para enquadrar no MCMV', '', '4mx 15m', '../imoveis/fotosprodutos/21016Externa1.jpg', '../imoveis/fotosprodutos/70224Externa4.jpg', '../imoveis/fotosprodutos/58738Corredor1.jpg', '../imoveis/fotosprodutos/53755Terreo.jpg', '../imoveis/fotosprodutos/61369DormitÃ³rio.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '1', 3),
(13, 4, 1, '2016-11-08', 12, 'Terreno', '', 'Rua Euclides Correa Machado', 200, '', 'Freitas', 'Sapucaia do Sul', '93218-350', '', 0, '300', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '200000', '', '', '', '', '6', '215000', '', '', '', '12m x 25m', '../imoveis/fotosprodutos/80727Frontal.jpg', '../imoveis/fotosprodutos/55404Mapa.jpg', '../imoveis/fotosprodutos/51284Acesso.jpg', '../imoveis/fotosprodutos/padrao.png', '../imoveis/fotosprodutos/padrao.png', 1, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(14, 4, 1, '2016-11-09', 13, 'Terreno', '', 'Av. Rubem Berta', 1630, '', 'Freitas', 'Sapucaia do Sul', '93222000', '', 0, '1080', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '400000', 'Sim', 'Não', '', '', '2', '430000', 'Aceita imóvel de menor valor', 'Não autoriza placas', 'Terreno em área nobre de Sapucaia do Sul, medindo 15m x 75m. Localizado na Av. Rubem Berta, no acesso ao horto, em área plana, alta e pronta para construir moradia diferenciada ou empreender.', '15m x 72m', '../imoveis/fotosprodutos/90766Frente.jpg', '../imoveis/fotosprodutos/27795Mapa.jpg', '../imoveis/fotosprodutos/padrao.png', '../imoveis/fotosprodutos/padrao.png', '../imoveis/fotosprodutos/padrao.png', 1, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(15, 4, 1, '2016-11-14', 14, 'Terreno', 'empreendimento', 'Rua Ivoti', 0, 'Sublote 02', 'Vargas', 'Sapucaia do Sul', '93222090', '', 0, '250', 0, '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '72380', '', '', '', '', '6', '77000', 'Entrada de 30% e saldo em 48 parcelas.', 'Comissão original pago pela IMOPART 4%. Valores ajustados para 6%.', 'Loteamento Recanto da Amizade oferece lotes em área urbanizada e pronta para realizar seu sonho da casa própria em local seguro e diferenciado. Localizada no alto do Bairro Vargas possui acesso fácil ao centro da cidade e transporte coletivo.', '10m x 25m', '../imoveis/fotosprodutos/25214Mapa.jpg', '../imoveis/fotosprodutos/60300Imagem1.jpg', '../imoveis/fotosprodutos/padrao.png', '../imoveis/fotosprodutos/padrao.png', '../imoveis/fotosprodutos/padrao.png', 0, 1, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(16, 4, 1, '2016-11-14', 14, 'Casa', 'Alvenaria', 'Rua São Gabriel', 0, 'Sublote 02', 'Vargas', 'Sapucaia do Sul', '93220090', '', 3, '68', 1, '', '', 'Cerâmica', 'Chapa', 'Reboco pintado', 'Água Fria', '', '', 'Não', 'Sim', 'Não', 'Sim', 'Não', 'Não', '178600', 'Sim', 'Não', 'Sim', 'Sim', '6', '190000', 'Financiamento pela CEF;\r\nPrazo de entrega 90 dias.', 'Comissão paga pelo IMOPART 4%. Valor ajustado para alcançar 6%.', 'Casa de 3 dormitório, nova, com vaga para dois carros em terreno gramado de 10m x 20m.', '10m x 20m', '../imoveis/fotosprodutos/58532Acesso.jpg', '../imoveis/fotosprodutos/9531402.jpg', '../imoveis/fotosprodutos/1867003.jpg', '../imoveis/fotosprodutos/3992504.jpg', '../imoveis/fotosprodutos/98751Mapa Recanto II.jpg', 1, 1, '', 0, 0, 0, 0, 0, '', '', '', '1', 3),
(17, 4, 1, '2016-11-15', 14, 'Terreno', 'empreendimento', 'Rua João da Silva Brandão', 0, '', 'Colonial', 'Sapucaia do Sul', '93212-580', '', 0, '250', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '80640', '', '', '', '', '6', '85900', 'Entrada de 30% e saldo em 48 parcelas.', 'Comissão paga pela Imopart 4%. Valor final ajustado para alcançar comissão de 6%.', '', '10m x 25m', '../imoveis/fotosprodutos/95082Mapa Meirelles.jpg', '../imoveis/fotosprodutos/padrao.png', '../imoveis/fotosprodutos/padrao.png', '../imoveis/fotosprodutos/padrao.png', '../imoveis/fotosprodutos/padrao.png', 0, 1, 'Loteamento Meirelles', 0, 0, 0, 0, 48, '', '', '', '0', 3),
(18, 4, 1, '2016-11-16', 15, 'Apartamento', 'Padrão', 'Rua 24 de Outubro', 67, '104 A', 'Fátima', 'Canoas', '92200770', '', 2, '49', 1, '155,00', '150,00', 'Cerâmica', 'Chapa com molduras em gesso', 'Reboco pintado', 'Água Fria', '', 'Sim', 'Sim', 'Não', 'Sim', 'Sim', 'Não', 'Não', '169106', 'Sim', '', '', '', '6', '179900', 'Mantem armários sob-medida montados na cozinha e telas de proteção na sacada.', 'Possui saldo devedor de aproximadamente R$88.000,mas quita na venda.', '', '', '../imoveis/fotosprodutos/43739IMG-20161116-WA0002.jpg', '../imoveis/fotosprodutos/5908IMG-20161116-WA0005.jpg', '../imoveis/fotosprodutos/64578IMG-20161116-WA0010.jpg', '../imoveis/fotosprodutos/40295IMG-20161116-WA0009.jpg', '../imoveis/fotosprodutos/58616IMG-20161116-WA0003.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(19, 4, 0, '2016-11-20', 16, 'Apartamento', 'Padrão', 'Rua Encantado', 1120, '', 'Zona Nova', 'Capão da Canoa', '95555-000', '', 2, '65', 0, '120,00', '500,00', 'Cerâmica', 'Chapa pintada', 'Massa corrida e reboco', 'Água Quente', '', 'Sim', 'Sim', 'Sim', 'Não', 'Sim', 'Não', 'Não', '182160', 'Sim', 'Não', 'Não', 'Não', '8', '198000', 'Apartamento mobiliado; A três quadras do mar.', 'Imóvel em parceria com Paim imóveis.', '', '', '../imoveis/fotosprodutos/72002Estar 2.jpg', '../imoveis/fotosprodutos/59070Vista Externa 1.jpg', '../imoveis/fotosprodutos/61961Vista Externa 2.jpg', '../imoveis/fotosprodutos/45367Cozinha.jpg', '../imoveis/fotosprodutos/78952DormitÃ³rio e Sacada.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(20, 4, 0, '2016-11-20', 16, 'Apartamento', 'Padrão', 'Rua Encantado', 1120, '', 'Zona Nova', 'Capão da Canoa', '95555-000', '', 2, '65', 1, '100,00', '500,00', 'Cerâmica', 'Chapa pintada', 'Massa corrida e azulejos nas Área molhadas', 'Água Quente', 'Espera Split', 'Não', 'Sim', 'Sim', 'Não', 'Sim', 'Não', 'Não', '257600', 'Sim', 'Não', 'Não', 'Não', '8', '280000', 'Imóvel novo a três quadras do mar.', 'Imóvel em parceria com Paim imóveis.', '', '', '../imoveis/fotosprodutos/33318Sacada.jpg', '../imoveis/fotosprodutos/98366Sala ServiÃ§o.jpg', '../imoveis/fotosprodutos/1177Vista 1.jpg', '../imoveis/fotosprodutos/22004Vista 2.jpg', '../imoveis/fotosprodutos/95918Vista 2.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(21, 4, 0, '0000-00-00', 16, 'Casa', 'Alvenaria', 'Rua Encantado', 1120, '', 'Zona Nova', 'Capão da Canoa', '95555-000', '', 2, '65', 2, '100,00', '500,00', 'Cerâmica', 'Chapa', 'Reboco pintado', 'Água Fria', '', 'Não', 'Sim', 'Sim', 'Não', 'Sim', 'Não', 'Não', '116380', 'Sim', 'Não', 'Sim', 'Sim', '8', '126500', 'Imóvel mobiliado.', 'Imóvel em parceria com Paim imóveis.', '', '', '../imoveis/fotosprodutos/20900Fachada Geral.jpg', '../imoveis/fotosprodutos/38292Fachada.jpg', '../imoveis/fotosprodutos/26901PÃ¡tio.jpg', '../imoveis/fotosprodutos/54183Estar Cozninha.jpg', '../imoveis/fotosprodutos/7172SaÃ­da.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(22, 4, 0, '2016-11-20', 16, 'Apartamento', 'Padrão', 'Rua Encantado', 1120, '', 'Centro', 'Capão da Canoa', '95555-000', '', 2, '70', 1, '', '', 'Cerâmica', 'Gesso', 'Massa corrida e azulejos nas Área molhadas', 'Água Quente', 'Espera Split', 'Não', 'Sim', 'Sim', 'Não', 'Sim', 'Sim', 'Sim', '350000', 'Sim', 'Não', 'Sim', 'Sim', '8', '390000', 'Imóvel de fino acabamento;\r\nentrada mais parcelas.', 'Imóvel em parceria com Paim imóveis.', '', '', '../imoveis/fotosprodutos/63395Fachada.jpg', '../imoveis/fotosprodutos/44341Estar e Jantar.jpg', '../imoveis/fotosprodutos/70906SalÃ£o de Festas.jpg', '../imoveis/fotosprodutos/37423Planta.jpg', '../imoveis/fotosprodutos/35414Fachada.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(23, 4, 0, '2016-11-20', 16, 'Apartamento', 'Padrão', 'Rua Sepé', 3111, '', 'Centro', 'Capão da Canoa', '95555-000', '', 2, '68', 1, '', '', 'Cerâmica', 'Chapa pintada', 'Massa corrida e azulejos nas Área molhadas', 'Água Quente', 'Espera Split', 'Não', 'Sim', 'Sim', 'Não', 'Sim', 'Não', 'Sim', '386400', 'Sim', 'Não', 'Sim', 'Sim', '8', '420000', 'Entrada mais parcelas;\r\nEntrega em dezembro/2017.\r\n', 'Imóvel em parceria com paim imóveis.', '', '', '../imoveis/fotosprodutos/62089Fachada.jpg', '../imoveis/fotosprodutos/89826AnimaÃ§Ã£o Estar.jpg', '../imoveis/fotosprodutos/50556Estar e Jantar.jpg', '../imoveis/fotosprodutos/9062Academia.jpg', '../imoveis/fotosprodutos/83191Piscina.jpg', 0, 1, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(24, 4, 1, '2016-11-23', 17, 'Casa', 'Alvenaria', 'Rua Lobo da Costa', 141, '', 'Novo Esteio', 'Esteio', '93270-440', '', 4, '160', 3, '', '400,00', 'Cerâmica', 'PVC', 'Reboco pintado', 'Água Fria', 'Em trÃªs Domitório', 'Sim', 'Sim', 'Sim', 'Não', 'Sim', 'Não', 'Não', '480000', 'Sim', 'Não', 'Sim', 'Sim', '6', '490000', 'São duas casas de 2 dormitório cada totalmente mobiliadas.', 'Família em mudança para SC', 'São duas casas de alvenaria, sólidas e em local alto, plano e seco na entrada do Bairro Novo Esteio. Acompanha toda a mobília, dormitório, cozinhas, condicionadores de ar, estofados... Casas prontas para morar.', '10m x 30m', '../imoveis/fotosprodutos/93337Fachada.jpg', '../imoveis/fotosprodutos/97596Fachada 2.jpg', '../imoveis/fotosprodutos/70689Cozinha 1.jpg', '../imoveis/fotosprodutos/69717Estar 1.jpg', '../imoveis/fotosprodutos/91313Quarto 1.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(25, 4, 1, '2016-12-08', 18, 'Apartamento', 'Padrão', 'Avenida Lúcio Bittencourt', 1350, '', 'Kurashiki', 'Sapucaia do Sul', '93214-170', '', 2, '50', 1, '100,00', '200,00', 'A ser finalizado pelo comprador', 'Chapa pintada', 'Reboco pintado', 'Água Fria', 'Espera Split', 'Não', 'Sim', 'Não', 'Sim', 'Sim', 'Sim', 'Sim', '150400', 'Sim', 'Não', 'Sim', 'Sim', '6', '160000', 'Pronto para Morar!\r\nFinanciável pelo Minha Casa Minha Vida com subsÃ­dio.\r\nPequena entrada e prestação no valor de aluguel. Pague o que é seu!', '', 'Apartamento térreo de 2 dormitório com pátio.\r\nExcelente iluminação natural e ventilação.\r\nApartamento novo, nunca ocupado e financiável pelo Minha casa Minha Vida.', '', '../imoveis/fotosprodutos/66600Vista Geral.jpg', '../imoveis/fotosprodutos/97021Entrada.jpg', '../imoveis/fotosprodutos/74324PrÃ©dios.jpg', '../imoveis/fotosprodutos/91759Festas.jpg', '../imoveis/fotosprodutos/31777Foto AÃ©rea.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '1', 3),
(26, 4, 1, '2016-12-08', 18, 'Apartamento', 'Padrão', 'Avenida Lúcio Bittencourt', 1350, '', 'Kurashiki', 'Sapucaia do Sul', '93214-170', '', 2, '49', 1, '100,00', '200,00', 'A ser finalizado pelo comprador', 'Chapa pintada', 'Reboco pintado', 'Água Fria', 'Espera Split', 'Não', 'Sim', 'Não', 'Sim', 'Sim', 'Sim', 'Sim', '136300', 'Sim', 'Não', 'Sim', 'Sim', '6', '145000', 'Pronto para Morar! Financiável pelo Minha Casa Minha Vida com subsídio. Pequena entrada e prestações no valor de aluguel. Pague o que é seu!', '', 'Apartamento térreo de 2 dormitório com pátio.\r\nExcelente iluminação natural e ventilação.\r\nApartamento novo, nunca ocupado e financiável pelo Minha casa Minha Vida.', '', '../imoveis/fotosprodutos/71127Entrada.jpg', '../imoveis/fotosprodutos/8525PrÃ©dios.jpg', '../imoveis/fotosprodutos/45995Vista Geral.jpg', '../imoveis/fotosprodutos/28360Foto AÃ©rea.jpg', '../imoveis/fotosprodutos/16057Festas.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '1', 3),
(27, 4, 1, '2016-12-08', 18, 'Apartamento', 'Padrão', 'Avenida Lúcio Bittencourt', 1350, '', 'Kurashiki', 'Sapucaia do Sul', '93214-170', '', 2, '49', 1, '100,00', '200,00', 'A ser finalizado pelo comprador', 'Chapa pintada', 'Reboco pintado', 'Água Fria', 'Espera Split', 'Não', 'Sim', 'Não', 'Sim', 'Sim', 'Sim', 'Sim', '126900', 'Sim', 'Não', 'Sim', 'Sim', '6', '135000', 'Pronto para Morar! Financiável pelo Minha Casa Minha Vida com subsídio. Pequena entrada e prestações no valor de aluguel. Pague o que é seu!', '', 'Apartamento no 5º andar de 2 dormitório.\r\nExcelente iluminação natural, vista e ventilação.\r\nApartamento novo, nunca ocupado e financiável pelo Minha casa Minha Vida.', '', '../imoveis/fotosprodutos/65653PrÃ©dios.jpg', '../imoveis/fotosprodutos/96081Entrada.jpg', '../imoveis/fotosprodutos/94219Vista Geral.jpg', '../imoveis/fotosprodutos/44827Foto AÃ©rea.jpg', '../imoveis/fotosprodutos/2216Festas.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '1', 3),
(28, 4, 1, '2016-12-08', 18, 'Apartamento', 'Padrão', 'Avenida Lúcio Bittencourt', 1350, '', 'Kurashiki', 'Sapucaia do Sul', '93214-170', '', 2, '49', 1, '100,00', '200,00', 'A ser finalizado pelo comprador', 'Chapa pintada', 'Reboco pintado', 'Água Fria', 'Espera Split', 'Não', 'Sim', 'Não', 'Sim', 'Sim', 'Sim', 'Sim', '123140', 'Sim', 'Não', 'Sim', 'Sim', '6', '131000', 'Pronto para Morar! Financiável pelo Minha Casa Minha Vida com subsídio. Pequena entrada e prestações no valor de aluguel. Pague o que é seu!', '', 'Apartamento no 5º andar de 2 dormitório.\r\nExcelente iluminação natural, vista e ventilação.\r\nApartamento novo, nunca ocupado e financiável pelo Minha casa Minha Vida.', '', '../imoveis/fotosprodutos/77511Festas.jpg', '../imoveis/fotosprodutos/23331Entrada.jpg', '../imoveis/fotosprodutos/30814PrÃ©dios.jpg', '../imoveis/fotosprodutos/67263Foto AÃ©rea.jpg', '../imoveis/fotosprodutos/41324Vista Geral.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(29, 4, 1, '2016-12-08', 19, 'Casa', 'Alvenaria', 'Rua Fernando Ferrari', 130, '', 'Centro', 'Esteio', '93216-210', '', 3, '146', 1, '', '480,00', 'Madeira', 'Chapa pintada', 'Reboco pintado', 'Água Fria', 'Split em 2 domitório', 'Não', 'Não', 'Sim', 'Não', 'Sim', 'Não', 'Não', '550000', 'Sim', 'Não', 'Sim', 'Sim', '6', '587000', 'Avalia Imóvel de menor valor em Esteio.\r\nFinanciável.', 'EspÃ³lio dos pais falecidos. inventário encerrado. SÃ£o três irmãos herdeiros. Um deles, vive na frança, mas deixou procuração.', 'Casa de três domitório no centro. 146m2 construí­dos em terreno plano, seco e gramado com 726m2.\r\nCasa sólida, compeças amplas e chapa de concreto que requer reforma viável para embelezar a moradia.', '22m x 33m', '../imoveis/fotosprodutos/30042Fachada 1.jpg', '../imoveis/fotosprodutos/55591Lateral.jpg', '../imoveis/fotosprodutos/83806Fundo 2.jpg', '../imoveis/fotosprodutos/68909Fundo 1.jpg', '../imoveis/fotosprodutos/19693Fachada 2.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(30, 4, 0, '2016-12-08', 20, 'Casa', 'Alvenaria', 'Rua Gravataí', 120, '', 'Centro', 'Esteio', '93260010', '', 3, '130', 3, '', '400,00', 'Cerâmica', 'PVC', 'Reboco pintado e azulejos nas Área molhadas', 'Água Fria', 'Não', 'Não', 'Sim', 'Sim', 'Não', 'Sim', 'Não', 'Não', '357200', 'Sim', 'Não', 'Não', 'Sim', '6', '380000', 'Casa com valor diferenciado para rápida negociação. aproveite! Agende uma visita.', '', 'Casa de alvenaria em terreno 12m x 25m no centro, Rua Gravataí­. Possui peça comercial a  frente com banheiro, medindo 5m x 8m, seguida de casa com dois dormitório e garajão ao fundo com 1 dormitório, banheiro e churrasqueira.', '12m x 30m', '../imoveis/fotosprodutos/45902Garagem.jpg', '../imoveis/fotosprodutos/19152Cosinha.jpg', '../imoveis/fotosprodutos/85782Banheiro.jpg', '../imoveis/fotosprodutos/75592SalÃ£o de Festas.jpg', '../imoveis/fotosprodutos/17501ServiÃ§o.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(31, 4, 1, '2016-12-11', 18, 'Terreno', 'empreendimento', 'Rua Eduardo Santa Rita Nunes', 8, 'Lote 8 Esquerda', 'Lomba da Palmeira', 'Sapucaia do Sul', '93224000', '', 0, '240', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '92120', 'Sim', 'Não', '', '', '6', '98000', 'Avalia veículo com parte do pagamento.', 'Avalia redução no valor no caso de registro em contrato de menor valor (R$2.000)', 'Terreno alto no Bairro Recanto Verde em meio a  natureza e tranquilidade. Local em plena valorização ideal para construção e moradia. Ruas calçadas com energia elétrica e demais itens de infraestrutura disponí­veis.', '10m x 24m', '../imoveis/fotosprodutos/60048Entrada Recanto Verde.jpg', '../imoveis/fotosprodutos/19651Frontal 2.jpg', '../imoveis/fotosprodutos/46118Lateral.jpg', '../imoveis/fotosprodutos/61468LocalizaÃ§Ã£o.jpg', '../imoveis/fotosprodutos/19869Mapa Lote 8 Entrada Esquerda.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(32, 4, 1, '2016-12-11', 18, 'Terreno', 'empreendimento', 'Rua Eduardo Santa Rita Nunes', 9, 'Lote 8 Direita', 'Lomba da Palmeira', 'Sapucaia do Sul', '', 'RS', 0, '240', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '92120', 'Sim', 'Não', 'Sim', 'Não', '6', '98000', 'Avalia veículo como parte do pagamento.', '', 'Terreno alto no Bairro Recanto Verde em meio a  natureza e tranquilidade. Local em plena valorização ideal para construção e moradia. Ruas calçadas com energia elétrica e demais itens de infraestrutura disponí­veis.', '10m x 24m', '../imoveis/fotosprodutos/39368Entrada Recanto Verde.jpg', '../imoveis/fotosprodutos/76516Frontal.jpg', '../imoveis/fotosprodutos/75414Fundo.jpg', '../imoveis/fotosprodutos/5731LocalizaÃ§Ã£o.jpg', '../imoveis/fotosprodutos/26676Mapa Lote 8 Entrada Direita.jpg', 0, 1, 'Recanto Verde', 0, 0, 0, 0, 80, '', '', '', '0', 3),
(33, 4, 1, '2016-12-11', 18, 'Terreno', 'empreendimento', 'Rua Eduardo Santa Rita Nunes', 0, 'Eduardo Santa Rita N', 'Lomba da Palmeira', 'Sapucaia do Sul', '93224000', '', 0, '240', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '108100', 'Sim', 'Não', 'Sim', 'Não', '6', '115000', 'Avalia veículo como parte do pagamento.', 'Avalia reduçãoo no valor no caso de registro em contrato de menor valor (R$2.000)', 'Terreno alto no Bairro Recanto Verde em meio a  natureza e tranquilidade. Local em plena valorização ideal para construção e moradia. Ruas calçadas com energia elétrica e demais itens de infraestrutura disponí­veis.', '10m x 24m', '../imoveis/fotosprodutos/49741Esquina Meio.jpg', '../imoveis/fotosprodutos/56922Esquina Frontal.jpg', '../imoveis/fotosprodutos/43011Vista Interna.jpg', '../imoveis/fotosprodutos/58320LocalizaÃ§Ã£o.jpg', '../imoveis/fotosprodutos/73790Mapa Esquina Fundos.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(34, 4, 1, '2016-12-11', 0, 'Terreno', 'empreendimento', 'Rua Anibaldo Lehardt', 0, 'Lotes 25 e 26', 'Lomba da Palmeira', 'Sapucaia do Sul', '93224000', '', 0, '480', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '155000', 'Sim', 'Não', 'Sim', 'Não', '6', '165000', 'Avalia veículo como parte do pagamento.', 'Preço especial para registro em contrato de menor valor (R$1.500)', 'Terreno alto, medindo 20m x 24m, com 480m2, excelente vista, no Bairro Recanto Verde em meio a natureza e a  tranquilidade. Local em plena valorização ideal para construção e moradia. Ruas calçadas com energia elétrica e toda infraestrutura.', '20m x 24m', '../imoveis/fotosprodutos/77136Frente.jpg', '../imoveis/fotosprodutos/54720Fundo.jpg', '../imoveis/fotosprodutos/44583Lateral.jpg', '../imoveis/fotosprodutos/40143LocalizaÃ§Ã£o.jpg', '../imoveis/fotosprodutos/16552Mapa 2 Lotes Altos.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(35, 4, 1, '2017-01-30', 6, 'Casa', 'Alvenaria', 'Rua JosÃ Daniel dos Santos', 87, '', 'Boa Vista', 'Sapucaia do Sul', '93230-383', '', 3, '100', 2, '0', '0', 'Porcelanato', 'Chapa com gesso', 'Reboco pintado', 'Água Quente', 'Espera Split', 'Não', 'Não', 'Não', 'Não', 'Sim', 'Não', 'Não', '282000', 'Sim', 'Não', 'Sim', 'Sim', '6', '300000', 'Entrada parcelada Até entrega das chaves e saldo financiado.\r\nAvalia veículo na entrada.', 'Agendamentos:  51.99779-6402 (vivo e whats) ou 51.99685-0199.', 'Sobrado de 3 dormitório com 100 m2 de área construída, 3 suítes e pátio na frente e nos fundos, totalizando 70 m2. Vagas para 2 carros com pátio gramado.', '8,5x20', '../imoveis/fotosprodutos/79153Construtora Viga - Imagem Frontal Individual.jpg', '../imoveis/fotosprodutos/58105Construtora Viga - Imagem Sala de Estar Jantar.jpg', '../imoveis/fotosprodutos/9679Construtora Viga - Imagem SuÃ­te Privativa.jpg', '../imoveis/fotosprodutos/61187Cozinha, Jantar - Viga Construtora.jpg', '../imoveis/fotosprodutos/60591Construtora Viga - Imagem Fundos.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(37, 4, 1, '2017-03-20', 22, 'Apartamento', 'Cobertura', 'Rua Tomáz de Souza ', 36, 'Bloco 2 - Apto 42', 'Santos Dumont ', 'São Leopoldo', '93115-270', '', 3, '109', 0, '340,00', '250,00', 'Cerâmica', 'Chapa', 'Reboco pintado', 'Água Fria', '', 'Sim', 'Sim', 'Sim', 'Sim', 'Sim', 'Sim', 'Sim', '188000', 'Sim', 'Não', 'Sim', 'Sim', '6', '200000', 'Aceita Casa em Esteio ou Sapucaia.', 'Apartamento financiado com saldo devedor', 'Cobertura 3 domitório no Bairro Santos Dumont, no Residencial Parque Baviera Life. PrÃ³ximo ao Macro Atacado, na Rua Tomé de Souza.\r\nEm excelente estado de conservação, com área de lazer com churrasqueira e belíssima vista para a cidade na cobertura', '', '../imoveis/fotosprodutos/1972918.jpg', '../imoveis/fotosprodutos/12650unnamed.jpg', '../imoveis/fotosprodutos/449897.jpg', '../imoveis/fotosprodutos/2140211.jpg', '../imoveis/fotosprodutos/280675.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(38, 4, 1, '2017-04-21', 23, 'Apartamento', 'Padrão', 'Rua Manoel Serafim', 792, 'Bloco M 301', 'Centro', 'Sapucaia do Sul', '93220-250', '', 1, '40', 0, '2,00', '3,00', 'Cerâmica e Laminado', 'Chapa e gesso', 'Reboco pintado', 'Água Fria', 'Split 9.000 BTU e 2 Ventiladores', 'Não', 'Sim', 'Não', 'Sim', 'Sim', 'Não', 'Não', '150000', 'Sim', 'Não', 'Sim', 'Sim', '6', '160000', 'Apto para financiamento. Avalia opção de venda mobiliado', 'Conformar documentação', 'Apartamento no Residencial Ana Manoel na Rua Manoel Serafim, 792, no Centro com acesso a tudo. De 1 dormitório, no terceiro andar pronto para morar em estado impecável. Condomínio fechado com portaria 24 horas, salão de festas e playground.', '', '../imoveis/fotosprodutos/3604IMG-20170421-WA0000.jpg', '../imoveis/fotosprodutos/788IMG-20170421-WA0004.jpg', '../imoveis/fotosprodutos/14035IMG-20170421-WA0005.jpg', '../imoveis/fotosprodutos/83324IMG-20170421-WA0006.jpg', '../imoveis/fotosprodutos/75846IMG-20170421-WA0001.jpg', 0, 1, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(39, 4, 1, '2017-04-21', 24, 'Apartamento', 'Padrão', 'Rua 24 de Agosto', 1149, '103', 'Centro', 'Esteio', '93280000', '', 3, '120', 2, '', '', 'Laminado, Madeira', 'Gesso', 'Textura, Cerâmica', 'Água Quente', '2 Splits', 'Sim', 'Sim', 'Sim', 'Não', 'Sim', 'Sim', 'Não', '330.000,00', 'Sim', 'Não', 'Não', 'Sim', '6', '350000', 'Aceita imóvel de menor valor.\r\nApartamento mobiliado com mÃ³veis sob medida.', 'Livre para financiamento\r\nApartamento mobiliado com imóveis sob medida\r\n', 'Apartamento térreo localizado ao lado da pizzaria URCA em Esteio.', '', '../imoveis/fotosprodutos/81536Apartamento.jpg', '../imoveis/fotosprodutos/16997WhatsApp Image 2017-04-18 at 10.31.16.jpeg', '../imoveis/fotosprodutos/27175WhatsApp Image 2017-04-18 at 10.31.59.jpeg', '../imoveis/fotosprodutos/padrao.png', '../imoveis/fotosprodutos/padrao.png', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 2),
(40, 4, 1, '2017-04-23', 25, 'Apartamento', 'Padrão', 'Rua Santana', 597, '', 'Olímpica', 'Esteio', '93285-000', '', 2, '51', 1, '', '', 'Cerâmica', 'Chapa pintada', 'Reboco pintado', 'Água Fria', '', 'Não', 'Sim', 'Não', 'Sim', 'Sim', 'Não', 'Não', '128000', 'Sim', 'Não', 'Sim', 'Sim', '6', '136000', 'Pequena entrada + parcelas pelo Minha Casa Minha Vida.', 'Observar coleta de informações e docs.\r\nEntrega prevista para a partir de julho de 2017.', 'apartamentos de dois dormitório com: 51,36mÂ² de área privativa, 1 vaga de garagem, 2 salões de festas com churrasqueiras, quadra poliesportiva de areia, playground, guarita e sistema de coleta de lixo seletivo.', '', '../imoveis/fotosprodutos/98563Fachada.jpg', '../imoveis/fotosprodutos/19492Estar.jpg', '../imoveis/fotosprodutos/99894DormitÃ³rio.jpg', '../imoveis/fotosprodutos/60498Planta 1.jpg', '../imoveis/fotosprodutos/36108Vista geral.jpg', 0, 1, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(41, 4, 1, '2017-04-24', 26, 'Terreno', 'Padrão', 'Rua Gravataí', 295, '', 'Centro', 'Esteio', '93260010', '', 2, '320', 0, '', '', 'Madeira', 'PVC', 'Reboco pintado', 'Água Fria', 'Não', 'Não', 'Não', 'Sim', 'Não', 'Sim', 'Não', 'Não', '170000', 'Não', 'Sim', 'Sim', 'Sim', '6', '199000', 'Avalia veículo como parte do pagamento', 'Necessita inventário\r\n\r\nMatrícula 23246: Eli de FÃ¡tima da Silva Pinto', 'Terreno junto ao centro, na primeira quadra da Rua Gravataí­, medindo 8m x 40m e contendo duas casas. Na frente casa de alvenaria de dois dormitório que requer reforma e, ao fundo, casa de dois dormitório em alvenaria semidesmontada. ', '8m x 40m', '../imoveis/fotosprodutos/75137IMG_20170421_154153231.jpg', '../imoveis/fotosprodutos/81366IMG_20170421_154208429_HDR.jpg', '../imoveis/fotosprodutos/9773IMG_20170422_161753936_HDR.jpg', '../imoveis/fotosprodutos/77636IMG_20170422_161811842_HDR.jpg', '../imoveis/fotosprodutos/76957Mapa.jpg', 1, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(42, 4, 1, '2017-05-09', 27, 'Casa', 'Alvenaria', 'Rua Bartolomeu de Gusmão', 60, '', 'Novo Esteio', 'Esteio', '93270-400', '', 3, '130', 2, '', '300,00', 'Parquet e Cerâmica', 'Madeira', 'Reboco pintado', 'Água Fria', 'Não', 'Não', 'Não', 'Não', 'Não', 'Sim', 'Não', 'Não', '244400', 'Sim', 'Não', 'Sim', 'Sim', '6', '260000', 'Aceita veículo.\r\nPode ser financiado', 'Docs em dia', 'Casa de 3 dormitório com 130 m2 construídos no bairro Novo Esteio. Terreno 10m x 30m, plano, alto e seco. Casa sólida com peças amplas, garagem para 2 veículos e amplo pátio.', '10m x 30m', '../imoveis/fotosprodutos/5620Fachada.jpg', '../imoveis/fotosprodutos/86156Estar.jpg', '../imoveis/fotosprodutos/89019Banho.jpg', '../imoveis/fotosprodutos/54699Dorm 1.jpg', '../imoveis/fotosprodutos/76861Dorm 3.jpg', 1, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(43, 4, 1, '2017-06-04', 6, 'Casa', 'Alvenaria', 'Rua Eduardo Santa Rita Nunes', 90, '', 'Lomba da Palmeira', 'Sapucaia do Sul', '93225-550', '', 2, '53,8', 3, '0', '0', 'Cerâmica', 'Chapa', 'Reboco pintado', 'Água Quente', 'Espera Split', 'Não', 'Não', 'Não', 'Não', 'Sim', 'Não', 'Não', '164500', 'Sim', 'Não', 'Sim', 'Sim', '6', '175000', 'Entrada parcelada com FGTS + parcelas no valor de aluguel (mediante cadastro).\r\nAvalia veiculo na entrada.', 'Agenda de visitas com a construtora pelo fone 51.99779-6402 (vivo e whats).', 'Casa nova, 2 dormitório no bairro Lomba da Palmeira, Sapucaia do Sul. com dois domitório, 53,80 m2 de Ã¡rea construída, em 120 m2 de área privativa. Terreno 5,43m x 22m. Diferenciais: espera de água quente para cozinha e banheiro; espera elétrica', '5,43m x 22m', '../imoveis/fotosprodutos/19787unnamed (1).jpg', '../imoveis/fotosprodutos/32211unnamed (7).jpg', '../imoveis/fotosprodutos/58649unnamed (5).jpg', '../imoveis/fotosprodutos/2055unnamed (10).jpg', '../imoveis/fotosprodutos/91490unnamed (3).jpg', 1, 0, '', 0, 0, 0, 0, 0, '', '', '', '1', 3),
(44, 4, 1, '2017-06-25', 28, 'Apartamento', 'Padrão', 'Rua Rio Grande', 2255, 'Quadra 1, Bloco C, A', 'São Sebastião', 'Esteio', '93265-001', 'RS', 2, '68', 1, '137,00', '206,00', 'Cerâmica', 'Chapa pintada', 'Reboco pintado e Textura', 'Água Fria', 'Split no quarto do casal', 'Sim', 'Sim', 'Não', 'Sim', 'Sim', 'Não', 'Não', '155000', 'Não', 'Não', 'Não', 'Sim', '6', '165000', 'Inclui cozinha nova e guarda-roupas em MDF.\r\nSplit no dormitório do casal.\r\nVaga para carro coberta.', 'Contrato de compra e venda. Quitado.', 'Apartamento de 2 dormitório quitado na Morada de Esteio I. Térreo, com 68m2 em perfeito estado. Fica no imóvel cozinha nova e guarda-roupas novos.', '', '../imoveis/fotosprodutos/32875unnamed (4).jpg', '../imoveis/fotosprodutos/62847unnamed.jpg', '../imoveis/fotosprodutos/64243unnamed (5).jpg', '../imoveis/fotosprodutos/84507unnamed (1).jpg', '../imoveis/fotosprodutos/20634unnamed (2).jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(45, 4, 1, '2017-07-14', 29, 'Casa', 'Alvenaria', 'Rua Firmo Pereira de Vargas', 115, '', 'Vargas', 'Sapucaia do Sul', '93222-060', 'RS', 2, '130', 2, '', '', 'Cerâmica', 'PVC', 'Reboco pintado', 'Água Fria', 'Não', 'Não', 'Não', 'Sim', 'Não', 'Sim', 'Não', 'Não', '220000', 'Não', 'Sim', 'Sim', 'Sim', '6', '235000', 'Aceita carro', 'Necessita finalizar usocapião. Pode ser desmembrado', 'Casa de 2 dormitório em terreno 19m x 30m (irregular). Casa de 2 dormitório de 80m2. Segunda casa no terreno desocupada e propícia {Ã  demolição ou reforma. terreno pode ser desmembrado.', '19m x 30m', '../imoveis/fotosprodutos/65005unnamed (11).jpg', '../imoveis/fotosprodutos/97100unnamed (17).jpg', '../imoveis/fotosprodutos/8981unnamed (24).jpg', '../imoveis/fotosprodutos/39752unnamed (5).jpg', '../imoveis/fotosprodutos/65805unnamed (4).jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(46, 4, 1, '2017-08-11', 31, 'Casa', 'Alvenaria', 'Rua Castro Alves', 1338, '', 'Tamandaré', 'Esteio', '93260-460', 'RS', 3, '170', 3, '', '400,00', 'Cerâmica', 'Chapa', 'Reboco pintado e Textura', 'Água Quente', '', 'Sim', 'Sim', 'Sim', 'Não', 'Sim', 'Não', 'Não', '733200', 'Sim', 'Não', 'Sim', 'Sim', '6', '780000', 'Avalia veículo.', 'Documentação em dia', 'Casa de 3 dormitório com 170m2, em dois pisos com garagem e área para festas com churrasqueira.', '12mx 30m', '../imoveis/fotosprodutos/78216IMG_20170704_122150359.jpg', '../imoveis/fotosprodutos/51440IMG_20170704_122155472.jpg', '../imoveis/fotosprodutos/60627IMG_20170704_122132842_HDR.jpg', '../imoveis/fotosprodutos/83112IMG_20170704_122113645.jpg', '../imoveis/fotosprodutos/71054IMG_20170704_122155472.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(47, 4, 1, '2017-08-11', 30, 'Terreno', 'empreendimento', 'Luis Lopes', 385, '', 'Passo de Sapucaia', 'Sapucaia do Sul', '93228-190', '', 2, '1.890', 3, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '752000', 'Sim', 'Sim', 'Sim', 'Não', '6', '800000', 'Avalia veiculo, casa ou terreno no Bairro Tamandaré, Esteio.\r\nPossibilidade de desmembramento de área.', 'Em processo de legalização da documentação. Pagamento ITBI. Área propicia para empreendimento industrial', 'Terreno Industrial medindo 35m x 54m, plano e pronto para empreendimento. Possui excelente casa de madeira com 90m2 e dois pequenos galpões. Ao lado da RS 118, junto ao distrito industrial de Sapucaia. Possibilidade de desmembramento de área.', '35m x 54m', '../imoveis/fotosprodutos/861IMG_20170803_134152674_HDR (1).jpg', '../imoveis/fotosprodutos/10474IMG_20170803_141524784.jpg', '../imoveis/fotosprodutos/47578mAPA.png', '../imoveis/fotosprodutos/42640IMG_20170803_141449101.jpg', '../imoveis/fotosprodutos/89150IMG_20170803_134123357.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(48, 4, 1, '2017-08-11', 32, 'Rural', 'Mista', 'Rua das Acácias', 637, '', 'Centro', 'Portão', '93180-000', 'RS', 3, '80', 3, '', '', 'Cerâmica', 'PVC', 'Madeira Dupla', 'Água Fria', '', 'Não', 'Sim', 'Sim', 'Não', 'Sim', 'Não', 'Não', '210000', 'Não', 'Sim', 'Sim', 'Sim', '6', '222000', 'Avalia veiculo', 'Contrato de compra e venda em condomínio rural informal.', 'Belí­ssimo sí­tio com 2.000m2 com casa de madeira dupla de 3 dormitório e jardim de inverno com vidros temperados. Local aprazí­vel a 3 minutos do centro, gramado, arvoredo, horta e pracinha para as crianças.', '38m x 52m', '../imoveis/fotosprodutos/70182772730028743326.jpg', '../imoveis/fotosprodutos/37272.jpg', '../imoveis/fotosprodutos/765791.jpg', '../imoveis/fotosprodutos/245758.jpg', '../imoveis/fotosprodutos/150916.jpg', 1, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(49, 4, 1, '2017-08-27', 14, 'Apartamento', 'Padrão', 'Rua General Freitas', 197, '', 'Freitas', 'Sapucaia do Sul', '93218-170', '', 2, '52', 1, '', '', 'Cerâmica', 'Chapa pintada', 'Reboco pintado', 'Água Quente', '', '', '', 'Sim', 'Sim', 'Sim', 'Sim', 'Sim', '', 'Sim', 'Não', 'Sim', 'Sim', '', '182000', 'Imóvel financiável pela Caixa Econômica Federal;\r\nPequena entrada + parcelas;\r\nEntrada parcelada no período de obra.', 'Verificar condições de comissão com imopart', 'Condomínio Residencial em excelente localização na Rua General Freitas, 197, Bairro Freitas em Sapucaia. SÃ£o duas torres com elevador, piscinas adulto e infantil, salão de festas, churrasqueiras e Área de convívio, playground, bicicletário, tubul', '', '../imoveis/fotosprodutos/74099banner-obra-parque-brasil-mais-2017.png', '../imoveis/fotosprodutos/34678imagem cidade.png', '../imoveis/fotosprodutos/67389imagem entrada.png', '../imoveis/fotosprodutos/17734imagem-planta-parque-brasil-mais-2017.png', '../imoveis/fotosprodutos/52989imagem frente.png', 0, 1, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(50, 4, 1, '2017-08-27', 33, 'Terreno', '', 'Rua Américo Veríssimo', 0, 'Esquina com Rua Artu', 'São Sebastião', 'Esteio', '93265-322', 'RS', 0, '317', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '112800', '', '', 'Sim', 'Não', '6', '120000', 'Avalia veiculo', 'Imóvel com docs 100%', 'Terreno plano, alto e seco na esquina das Ruas Américo Verí­ssimo com Artur da Costa e Silva, enfrente ao Colégio Alberto Pasqualini. Pronto para construir com documentação 100% em dia.', '10,5x30', '../imoveis/fotosprodutos/8286Artur da Costa e Silva Esquina Ã¨rico VerÃ­ssimo 2.jpg', '../imoveis/fotosprodutos/14048Imagem.png', '../imoveis/fotosprodutos/96690Artur da Costa e Silva Esquina Ã¨rico VerÃ­ssimo (1).jpg', '../imoveis/fotosprodutos/padrao.png', '../imoveis/fotosprodutos/padrao.png', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(51, 4, 1, '2017-08-27', 33, 'Apartamento', 'Padrão', 'Rua Coronel Sarmento', 1035, '204', 'Centro', 'Gravataí', '94010-031', 'RS', 3, '90', 3, '200,00', '200,00', 'Cerâmica e Bruto', 'Chapa pintada e Gesso', 'Massa corrida', 'Água Quente', 'Espera Split', 'Não', 'Sim', 'Sim', 'Não', 'Sim', 'Não', 'Não', '329000', 'Sim', 'Não', 'Não', 'Não', '6', '350000', 'Avalia veiculo', 'Docs 100%', 'Apartamento novo, nunca ocupado no Residencia Vitta, Centro de Gravataí. SÃ£o 3 dormitório, 1 suí­te, sala, cozinha, banheiro, área de serviço, sacada com churrasqueira e 3 vagas na garagem. Espera para água quente. Instalado somente piso frio nos b', '', '../imoveis/fotosprodutos/6997Vitta.jpg', '../imoveis/fotosprodutos/77308Vitta CalÃ§ada.jpg', '../imoveis/fotosprodutos/32789Vitta Hall.jpg', '../imoveis/fotosprodutos/81565IMG_20160115_171611 (1).jpg', '../imoveis/fotosprodutos/61944IMG_20160115_171301.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(52, 4, 1, '2017-08-27', 33, 'Apartamento', 'Padrão', 'Av. Inconfidência', 1357, 'Bloco 7 - Apto 403', 'Marechal Rondon', 'Canoas', '92020-303', '', 2, '50', 1, '200,00', '200,00', 'Cerâmica e Laminado', 'Chapa pintada', 'Reboco pintado', 'Água Fria', '', 'Não', 'Sim', 'Sim', 'Sim', 'Sim', 'Não', 'Não', '155100', 'Sim', 'Não', 'Sim', 'Sim', '6', '165000', 'Avalia Veículo', 'Alugado', 'Condomí­nio Residencial Village Center localizado próximo ao Colégio Cristo Redentor, do Parkshopping Canoas e junto a todo tipo de comércio e serviços. Dois dormitório, estar, cozinha, banheiro social e piso em laminado na sala e dormitório com p', '', '../imoveis/fotosprodutos/34513Village Center - Fachada.jpg', '../imoveis/fotosprodutos/84010Village Center - Entrada.jpg', '../imoveis/fotosprodutos/3962020170109_104521.jpg', '../imoveis/fotosprodutos/6485920170109_104633.jpg', '../imoveis/fotosprodutos/4930620170109_105011.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(53, 4, 1, '2017-08-27', 34, 'Apartamento', 'Padrão', 'Rua Encantado', 1034, '', 'Zona Nova', 'Capão da Canoa', '95555-000', '', 2, '75', 1, '100,00', '600,00', 'Cerâmica', 'Chapa e Gesso', 'Massa corrida', 'Água Quente', '', 'Não', 'Sim', 'Sim', 'Não', 'Sim', 'Não', 'Não', '244400', 'Sim', 'Não', 'Sim', 'Não', '4', '260000', 'Avalia veiculo;\r\nPequena entrada + 60 parcelas direto com construtora.', 'Comissões divididas: 4% vendedor e 4% comprador.', 'A 3 quadras do mar, o Condado de Monte Cristo está localizado em uma das Área mais valorizadas do litoral Gaúcho: entre a charmosa praça da Av. Flávio Boianovski e a Av. Central. Além disso, o condomí­nio possui 28 apartamentos, sendo 4 apartamento', '', '../imoveis/fotosprodutos/74384Fachada.jpg', '../imoveis/fotosprodutos/20495Hall.jpg', '../imoveis/fotosprodutos/28463Mapa.jpg', '../imoveis/fotosprodutos/45993O CondomÃ­nio.jpg', '../imoveis/fotosprodutos/91992Planta Baixa com Sacada.jpg', 1, 1, 'Condado de Monte Cristo', 28, 9, 1, 4, 0, 'Sim', 'Não', 'Não', '0', 3),
(54, 4, 1, '2017-08-31', 21, 'Rural', '', '', 0, '', 'Cochilha', 'Amaral Ferrador', '96635-000', '', 3, '140000', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '140000', '', '', '', '', '', '165000', 'Avalia apartamento em POA e Canoas;\r\nAvalia veiculo.', 'DOCS 100%', 'Área com 14 hectares na Coxilha de Amaral Ferrador, a 18 km da cidade e 42 km de Encruzilhada do Sul, com: casa 4 quartos, sala grande, cozinha, 2 dispensas, Ã¡rea de lareira, churrasqueira e idade aproximada de 170 anos; 6 nascentes e mata nativa.', '', '../imoveis/fotosprodutos/30362Aerea 1.jpg', '../imoveis/fotosprodutos/42073Aerea 3.jpg', '../imoveis/fotosprodutos/74600PÃ¡tio 3.jpg', '../imoveis/fotosprodutos/16842Campo.jpg', '../imoveis/fotosprodutos/52139Lavoura FeijÃ£o.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(57, 4, 1, '2017-09-03', 35, 'Apartamento', 'Padrão', 'Av Central', 127, '', 'Zona Nova', 'Capão da Canoa', '95555-000', '', 2, '60 a 85', 1, '', '', 'Porcelanato', 'Chapa e Gesso', 'Massa corrida', 'Água Quente', 'Espera Split', 'Não', 'Sim', 'Sim', 'Não', 'Não', 'Não', 'Não', '375350', 'Sim', 'Não', 'Sim', 'Sim', '4', '391000', 'Avalia veiculo;\r\nEntrada + 60 parcelas direto com construtora.', 'vários imóveis na cidade\r\nComissões divididas: 4% para vendedor e 4% para comprador.', 'Localizado a quatro quadras do mar, o Le Privilège\r\nResidence possui 2 e 3 dormitório com suítes decorado, salão de festas, garagem e acabamentos classe AA em excelente localização. O projeto da sua felicidade estão aqui, na melhor praia gaúcha.', '', '../imoveis/fotosprodutos/52446Fachada.jpg', '../imoveis/fotosprodutos/99962Cozinha.jpg', '../imoveis/fotosprodutos/79887Apre4sentaÃ§Ã£o.jpg', '../imoveis/fotosprodutos/321763 dormitÃ³rios.jpg', '../imoveis/fotosprodutos/325422 dormitÃ³rios sem sacada.jpg', 0, 1, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(60, 4, 1, '2017-09-17', 36, 'Casa', 'Padrão', 'Rua José Martins', 447, '', 'Tamandaré', 'Esteio', '93260-380', 'RS', 2, '80', 2, '', '200,00', 'Cerâmica', 'Madeira', 'Reboco pintado', 'Água Fria', 'Não', 'Não', 'Não', 'Não', 'Não', 'Sim', 'Não', 'Não', '141000', 'Sim', 'Não', 'Não', 'Sim', '6', '150000', 'Avalia veiculo', 'Em Processo de inventário', 'Terreno 6m x 36m, com duas casas próximo aos bombeiros no Bairro TamandarÃ©. Ãrea residencial próxima Ã  escolas, centro comercial e a transporte de metrô e ônibus.', '6m x 36m', '../imoveis/fotosprodutos/94953unnamed (11).jpg', '../imoveis/fotosprodutos/14058unnamed.jpg', '../imoveis/fotosprodutos/26968unnamed (4).jpg', '../imoveis/fotosprodutos/60888unnamed (6).jpg', '../imoveis/fotosprodutos/65782Mapa.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3),
(61, 4, 1, '2017-09-17', 35, 'Terreno', 'Padrão', 'Rua Osvaldo Cruz', 50, '', 'Teópolis', 'Esteio', '93260-590', 'RS', 0, '160', 0, '', '200,00', '', '', '', '', '', '', '', '', '', '', '', '', '150000', 'Sim', 'Não', 'Não', 'Não', '6', '170000', 'Avalia veiculo', '100% documentado', 'Terreno 8m x 20m, alto e plano em local nobre da cidade e pronto para construir;\r\nPróximo ao hospital de Esteio em travessa entre as Ruas Castro Alves e Rio Pardo.\r\n', '8m x 20m', '../imoveis/fotosprodutos/77269IMG_20170516_115057027_HDR.jpg', '../imoveis/fotosprodutos/973741.jpg', '../imoveis/fotosprodutos/26226IMG_20170516_120621925.jpg', '../imoveis/fotosprodutos/247882.jpg', '../imoveis/fotosprodutos/95951Mapa.jpg', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3);
INSERT INTO `imovel` (`idimo`, `idusu`, `ativo`, `datacadimo`, `idcliven`, `tipoimo`, `tipo`, `lougradouro`, `numero`, `bloco`, `bairro`, `cidade`, `cep`, `estado`, `numdormimo`, `areaimo`, `vagasimo`, `valorcondominioimo`, `valoriptuimo`, `piso`, `tetoimo`, `paredesimo`, `hidraulicaimo`, `arcondicionadoimo`, `armariosimo`, `salaofestaimo`, `churrasqueiraimo`, `portariaimo`, `areaservicoimo`, `piscinaimo`, `academiaimo`, `valorimo`, `planoimo`, `inclinadoimo`, `gramadoimo`, `calcadoimo`, `comissaoimo`, `valorvendaimo`, `observacao1`, `observacao2`, `observacao3`, `medidasimo`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `destaqueimo`, `empreendimento`, `nomeempreendimento`, `numunidades`, `numandares`, `numpredios`, `aptosporandar`, `numlotes`, `esperasplit`, `sacada`, `quadraesporte`, `mcmv`, `idcap`) VALUES
(62, 4, 1, '2017-09-25', 6, 'Casa', 'Alvenaria', 'Rua José Daniel dos Santos', 101, '', 'Boa Vista', 'Sapucaia do Sul', '93230-383', '', 3, '100', 2, '', '', 'Porcelanato', 'Gesso', 'Massa corrida', 'Água Quente', 'Espera para Split', 'Não', 'Não', 'Não', 'Não', 'Sim', 'Não', 'Não', '288000', 'Sim', 'Não', 'Sim', 'Sim', '6', '300000', 'Entrada parcelada Até Agosto de 2018;\r\nSaldo financiado.', 'Agendar visitas com construtora.', 'Sobrado de 3 dormitórios com 100 m2 de área construída, 3 suítes e pátio na frente e nos fundos, totalizando 70 m2. Vagas para 2 carros com pátio gramado. Acesso fácil à Avenida João Pereira de Vargas e RS 118. Entrega Agosto/2018.', '5,5m x 22m', '../imoveis/fotosprodutos/48323Viga Construtora - Fachada 01.jpg', '../imoveis/fotosprodutos/6787Contrutora Viga - Sala de Jantar.jpg', '../imoveis/fotosprodutos/24821Construtora Viga - SuÃ­te Master.jpg', '../imoveis/fotosprodutos/23989Contrutora Viga - DormitÃ³rio 02.jpg', '../imoveis/fotosprodutos/55275Construtora Viga - DormitÃ³rio 03.jpg', 1, 0, '', 0, 0, 0, 0, 0, '', '', '', '0', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `idcliven` int(11) DEFAULT NULL,
  `idusu` int(11) DEFAULT NULL,
  `idimo` int(11) DEFAULT NULL,
  `idmens` int(11) NOT NULL,
  `assuntomens` varchar(150) NOT NULL,
  `descricaomens` varchar(500) NOT NULL,
  `datamens` varchar(20) NOT NULL,
  `horamens` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `mensagem`
--

INSERT INTO `mensagem` (`idcliven`, `idusu`, `idimo`, `idmens`, `assuntomens`, `descricaomens`, `datamens`, `horamens`) VALUES
(4, 6, 1, 10, 'tentei', 'tentando', '2017-10-14', '12:08:12'),
(0, 4, 1, 11, 'Anúncio Jornal VS', 'anunciado no classificados on line VS.', '2017-10-15', '00:00:16'),
(4, 4, 1, 13, 'Anúncio Jornal VS', 'Anuncio no VS online', '2017-10-19', '00:00:12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusu` int(10) UNSIGNED NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `creci` varchar(10) DEFAULT NULL,
  `funcao` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fonecel` varchar(15) DEFAULT NULL,
  `foneres` varchar(15) DEFAULT NULL,
  `login` varchar(200) DEFAULT NULL,
  `senha` varchar(8) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` varchar(8) NOT NULL,
  `cnai` int(11) NOT NULL,
  `cidade` varchar(80) NOT NULL,
  `datacad` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`idusu`, `nome`, `creci`, `funcao`, `email`, `fonecel`, `foneres`, `login`, `senha`, `foto`, `status`, `cnai`, `cidade`, `datacad`) VALUES
(4, 'Dalmo Souza', '54873', 'Corretor', 'dalmo@radardosimoveis.com.br', '51995513505', '5134735512', 'dalmo', 'Dalmo', '27102016_dalmo.jpg', 'Ativo', 111111111, 'Esteio', '2016-10-27'),
(6, 'Jeferson Leon', '00000', 'Usuário', 'jeferson@radardosimoveis.com.br', '5191128510', '5555555555', 'leon', '1', '29102016_IMG_20160912_113639638.jpg', 'Ativo', 0, 'Cachoeirinha', '2016-10-28'),
(10, 'Pedro Henrique Comassetto', '', 'Captador', 'pedrocomassetto@gmail.com', '51995728930', '', 'Pedro', 'Pedro', '21042017_14519720_1413219478706845_4431977291632058584_n.jpg', 'Ativo', 0, 'Esteio', '2017-04-20'),
(14, 'Wesley Schneider', '777777777', 'Usuário', 'wesleyschneideraires@gmail.com', '51515151544', '5555555555', 'wesley', '1', '02102017_IMG-20170914-WA0001.jpg', 'Ativo', 777777777, 'Sapucaia do Sul', '2017-10-02');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `captador`
--
ALTER TABLE `captador`
  ADD PRIMARY KEY (`idcap`);

--
-- Índices de tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`idcidade`);

--
-- Índices de tabela `clientecomprador`
--
ALTER TABLE `clientecomprador`
  ADD PRIMARY KEY (`idclicom`);

--
-- Índices de tabela `clientevendedor`
--
ALTER TABLE `clientevendedor`
  ADD PRIMARY KEY (`idcliven`);

--
-- Índices de tabela `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`idhistorico`);

--
-- Índices de tabela `imovel`
--
ALTER TABLE `imovel`
  ADD PRIMARY KEY (`idimo`),
  ADD KEY `idcap` (`idcap`);

--
-- Índices de tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`idmens`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusu`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `captador`
--
ALTER TABLE `captador`
  MODIFY `idcap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `idcidade` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `clientecomprador`
--
ALTER TABLE `clientecomprador`
  MODIFY `idclicom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `clientevendedor`
--
ALTER TABLE `clientevendedor`
  MODIFY `idcliven` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `idhistorico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `imovel`
--
ALTER TABLE `imovel`
  MODIFY `idimo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT de tabela `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `idmens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

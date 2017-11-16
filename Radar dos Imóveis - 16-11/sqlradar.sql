CREATE TABLE tipo (
  idtipousu INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tipo VARCHAR NULL,
  PRIMARY KEY(idtipousu)
);

CREATE TABLE Cliente (
  idcli INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nomecli VARCHAR(150) NULL,
  cpfcli VARCHAR(15) NULL,
  rgcli VARCHAR(15) NULL,
  emailcli VARCHAR(255) NULL,
  lougradourocli VARCHAR(150) NULL,
  numerocli INTEGER UNSIGNED NULL,
  bairroci VARCHAR(80) NULL,
  estadocli VARCHAR(50) NULL,
  cidadecli VARCHAR(80) NULL,
  cepcli VARCHAR(10) NULL,
  datanascli DATE NULL,
  PRIMARY KEY(idcli)
);

CREATE TABLE usuario (
  idusu INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tipo_idtipousu INTEGER UNSIGNED NOT NULL,
  nome VARCHAR(150) NULL,
  creci VARCHAR(10) NULL,
  dataaniversario DATE NULL,
  email VARCHAR(255) NULL,
  fonecel VARCHAR(15) NULL,
  foneres VARCHAR(15) NULL,
  login VARCHAR(200) NULL,
  senha VARCHAR(8) NULL,
  foto VARCHAR(255) NULL,
  tipo INTEGER UNSIGNED NULL,
  PRIMARY KEY(idusu, tipo_idtipousu),
  INDEX usuario_FKIndex1(tipo_idtipousu),
  FOREIGN KEY(tipo_idtipousu)
    REFERENCES tipo(idtipousu)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE imovel (
  idimo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  usuario_idusu INTEGER UNSIGNED NOT NULL,
  Cliente_idcli INTEGER UNSIGNED NOT NULL,
  usuario_tipo_idtipousu INTEGER UNSIGNED NOT NULL,
  idusu INTEGER UNSIGNED NULL,
  datacadimo DATE NULL,
  idcli INTEGER UNSIGNED NULL,
  tipoimo VARCHAR(150) NULL,
  numdormimo INTEGER UNSIGNED NULL,
  areaimo VARCHAR(100) NULL,
  vagasimo INTEGER UNSIGNED NULL,
  valorcondominioimo DECIMAL NULL,
  valoriptuimo DECIMAL NULL,
  piso VARCHAR(100) NULL,
  tetoimo VARCHAR(100) NULL,
  paredesimo VARCHAR(100) NULL,
  hidraulicaimo VARCHAR(100) NULL,
  arcondicionadoimo VARCHAR(100) NULL,
  armariosimo VARCHAR(100) NULL,
  salaofestaimo VARCHAR(100) NULL,
  churrasqueiraimo VARCHAR(100) NULL,
  portariaimo VARCHAR(100) NULL,
  areaservicoimo VARCHAR(100) NULL,
  piscinaimo VARCHAR(100) NULL,
  academiaimo VARCHAR(100) NULL,
  valorimo DECIMAL NULL,
  planoimo VARCHAR(100) NULL,
  inclinadoimo VARCHAR(100) NULL,
  gramadoimo VARCHAR(100) NULL,
  calcadoimo VARCHAR(100) NULL,
  comissaoimo DECIMAL NULL,
  valorvendaimo DECIMAL NULL,
  observacao1 VARCHAR(255) NULL,
  observacao2 VARCHAR(255) NULL,
  medidasimo VARCHAR(100) NULL,
  imoveltipoimo VARCHAR(100) NULL,
  foto1 VARCHAR(255) NULL,
  foto2 VARCHAR(255) NULL,
  foto3 VARCHAR(255) NULL,
  foto4 VARCHAR(255) NULL,
  foto5 VARCHAR(255) NULL,
  PRIMARY KEY(idimo, usuario_idusu, Cliente_idcli, usuario_tipo_idtipousu),
  INDEX imovel_FKIndex1(usuario_idusu, usuario_tipo_idtipousu),
  INDEX imovel_FKIndex2(Cliente_idcli),
  FOREIGN KEY(usuario_idusu, usuario_tipo_idtipousu)
    REFERENCES usuario(idusu, tipo_idtipousu)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Cliente_idcli)
    REFERENCES Cliente(idcli)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);



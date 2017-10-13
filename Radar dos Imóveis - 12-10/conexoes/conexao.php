<?php
 /*************************************************************************************************************  
 * @author JEFERSON LEON                                                                                   *  
 * Data: 17/10/2016                                                                                           *  
 * Descrição: Classe elaborada com o objetivo de auxlilar nas operações CRUDs em diversos SGBDS, possui       *  
 * funcionalidades para construir instruções de INSERT, UPDATE E DELETE onde as mesmas podem ser executadas   *  
 * nos principais SGBDs, exemplo SQL Server, MySQL e Firebird. Instruções SELECT são recebidas integralmente  *  
 * via parâmetro.                                                                                             *  
 *************************************************************************************************************/  


/*
 * Constantes de parâmetros para configuração da conexão
 */
define('SGBD', 'mysql');
define('HOST', 'localhost');
define('DBNAME', 'radardos_imoveis');
define('CHARSET', 'utf8');
define('USER', 'radardosimoveisc');
define('PASSWORD', 'Alterar1234');
define('SERVER', 'linux');
ini_set('default_charset','UTF-8');


class conexao {
    
    /*
     * Atributo estático de conexão
     */
    private static $pdo;
    public $stmt;
    public $rs;

    /*
     * Escondendo o construtor da classe
     */

    /*
     * Método privado para verificar se a extensão PDO do banco de dados escolhido
     * está habilitada
     */
    private static function verificaExtensao() {

        switch(SGBD):
            case 'mysql':
                $extensao = 'pdo_mysql';
                break;
            case 'mssql':{
                if(SERVER == 'linux'):
                    $extensao = 'pdo_dblib';
                else:
                    $extensao = 'pdo_sqlsrv';
                endif;
                break;
            }
            case 'postgre':
                $extensao = 'pdo_pgsql';
                break;
        endswitch;

        if(!extension_loaded($extensao)):
            echo "<h1>Extensão {$extensao} não habilitada!</h1>";
            exit();
        endif;
    }

    /*
     * Método estático para retornar uma conexão válida
     * Verifica se já existe uma instância da conexão, caso não, configura uma nova conexão
     */
    public static function getInstance() {

        self::verificaExtensao();

        if (!isset(self::$pdo)) {
            try {
                $opcoes = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
                switch (SGBD) :
                    case 'mysql':
                        self::$pdo = new \PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . ";", USER, PASSWORD, $opcoes);
                        break;
                    case 'mssql':{
                        if(SERVER == 'linux'):
                            self::$pdo = new \PDO("dblib:host=" . HOST . "; database=" . DBNAME . ";", USER, PASSWORD, $opcoes);
                        else:
                            self::$pdo = new \PDO("sqlsrv:server=" . HOST . "; database=" . DBNAME . ";", USER, PASSWORD, $opcoes);
                        endif;
                        break;
                    }
                    case 'postgre':
                        self::$pdo = new \PDO("pgsql:host=" . HOST . "; dbname=" . DBNAME . ";", USER, PASSWORD, $opcoes);
                        break;
                endswitch;
                self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                print "Erro: " . $e->getMessage();
            }
        }
        return self::$pdo;
    }

    public static function isConectado(){
        
        if(self::$pdo):
            return true;
        else:
            return false;
        endif;
    }

    public function disconnect(){
        if(self::$pdo){
            self::$pdo = null;
            $stmt = null;
            $rs = null;
        }
    }



        public function query($rawQuery, $params = array()){
            try{
                $con = self::getInstance();
                $stmt = $con->prepare($rawQuery);

                $this->setParams($stmt, $params);//Foi criado uma nova função para setar varios parametros

                $stmt->execute();

                return $stmt;
            }catch(PDOException $e){
                throw new Exception("Erro na Query".$e);
            }finally{
                $this->disconnect();
            }
            
        }

        //função de setar vários parametros
        private function setParams($statment, $parameters = array()){
            foreach ($parameters as $key => $value) {
                $this->setParam($statment, $key, $value);//Foi criado uma função para setar um parametro
            }
        }

        //função para setar um parametro
        private function setParam($statment, $key, $value){
            $statment->bindParam($key, $value);
        }

        //Função para pesquisar
        public function select($rawQuery, $params = array()){
            $stmt = $this->query($rawQuery, $params);//Puxa a função de preparar a query

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

    }
    /**/


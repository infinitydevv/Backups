<?php
 
// inclui o arquivo de inicialização
require '../conexoes/conexao.php';
 
// resgata variáveis do formulário
$login = isset($_POST['login']) ? $_POST['login'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

 
if (empty($login) || empty($senha))
{
    session_start();
    $_SESSION['msgc'] = '<div class="alert alert-danger" role="alert">Informe login e senha!</div>';
    header("Location: ../login-cliente.php");
    exit;
}
 
$conexao = conexao::getInstance();
 
$sql = "SELECT * FROM clientevendedor WHERE login = :login AND senha = :senha";
$stmt = $conexao->prepare($sql);
 
$stmt->bindValue(':login', $login);
$stmt->bindValue(':senha', $senha);
 
$stmt->execute();
 
$rs = $stmt->fetchAll(PDO::FETCH_OBJ);
 
if (count($rs) <= 0){
    	session_start();
        $_SESSION['msgc'] = '<div class="alert alert-danger" role="alert">Login ou senha inválidos!</div>';
        header("Location: ../login-cliente.php");
        exit;
}
 
// pega o primeiro usuário
$user = $rs[0];
 
session_start();
$_SESSION['logged_in_cli'] = true;
$_SESSION['idsession'] = session_id();
$_SESSION['login_cliente'] =  $user->login;
$_SESSION['senha_cliente'] =  $user->senha;
$_SESSION['nomecompleto_cliente'] = $user->nomecliven;
$_SESSION['idcliente'] = $user->idcliven;
 
header('Location: ../area-cliente.php');

$conn = new conexao();
$conn->disconnect();
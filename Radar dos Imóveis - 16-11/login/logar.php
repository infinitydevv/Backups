<?php
 
// inclui o arquivo de inicialização
require '../conexoes/conexao.php';
 
// resgata variáveis do formulário
$login = isset($_POST['login']) ? $_POST['login'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

$pos1 = "/[a-zA-Z0-9]/";
$re = array();


 
if (empty($login) || empty($senha))
{
    session_start();
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Informe login e senha!</div>';
    header("Location: ../login.php");
    exit;
}
if(preg_match($pos1, $login)){
 
    $conexao = conexao::getInstance();
     
    $sql = "SELECT * FROM usuario WHERE login = :login AND senha = :senha";
    $stmt = $conexao->prepare($sql);
     
    $stmt->bindValue(':login', $login);
    $stmt->bindValue(':senha', $senha);
     
    $stmt->execute();
     
    $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
    if (count($rs) <= 0){
    	session_start();
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Login ou senha inválidos!</div>';
        header("Location: ../login.php");
        exit;
    }
     
    // pega o primeiro usuário
    $user = $rs[0];
     
    @session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['idsession'] = session_id();
    $_SESSION['login_usuario'] =  $user['login'];
    $_SESSION['senha_usuario'] =  $user['senha'];
    $_SESSION['nomecompleto_usuario'] = $user['nome'];
    $_SESSION['img_usuario'] = $user['foto'];
    $_SESSION['iduser'] = $user['idusu'];
     
    header('Location: ../area.php');

    $conn = new conexao();
    $conn->disconnect();
}else{
    session_start();
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Não é permitido espaços no login ou na senha!</div>';
    header("Location: ../login.php");
    exit;
}
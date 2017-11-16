<?php
 
// inclui o arquivo de inicialização

require '../conexoes/conexao.php';
require 'functions-cliente.php';
require '../bibliotecas/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
 
// resgata variáveis do formulário
$email = isset($_POST['email']) ? $_POST['email'] : '';


if(empty($email)){
    session_start();
    $_SESSION['msgc'] = '<div class="alert alert-danger" role="alert">Informe o email!</div>';
    header("Location: ../login-cliente.php");
    exit;
}

if(validMail($email)){
    $conexao = conexao::getInstance();
         
    $sql = "SELECT * FROM clientevendedor WHERE email = :email";
    $stmt = $conexao->prepare($sql);
         
    $stmt->bindValue(':email', $email);
         
    $stmt->execute();
         
    $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
     
    if (count($rs) <= 0){
    	session_start();
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Email inválido!</div>';
        header("Location: ../login-cliente.php");
        exit;
    }else{
        $conexao = conexao::getInstance();

        $sql = "UPDATE clientevendedor SET senha = :senha where email = :email";
        $stmt = $conexao->prepare($sql);
         
        $stmt->bindValue(':senha', str_shuffle("1234567890abcdefghijklmnopqrstuvwxyz"));
        $stmt->bindValue(':email', $email);
         
        $stmt->execute();

//-------------------------------------------------------------------------------------------
         
        $sql = "SELECT * FROM clientevendedor WHERE email = :email";
        $stmt = $conexao->prepare($sql);
         
        $stmt->bindValue(':email', $email);
         
        $stmt->execute();
         
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $user = $rs[0];

        $senhaAtt = $user['senha'];
        $nome = $user['nomecliven'];
        $mensagem = "Caro senhor(a) " .$nome. ", sua solicitação de senha foi aprovada. Sua senha foi modificada para: ".$senhaAtt. "<br>Att Wesley Schneider, Radar dos Imóveis.";

        $mail = new PHPMailer;
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'mail.radardosimoveis.com.br';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "wesley@radardosimoveis.com.br";
        $mail->Password = "wesley123";
        $mail->setFrom('wesley@radardosimoveis.com.br', 'Wesley Schneider on Radar dos Imóveis');
        //$mail->addReplyTo('replyto@example.com', 'First Last');

        $mail->addAddress($email, $nome);
        $mail->Subject = 'Sua senha foi Atualizada!';
        
        $mail->msgHTML($mensagem);
        $mail->AltBody = $mensagem;
        $mail->addAttachment('images/phpmailer_mini.png');

        if (!$mail->send()) {
            session_start();
            $_SESSION['msgc'] = '<div class="alert alert-danger" role="alert">Erro!</div>';
        } else {
            session_start();
            $_SESSION['msgc'] = '<div class="alert alert-success" role="alert">Senha alterada, confira seu email!</div>';
        }
        function save_mail($mail)
        {
            //You can change 'Sent Mail' to any other folder or tag
            $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

            //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
            $imapStream = imap_open($path, $mail->Username, $mail->Password);

            $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
            imap_close($imapStream);

            return $result;
        }
        header("Location: ../login-cliente.php");

    }
}else{
    session_start();
    $_SESSION['msgc'] = '<div class="alert alert-danger" role="alert">Email inválido!</div>';
    header("Location: ../login-cliente.php");
    exit;
}
     
    

    //$conn = new conexao();
   // $conn->disconnect();
//}else{
   // session_start();
   // $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Não é permitido espaços no login ou na senha!</div>';
   // header("Location: ../login.php");
   // exit;
//}
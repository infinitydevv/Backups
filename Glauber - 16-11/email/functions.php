<?php 
	require '../bibliotecas/vendor/autoload.php';
	use PHPMailer\PHPMailer\PHPMailer;

	function validMail($email){
		if(preg_match('/^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/',$email)){
			return TRUE;
		}else{
			return FALSE;
		}
	}


	function enviarMail($email, $titulo, $mensagem, $nome){
			$mail = new PHPMailer;
	        $mail->CharSet = 'UTF-8';
	        $mail->isSMTP();
	        $mail->SMTPDebug = 0;
	        $mail->Host = 'mail.profglauber.com.br';
	        $mail->Port = 587;
	        $mail->SMTPSecure = 'tls';
	        $mail->SMTPAuth = true;
	        $mail->Username = "no-reply@profglauber.com.br";
	        $mail->Password = "profglauber123";
	        $mail->setFrom('no-reply@profglauber.com.br', 'Prof. Glauber Gonçalves');
	        //$mail->addReplyTo('replyto@example.com', 'First Last');
	        $corpo = "<div style='background-color: #dcdcdc; padding: 150px;'><div style='background-color: #fff; padding: 50px 30px; border-radius: 10px;'><center><a href='https://profglauber.com.br' style='text-decoration: none;'><img src='https://profglauber.com.br/img/logoglauber.png' width='150'><br><h1 style='border-bottom: 1px solid #dcdcdc;'>Prof. Glauber Gonçalves</h1></a><div style='padding: 20px;'><h1>".$titulo."</h1><p style='font-size: 14pt; color: #000;'>".$mensagem."</p></div></center><hr><center><a href='teste' style='text-decoration: none;'>Desenvolvido por<br><img src='https://profglauber.com.br/img/logo-InfinityDev.png' width='100'></a></center></div></div>";
	        $mail->addAddress($email, $nome);
	        $mail->Subject = $titulo;
	        
	        $mail->msgHTML($corpo);
	        $mail->AltBody = $corpo;
	        $mail->addAttachment('images/phpmailer_mini.png');

	        if (!$mail->send()) {
	            return false;
	        } else {
	            return true;
	        }
	}
?>
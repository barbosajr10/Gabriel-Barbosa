<?php
date_default_timezone_set('America/Sao_Paulo');

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$nome = isset($_POST['nome']) ? $_POST['nome'] : 'Não Informado';
$email = isset($_POST['nome']) ? $_POST['nome'] : 'Não Informado';
$assunto = isset($_POST['nome']) ? $_POST['nome'] : 'Não Informado';
$mensagem = isset($_POST['nome']) ? $_POST['nome'] : 'Não Informado';
$data = date('d/m/y H:i:s');

if($email && $mensagem){
    $mail = new PHPMailer();

	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'gabriellbarbosamimi@gmail.com';
	$mail->Password = 'senha954386';
	$mail->Port = 587;

	$mail->setFrom('gabriellbarbosamimi@gmail.com');
	$mail->addAddress('gabriellbarbosamimi@gmail.com');
	
	$mail->isHTML(true);
	$mail->Subject = $assunto;
    $mail->Body = "Nome: {$nome}<br>
                   Email: {$email}<br>
                   Assunto: {$assunto}<br>
                   Mensagem: {$mensagem} <br>
                   Data: {$data}";

	if($mail->send()) {
		echo 'Email enviado com sucesso.';
	} else {
		echo 'Email nao enviado.';
	}
}else{
    echo 'Email não enviado, Informar o email e a mensagem.';
}
?>
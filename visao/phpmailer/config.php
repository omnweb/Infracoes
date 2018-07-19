<?php

function sendMail($assunto, $mensagem, $remetente, $nomeRemetente, $destino, $nomeDestino){

	require_once('mailer/class.phpmailer.php');

	$mail = new PHPMailer(); //INICIA A CLASSE

	$mail->IsSMTP(); //Habilita envio SMTP
	$mail->SMTPAuth = true; //Ativa email autenticado
	//$mail->Host = 'smtp.gmail.com'; 
	//configurações para o hotmail
	$mail->Host = 'smtp.live.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	//$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	//$mail->Port = 465; 
	$mail->Username = 'netomatiazi@hotmail.com';
	$mail->Password = 'neto2002';

	$mail->From = $remetente; //Remetente
	$mail->FromName = utf8_decode($nomeRemetente); //Remetente nome

	$mail->IsHTML(true);

	$mail->Subject = utf8_decode($assunto); //Assunto
	$mail->Body = utf8_decode($mensagem); //Mensagem
	$mail->AddAddress($destino,utf8_decode($nomeDestino)); //Email e nome do destino - repetir essa linha se for enviar para mais do que um destinatario
	//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia 
	//$mail->AddBCC('beltrano@site.net', 'Beltrano'); // Cópia Oculta 
	// Define os anexos (opcional) 
	//$mail->AddAttachment("../figuras/carrinho.jpg");  // Insere um anexo 

	$ret = $mail->Send();
	// Limpa os destinatários e os anexos
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();

	if($ret){
		return true;
	}
	else{
			return false;
	}
}
?>
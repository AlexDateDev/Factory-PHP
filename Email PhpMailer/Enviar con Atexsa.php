<?php
// ----------------------------------------------------------------------------
// Envio con Atexsa
//
//
//
// Date : 21/02/2014
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->From = 'asole@atexsa.es';
$mail->FromName = 'Alex Sole';
$mail->Subject = 'Asunto';
$body = 'Cuerpo del mensaje';
$mail->MsgHTML($body);
$mail->IsHTML(true);
/* Atexsa */
$mail->Host = '192.168.2.3';
$mail->Port = 25;
$mail->Username = 'etransnetdesarrollo';
$mail->Password = 'EDatexsa1';
$mail->SMTPAuth = true;
if(!$mail->Send()) {alert( 'Error enviando: ' . $mail->ErrorInfo );} else {    echo 'Enviado';    }}

                      
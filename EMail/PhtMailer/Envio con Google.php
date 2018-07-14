<?php
// ----------------------------------------------------------------------------
// Envio com Google
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

$mail->AddAddress( 'asole@atexsa.es');
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'alex.atexsa@gmail.com';
$mail->Password = 'alex1atexsa';

$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';

if(!$mail->Send()) {             
    alert( 'Error enviando: ' . $mail->ErrorInfo );
} else {
    echo 'Enviado';
}


<?php
// ----------------------------------------------------------------------------
// Enviar email con archivo anexado
//
// Date : 10/05/2015
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------
?>

/*
Interessant
http://blog.unijimpe.net/introduccion-a-phpmailer/
*/

Enviar un correo con un archivo anexado con mail

$content = chunk_split(base64_encode($content));
$mailto = 'alex.sole@antaviana.cat';
//$from_name = 'Alex Sole';
//$from_mail = 'sender@domain.com';
//$replyto = 'sender@domain.com';
$uid = md5(uniqid(time()));
$subject = 'Hemovigilancia';
$message = 'NOTIFICACION INICIAL DE REACCION TRANSFUSIONAL';
$filename = 'documento1.pdf';

$header = '';
//$header = "From: ".$from_name." <".$from_mail.">\r\n";
//$header .= "Reply-To: ".$replyto."\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
$header .= "This is a multi-part message in MIME format.\r\n";
$header .= "--".$uid."\r\n";
$header .= "Content-type:text/plain; charset=UTF-8\r\n";
$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$header .= $message."\r\n\r\n";
$header .= "--".$uid."\r\n";
$header .= "Content-Type: application/pdf; name=\"".$filename."\"\r\n";
$header .= "Content-Transfer-Encoding: base64\r\n";
$header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
$header .= $content."\r\n\r\n";
$header .= "--".$uid."--";
$is_sent = @mail($mailto, $subject, "", $header);
if(!$is_sent)
{
    exit(0);
}


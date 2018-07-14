<?php
// ----------------------------------------------------------------------------
// Enviar email simple con headers
//
// Date : 10/05/2015
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------
?>

$destinatari = 'alex.sole@antaviana.cat';
$assumpte = "Newsletter: ".$row['TEXTC1'];

$fromEmail = "webserver@antaviana.com";
$header  = "MIME-Version: 1.0\r\n";
$header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$header .= "Organization: antaviana.com \r\n";
$header .= "Content-Transfer-encoding: 8bit\r\n";
$fromTag  = "WEB Server < ".$fromEmail.">";
$header .= "From: ".$fromTag."\r\n";
$replyTag = "WEB Server < ".$fromEmail.">";
$header .= "Reply-To: ".$replyTag."\r\n";
$header .= "Message-ID: <".md5(uniqid(time()))."@{$_SERVER['SERVER_NAME']}>\r\n";
$header .= "Return-Path: ". $fromEmail ."\r\n";
$header .= "X-Priority: 3\r\n";
$header .= "X-MSmail-Priority: Low\r\n";
$header .= "X-Mailer: PHP\r\n";
$header .= "X-Sender: ".$fromEmail."\r\n";
if( mail($destinatari, $assumpte, $cos,  $header)){
    echo "email enviat ok";
} else {
    echo 'Error';
}


                              
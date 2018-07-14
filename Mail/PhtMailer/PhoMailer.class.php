<?php
// ----------------------------------------------------------------------------
// Class Mailer
//
// Date : 10/05/2015
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------
?>

// Crear una clase Mailes de phpmailes para enviar correos

require($CONFIG_PATHPHP."/phpmailer/class.phpmailer.php");
require($CONFIG_PATHPHP."/phpmailer/class.smtp.php");

class Mailer extends PHPMailer
{
    public function __construct($exceptions = false)
    {
        parent::__construct($exceptions);

        $this->Mailer = 'smtp';  // -- Servidor smpt
        // $this->Mailer = 'smtp'; // -- Sendmail

        $this->Host = 'relay.antaviana.cat'; // -- SMTP a utilizar. Por ej. smtp.elserver.com
        // $this->Host = '192.168.55.123';

        $this->SMTPAuth = false;

        $this->FromName= 'ANTAVIANA';
        $this->From= 'info@antaviana.cat';
        $this->Username =  'asole'; // -- Cuenta del usuario qie envia el correi
        $this->Password = 'xxxxx'; // -- Contrasena
        $this->Port = '25'; // -- Puerto a utilizar
        $this->Hostname= 'www.fbstib.org';
        $this->CharSet= 'utf-8';
        $this->ContentType = 'text/html';
        $this->PluginDir = $CONFIG_PATHPHP."/phpmailer/";
    }
}



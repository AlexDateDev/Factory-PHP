<?php
// ----------------------------------------------------------------------------
// Mail_class_php
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
<?php
/**
* MAIL
*
* @author         Alexandre Solé i Faura
* @filesource    MAIL.class.php
*
* @version         3.1        => 21-11-2009    => add_header
* @version         3.0        => 12-4-2008
*
*/

if( !class_exists('MAIL', false))
{
    class MAIL
    {
        private $_aTo         = array();
        private $_sFrom     = '';
        private $_sReplyTo     = '';
        private $_aCc         = array();
        private $_aCco         = array();
        private $_sSubject     = '';
        private $_sMessage     = '';
        private $_sOtherHeaders = '';
        private $_sTextType;

        function __construct()
        {
        }

        /**
         * Añade un parámetro al header del mensaje
         *
         * @param string $sParam
         * @param string $sValue
         *
         * add_header( 'X-Priority', '1');
         * add_header( 'X-MSMail-Priority', 'High');
         * add_header( 'Origin', $_SERVER['REMOTE_ADDR']);
         */
        function add_header( $sParam, $sValue )
        {
            if( !empty($this->_sOtherHeaders))
            {
                $this->_sOtherHeaders .= "\r\n";
            }
            $this->_sOtherHeaders .= $sParam.': '.$sValue;

        }
        /**
         * Envia el missatge de correu
         * Retorna true si s'ha enviar correctament
         *
         * @return bool
         */
        function send()
        {
            if( count($this->_aTo) == 0)
            {
                return false;
            }
            $sTo = implode(',', $this->_aTo);

            // -- To (Oblig)
            $sHeaders = "\r\n".'To: '.implode( ',',$this->_aTo);

            // -- From
            if( $this->_sFrom != '')
            {
                $sHeaders .= "\r\n" .'From: ' . $this->_sFrom;
            }

            // -- Reply to
            if( $this->_sReplyTo != '')
            {
                $sHeaders .= "\r\n" . 'Reply-To: ' . $this->_sReplyTo;
            }

            // -- CC
            if( count( $this->_aCc ) > 0 )
            {
                $sHeaders .= "\r\n" .'Cc: ' . implode( ','.$this->_aCc);
            }

            // -- CCO
            if( count( $this->_aCco ) > 0 )
            {
                $sHeaders .= "\r\n" .'Bcc: ' . implode( ','.$this->_aCco);
            }

            $sHeadersMail  = 'MIME-Version: 1.0';
            $sHeadersMail .= "\r\n" .$this->_sTextType; // . "\r\n";
            $sHeadersMail .= $sHeaders;
            $sHeadersMail .= $this->_sOtherHeaders;

            return mail($sTo, $this->_sSubject, $this->_sMessage, $sHeadersMail) === true;
        }

        /**
         * Assigna el contingut del correu com a texte html
         *
         * @param string $sTextPlain
         */
        function set_message_html( $sTextHtml )
        {
            $this->_sMessage = $sTextHtml;
            $this->_sTextType = 'Content-type: text/html; charset=iso-8859-1';
        }

        /**
         * Assigna el contingut del correu com a texte pla
         *
         * @param string $sTextPlain
         */
        function set_message_plain( $sTextPlain )
        {
            $this->_sMessage = $sTextPlain;
            $this->_sTextType = 'Content-type: text/plain; charset=iso-8859-1';
        }

        /**
         * Assigna l'assupmte del correu
         *
         * @param string $sText
         */
        function set_subject( $sText )
        {
            $this->_sSubject = $sText;
        }
        /**
         * Inserta una adreça a con copia oculta
         *
         * @param string $sEmail
         */
        function add_cc( $sEmail )
        {
            $this->_aCc[] = $sEmail;
        }

        /**
         * Inserta una adreça a con copia oculta
         *
         * @param string $sEmail
         */
        function add_cco( $sEmail )
        {
            $this->_aCco[] = $sEmail;
        }
        /**
         * Inserta l'adreça d'on s'ha de respondre el correu enviat
         *
         * @param string $sEmail
         */
        function set_reply_to( $sEmail )
        {
            $this->_sReplyTo = $sEmail;
        }

        /**
         * Inserta una adreça de correo per al destinatari
         * No comprova que l'adreça sigui correcta
         *
         * @param string $sEmail
         */
        function add_to( $sEmail )
        {
            $this->_aTo[] = $sEmail;
        }

        /**
         * Inserta l'adreça de correu FROM de qui envia el correu
         *
         * @param string $sEmail
         */
        function set_from( $sEmail )
        {
            $this->_sFrom = $sEmail;
        }
    }
}
?>
?>

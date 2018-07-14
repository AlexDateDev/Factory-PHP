<?php
// ----------------------------------------------------------------------------
// ErrorLog
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
* ERROR_LOG.php
* Gestió de Logs dels error
*
* @version         3.0 => 28-10-2009
* @author         Alexandre Solé i Faura
* @package         Error
*
*/

if( !class_exists( 'ERROR_LOG',false))
{
    abstract class ERROR_LOG
    {
        /**
         * Guardamos un error
         *
         * @param string | Exception $sStrObj
         * @param string $sCode
         * @param bool $bShowPR
         */
        static function save( $sMsgObj, $sFunction=null, $bShowPR=true )
        {
            alert('ERROR_LOG: Definir USER_NAME');
            if( !$f = fopen( PATH_ERROR_LOG . "error_log.txt", "a+") )
            {
                echo 'Impossible crear arxiu error log';
                exit();
            }
            fwrite( $f, "\r\n---------------------------------------------------" );

            fwrite( $f, "\r\nFecha\t\t=\t". date('d-m-Y H:i:s') );
            if( is_string( $sMsgObj ))
            {
                if($bShowPR)
                {
                    pr($sMsgObj . '<br>'.$sFunction);
                }
                fwrite( $f, "\r\nUSER NAME:\t\t".     '');
                fwrite( $f, "\r\nUSER ID:\t\t".     '');
                fwrite( $f, "\r\nUSER PERFIL:\t".     '');
                fwrite( $f, "\r\nMensage\t=\t".     $sMsgObj);
                fwrite( $f, "\r\nFunción\t\t=\t".     $sFunction);
            }
            else if( get_parent_class ( $sMsgObj ) == 'Exception' )
            {
                if($bShowPR)
                {
                    pr($sMsgObj->getMessage( ) );
                }
                fwrite( $f, "\r\nUSER NAME:\t\t".         '');
                fwrite( $f, "\r\nUSER ID:\t\t".         '');
                fwrite( $f, "\r\nUSER PERFIL:\t".         '');
                fwrite( $f, "\r\nExcepción\t=\t".     get_class( $sMsgObj  ));
                fwrite( $f, "\r\nMensage\t=\t".     $sMsgObj->getMessage( ));
                fwrite( $f, "\r\nArxivo\t\t=\t".     $sMsgObj->getFile());
                fwrite( $f, "\r\nLínea\t\t=\t".     $sMsgObj->getLine());
                fwrite( $f, "\r\nCodigo\t\t=\t".     $sMsgObj->getCode());
                fwrite( $f, "\r\nTrace:\r\n".         $sMsgObj->getTraceAsString());

            }

            fclose( $f );
        }

        /**
         * Envia una traza de error al programador
         *
         * @param unknown_type $sMsgObj
         * @param unknown_type $sFunction
         */
        static function send($sMsgObj, $sFunction=null)
        {
            self::save( $sMsgObj, $sFunction,false );
            global $bSendMailprogrammer;
            if(!empty($bSendMailprogrammer))
            {
//                $mail = new MAIL_ERROR( $nId, $sText );
//                $mail->send();
            }


        }
    }
}

?>
?>

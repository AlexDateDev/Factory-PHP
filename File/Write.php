<?php
// ----------------------------------------------------------------------------
// Write
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Escru un text a un arxiu, l'arxiu ha d'estar obert en mode escriptura, no tanca l'arxiu
         *
         * <b>Exemple</b>
         * <code>
         * try
         * {
         *    $file = new FILE( 'name.txt');
         *     $file->open( OPEN_MODE::APPEND_ONLY );
         *  ...
         *  $nBytesWrited = $file->write( 'Inici de la descripció' );
         *  ...
         *  $str = 'La descripció correspon a moltes ... ';
         *  $nBytesWrited  = $file->write( $str, 10 );
         *
         *     ...
         *     $file->close();
         *
         * }
         * catch( Exception $ex )
         * {
         *         echo $ex->getMessage();
         * }
         * </code>
         *
         * @param string $str Text a escriure
         * @param int $nMaxBytes Número màxim de bytes a guardar a l'arxiu
         * @return int Número de bytes escrits
         */
        static function write( $hFile, $str, $nMaxBytes=null )
        {
            if( is_null( $nMaxBytes ))
            {
                $ret = fwrite( $hFile, $str );
            }
            else
            {
                $ret = fwrite( $hFile, $str, $nMaxBytes );
            }
            if( $ret === false )
            {
                throw new Exception('No es pot escriure a l\'arxiu');
            }
            return $ret;
        }
?>

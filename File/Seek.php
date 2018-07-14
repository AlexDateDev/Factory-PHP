<?php
// ----------------------------------------------------------------------------
// Seek
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Posiciona el cursor dintre de l'arxiu<br>
         * Si la posició desde la que desplasar és el final de l'arxiu, l'offset
         * ha de ser negatiu
         *
         * @param int $nOffset Número de bytes a desplasar el cursor
         * @param const $nFromPos Posició dede la que desplasar el cursor, SEEK_SET, SEEK_CUR, SEEK_END
         */
        static function seek( $hFile, $nOffset, $nFromPos=null )
        {
            if( is_null( $nFromPos ))
            {
                $ret = fseek( $hFile, $nOffset );
            }
            else
            {
                $ret = fseek( $hFile, $nOffset, $nFromPos );
            }
            if( $ret === false || $ret == -1 )
            {
                throw new Exception( 'No es pot desplaçar el cursor per dintre de l\'arxiu');
            }
        }
?>

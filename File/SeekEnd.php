<?php
// ----------------------------------------------------------------------------
// SeekEnd
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Posiciona el cursor al final de l'arxiu
         *
         */
        static function seek_end($hFile)
        {
            $ret = fseek( $hFile, 0,  SEEK_END );
            if( $ret === false || $ret == -1 )
            {
                throw new Exception('No es pot desplaçar el cursor al final de l\'arxiu');
            }

        }
?>
         
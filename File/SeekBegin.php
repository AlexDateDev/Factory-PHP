<?php
// ----------------------------------------------------------------------------
// SeekBegin
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Posiciona el cursor a l'inici de l'arxiu
         *
         */
        static function seek_begin($hFile )
        {
            $ret = rewind ( $hFile );
            if( $ret === false )
            {
                throw new Exception('No es pot desplaçar el cursor a l\'inici de l\'arxiu');
            }

        }
?>
                                     
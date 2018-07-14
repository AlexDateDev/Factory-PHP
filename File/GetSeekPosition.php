<?php
// ----------------------------------------------------------------------------
// GetSeekPosition
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Retorna la posici� del cursor dintre de l'arxiu
         *
         * @return int Posici� del cursor dintre de l'arxiu
         */
        static function get_seek_position($hFile )
        {
            $ret = ftell( $hFile );
            if( $ret === false )
            {
                throw new Exception('No es pot obtenir la posici� del cursor de dintre de l\'arxiu');
            }
            return $ret;
        }
?>
                    
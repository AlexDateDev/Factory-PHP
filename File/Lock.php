<?php
// ----------------------------------------------------------------------------
// Lock
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php

        /**
         * Bloqueja un arxiu (mode exclusiu) tant per lectura com per escriptura
         *
         */
        static function lock( $hFile )
        {
            $ret = flock( $hFile, LOCK_EX);
            if( $ret === false )
            {
                throw new Exception('No es pot bloquejar l\'arxiu');
            }
        }
?>
                 
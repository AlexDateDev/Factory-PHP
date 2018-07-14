<?php
// ----------------------------------------------------------------------------
// Close
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php

/**
         * Cierra el fichero
         *
         * @param handle $hFile
         */
        static function close( $hFile )
        {
            if( !fclose( $hFile ))
            {
                throw new Exception('No es pot tancar l\'arxiu ' );
            }
        }

?>

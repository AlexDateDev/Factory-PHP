<?php
// ----------------------------------------------------------------------------
// Delete
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php

    /**
         * Elimina un arxiu fisicament
         *
         */
        static function delete($sFileName)
        {
            if( unlink( $sFileName) === false )
            {
                throw new Exception('No es eliminar l\'arxiu: '.$sFileName);
            }
        }
?>

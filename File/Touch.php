<?php
// ----------------------------------------------------------------------------
// Touch
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Modifica la data de l'ultim accés
         *
         */
        static function touch($sFileName)
        {
            if( touch( $sFileName) === false)
            {
                throw new Exception('No es fer un touch a l\'arxiu: '.$sFileName);
            }
        }
?>
              
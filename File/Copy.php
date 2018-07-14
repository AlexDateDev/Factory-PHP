<?php
// ----------------------------------------------------------------------------
// Copy
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Copiem un arxiu a un altre, es sobreescriu el destí si existeix
         *
         * @param string $sFileNameTarget
         */
        static function copy( $sFileName, $sFileNameTarget )
        {
            if( copy( $sFileName, $sFileNameTarget) === false )
            {    
                throw new Exception('No es pot copiar l\'arxiu: '.$sFileName);
            }
        }
?>

<?php
// ----------------------------------------------------------------------------
// Rename
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Renombrem un arxiu
         *
         * @param string $sNewFileName
         */
        static function rename( $sFileName, $sNewFileName)
        {
            if( rename( $sFileName, $sNewFileName) === false )
            {
                throw new Exception('No es pot renomrbar l\'arxiu: '.$sFileName);
            }
        }
?>
                                              
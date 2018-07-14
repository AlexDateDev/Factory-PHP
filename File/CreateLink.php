<?php
// ----------------------------------------------------------------------------
// CreateLink
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Crea un link simb�lic a un arxiu, no es necessari que estigui obert
         *
         * @param string $sSimbolicName
         */
        static function create_simbolic_link( $sFileName, $sSimbolicName)
        {
            $ret = symlink( $sFileName, $sSimbolicName );
            if( $ret === false)
            {
                throw new Exception('No es pot crear un link simb�lic de l\'arxiu: '.$sFileName);
            }                 
        }
?>

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
         * Crea un link simbòlic a un arxiu, no es necessari que estigui obert
         *
         * @param string $sSimbolicName
         */
        static function create_simbolic_link( $sFileName, $sSimbolicName)
        {
            $ret = symlink( $sFileName, $sSimbolicName );
            if( $ret === false)
            {
                throw new Exception('No es pot crear un link simbòlic de l\'arxiu: '.$sFileName);
            }                 
        }
?>

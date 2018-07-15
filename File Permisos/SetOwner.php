<?php
// ----------------------------------------------------------------------------
// SetOwner
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Asigna un usuari com a propietari de l'arxiu
         *
         * @param string $sUserName
         */
        static function set_owner( $sFileName, $sUserName )
        {
            if( chown( $sFileName, $sUserName ) === false )
            {
                throw new Exception('No es poden asignar el propietari de l\'arxiu: '.$sFileName);
            }
        }
?>
                 
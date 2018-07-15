<?php
// ----------------------------------------------------------------------------
// SetGroup
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Asigna un grup com a propietari de l'arxiu
         *
         * @param string $sGroupName
         */
        static function set_group( $sFileName, $sGroupName )
        {
            if( chgrp( $sFileName, $sGroupName ) === false )
            {
                throw new Exception('No es poden asignar el grup de l\'arxiu: '.$sFileName);
            }
        }
?>
               
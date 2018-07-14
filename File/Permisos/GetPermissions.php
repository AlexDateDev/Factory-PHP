<?php
// ----------------------------------------------------------------------------
// GetPermissions
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Retorna els permisos de l'arxiu
         *
         * @return int
         */
        static function ger_permissions($sFileName)
        {
            $ret = fileperms( $sFileName);
            if( $ret === false )
            {
                throw new Exception('No es poden optenir els permisis de l\'arxiu: '.$sFileName);
            }
            return $ret;
        }
?>
                    
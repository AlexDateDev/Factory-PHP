<?php
// ----------------------------------------------------------------------------
// Chmod
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Asigna els permisos a l'arxiu
         * 600 Lectura i escritura pel propietari, no acces pels altres
         * 644 Lectura i escritura pel propietari, lectura pels altres
         * 755 Tot pel propietari, lectura i execució pels altres
         *
         * @param int $nPermisions
         */
                                      
        static function chmod( $sFileName, $nPermisions)
        {
            $ret = chmod( $sFileName,$nPermisions );
            if( $ret === false )
            {
                throw new Exception('No es poden cambiar els permisos de l\'arxiu: '.$sFileName);
            }
        }
?>

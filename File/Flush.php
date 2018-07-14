<?php
// ----------------------------------------------------------------------------
// Flush
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Forsa l'escriptura del buffer a l'arxiu
         *
         */
        static function flush($hFile)
        {
            if( fflush( $hFile ) === false )
            {
                throw new Exception('No es pot forsar l\'escriptura de l\'arxiu');
            }
        }     
?>

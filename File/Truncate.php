<?php
// ----------------------------------------------------------------------------
// Truncate
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php

/**
         * Estableix el tamany de l'arxiu a un nombre determinat de bytes
         *
         * @param int $nSize
         */
        static function truncate( $hFile, $nSize )
        {
            $ret = ftruncate( $hFile, $nSize);
            if( $ret === false)
            {
                throw new Exception('No es pot truncar el tamany de  l\'arxiu');
            }
        }
?>
                   
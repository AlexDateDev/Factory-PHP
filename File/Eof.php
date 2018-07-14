<?php
// ----------------------------------------------------------------------------
// Eof
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Detecta si s'ha arribat al final de l'arxiu<br>
         * Retorna true si s'ha arribat al final de l'arxiu o false en altre cas
         *
         * <b>Exemple</b>
         * <code>
         * try
         * {
         *    $file = new FILE( 'name.txt');
         *     $file->open( OPEN_MODE::READ_ONLY );
         *
         *     while( !$file->eof() )
         *     {
         *         ...
         *     }
         *     $file->close();
         *
         * }
         * catch( Exception $ex )
         * {
         *         echo $ex->getMessage();
         * }
         * </code>
         *
         * @return boot
         */
        static function eof( $hFile )
        {
            return feof( $hFile );
        }
?>

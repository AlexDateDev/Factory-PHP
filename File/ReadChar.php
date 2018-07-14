<?php
// ----------------------------------------------------------------------------
// readChar
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Llegeix un nombre de caracters d'un arxiu<br>
         * un caracter = un byte, final de línia (\r\n) son 2 bytes<br>
         * Si l'arxiu s'ha obert només per escriure, al llegir, retorna 0
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
         *         // -- Llegim caràcter a caràcter
         *        $oneChar = $file->read_char();
         *         ...                              
         *     }
         *     ...
         *     while( !$fileText->eof() )
         *     {
         *         // -- Llegim un bloc de caràcters
         *        $oneBlock = $file->read_char( 255 );
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
         * @param int $maxBytes Número de bytes a llegir.
         * @return string
         */
        static function read_char( $hFile, $maxBytes=1)
        {
            $ret = fread( $hFile, $maxBytes );
            if( $ret === false )
            {
                throw new Exception('No es pot llegir caràcters de l\'arxiu');
            }
            return $ret;
        }
?>

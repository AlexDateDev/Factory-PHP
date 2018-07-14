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
         * un caracter = un byte, final de l�nia (\r\n) son 2 bytes<br>
         * Si l'arxiu s'ha obert nom�s per escriure, al llegir, retorna 0
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
         *         // -- Llegim car�cter a car�cter
         *        $oneChar = $file->read_char();
         *         ...                              
         *     }
         *     ...
         *     while( !$fileText->eof() )
         *     {
         *         // -- Llegim un bloc de car�cters
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
         * @param int $maxBytes N�mero de bytes a llegir.
         * @return string
         */
        static function read_char( $hFile, $maxBytes=1)
        {
            $ret = fread( $hFile, $maxBytes );
            if( $ret === false )
            {
                throw new Exception('No es pot llegir car�cters de l\'arxiu');
            }
            return $ret;
        }
?>

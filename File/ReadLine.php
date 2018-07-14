<?php
// ----------------------------------------------------------------------------
// ReadLine
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Retorna una línia de l'arxiu. Al final íe la linia hi ha (\r\n) que són dos bytes
         *
         * <b>Exemple</b>
         * <code>
         * try
         * {
         *    $hFile = FILE::open( 'name.txt','r');
          *
         *     while( !FILE::eof($hFile) )
         *     {
         *         // Llegim una línia
         *        $lineTxt = FILE::read_line($hFile);
         *         ...
         *     }
         *     FILE::close($hFile);
         * }
         * catch( Exception $ex )
         * {                                    
         *         echo $ex->getMessage();
         * }
         * </code>
         *
         * @return string
         *
         */
        static function read_line( $hFile )
        {
            $ret = fgets( $hFile );
            if( $ret === false )
            {
                throw new Exception('No es pot llegir la línia de l\'arxiu');
            }
            return $ret;
        }
?>

<?php
// ----------------------------------------------------------------------------
// Save
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Guarda a la sessió un objecte
         * Es un objecte global. No se l'hi concatena el tipus d'aplicació
         *
         * @param String Nom del par&agrave;metre on guardar l'objecte
         * @param Objecte Objecte a guadar
         *
         * @version     3.0        => 24-06-2008
         */
        static function save($sLiteral, $val )
        {
               if( self::$_bCompressCrypt )
               {
                   $_SESSION[ $sLiteral ] = self::get_zip($val);
               }
               else
               {
                $_SESSION[ $sLiteral ] = $val;
               }
        }
?>
                        
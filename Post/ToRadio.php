<?php
// ----------------------------------------------------------------------------
// ToRadio
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Devuelve una variable radiobutton obtinida del POST o null si no existe
         *
         * @param string $strName
         * @param string $sDefValue
         * @return string | -1
         *
         * @version     3.0        => 24-06-2008
         */
        static function to_radio( $strName, $sDefValue=null )
        {
            return self::to_str( $strName, $sDefValue );
        }
?>
                              
<?php
// ----------------------------------------------------------------------------
// ToString
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php

/**
         * Devuelve una variable STRING del GET o un valor por defecto si no existe o no es un string,
         * Sustituye los caracteres " por comilla simple
         *
         * @param string $strName
         * @param string $sDefValue
         * @return string
         *
         * @version     3.0        => 24-06-2008
         */
        static function to_str( $strName, $sDefValue='' )
        {
            if( !isset($_GET[ $strName ]) )
            {
                $str = $sDefValue;
            }
            else
            {
                $str = $_GET[ $strName];
            }
              if ( !get_magic_quotes_gpc() )
            {
                $str = addslashes($str);
              }
              return str_replace( '"',"'",$str);
        }
?>

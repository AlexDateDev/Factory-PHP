<?php
// ----------------------------------------------------------------------------
// ToFloat
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Devuelve un valor int del GET o nDefValue si no existe
         *
         * @param string $strName
         * @param intl $hiddeError
         * @return float
         *
         * @version     3.0        => 24-06-2008
         */
        static function to_float( $strName, $nDefValue=0 )
        {
            if( isset( $_GET[ $strName ]))
            {
                if( !is_float( $_GET[$strName]) && !is_int( $_GET[$strName]))
                {
                    alert( '$_GET FLOAT: Valor $_GET no es un float o integer: ' . $strName  );
                    return $nDefValue;
                }
                return floatval( $_GET[ $strName ]);
            }                   
            else
            {
                return $nDefValue;
            }
        }
?>

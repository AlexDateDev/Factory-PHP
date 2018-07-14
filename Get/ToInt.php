<?php
// ----------------------------------------------------------------------------
// ToInt
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Devuelve un valor int del $_GET o nDefValue si no existe
         *
         * @param string $strName
         * @param int $nDefValue
         * @return int
         *
         * @version     3.0        => 24-06-2008
         */
        static function to_int( $strName, $nDefValue=0 )
        {
            if( isset( $_GET[ $strName ]))
            {
                if( !is_int( $_POST[$strName] ))
                {
                    alert( '$_GET INT: Valor $_GET no es un integer: ' . $strName  );
                    return $nDefValue;
                }
                return intval( $_GET[ $strName ]);
            }
            else
            {
                return $nDefValue;
            }
        }
?>

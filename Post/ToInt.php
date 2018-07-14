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
         * Devuelve un valor int del POST o nDefValue si no existe
         *
         * @param string $strName
         * @param int $nDefValue
         * @return int
         *
         * @version     3.0        => 24-06-2008
         */
        static function to_int( $strName, $nDefValue=null )
        {
            $nPos = strpos( $strName, '.');
            if( $nPos !== false )
            {
                $strName = substr( $strName, $nPos+1, strlen($strName));
            }
            if( array_key_exists($strName, $_POST ))
            {
                if( !is_numeric( $_POST[$strName] ))
                {
                    alert( 'POST INT: Valor POST no es un integer: ' . $strName .' ('.$_POST[$strName].')' );
                    return $nDefValue;
                }
                return intval( $_POST[ $strName ]);
            }
            else            
            {
                return $nDefValue;
            }
        }
?>

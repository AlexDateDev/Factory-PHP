<?php
// ----------------------------------------------------------------------------
// ToBool
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Devuelve un valor bool del POST o nDefValue si no existe
         *
         * @param string $strName
         * @param int $nDefValue
         * @return int
         *
         * @version     3.0a    => 11-02-2008
         */
        static function to_bool( $strName, $bDefValue=null )
        {
            $nPos = strpos( $strName, '.');
            if( $nPos !== false )
            {
                $strName = substr( $strName, $nPos+1, strlen($strName));
            }
            if( array_key_exists($strName, $_POST ))
            {
                if( empty( $_POST[$strName] ))
                {
                    return $bDefValue;
                }
                return (bool)( $_POST[ $strName ]);
            }
            else                   
            {
                return $bDefValue;
            }
        }
?>

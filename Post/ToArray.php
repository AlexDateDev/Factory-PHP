<?php
// ----------------------------------------------------------------------------
// ToArray
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Retorna un array del POST
         *
         * @param string $strName
         * @param array $aDefvalue
         * @return array
         *
         * @version     3.0        => 24-06-2008
         */
        static function to_array( $strName, $aDefvalue=array() )
        {
            $nPos = strpos( $strName, '.');
            if( $nPos !== false )
            {
                $strName = substr( $strName, $nPos+1, strlen($strName));
            }
            if( array_key_exists($strName, $_POST ))
            {
                return $_POST[ $strName ];
            }
            else
            {
                return $aDefvalue;
            }
        }
?>

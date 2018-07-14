<?php
// ----------------------------------------------------------------------------
// ToSelect
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Obtenemos un valor de un campo select
         *
         * @param string $strName
         * @param string $sDefValue
         * @return string | -1
         *
         * @version     3.0        => 24-06-2008
         */
        static function to_select( $strName, $keyZero=0, $sDefValue=null)
        {
            $nPos = strpos( $strName, '.');
            if( $nPos !== false )
            {
                $strName = substr( $strName, $nPos+1, strlen($strName));
            }
            if( !array_key_exists($strName, $_POST ))
            {
                return $sDefValue;
            }
            $val = $_POST[ $strName];
            if( $val === 0 || $val == '0')
            {
                return $keyZero;
            }
              return $val;
        }
?>

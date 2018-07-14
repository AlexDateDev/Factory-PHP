<?php
// ----------------------------------------------------------------------------
// GetParamsArray
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php

        /**
         * Devuelve un array con los parametros y valores
         *
         * @param string $sUrl
         * @return array
         *
         * @version     3.0        => 24-06-2008
         */
        static function get_array_params( $sQueryString )
        {
            $t = array();
            $a = explode('&',$sQueryString);
            foreach ($a as $key => $value)
            {
                $b = explode('=',$a[$key]);
                $t[$b[0]]=$b[1];
            }
            return $t;
        }

?>
                               
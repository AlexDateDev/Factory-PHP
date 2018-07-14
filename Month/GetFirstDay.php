<?php
// ----------------------------------------------------------------------------
// GetFirstDay
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Devuelve la fecha del primer dia del mes de un año
         *
         * @param int (1-12) $nMes
         * @param int (YYYY) $nAny
         * @return string_std
         *
         * @version     3.0        => 12-4-2008
         */
        static function get_primer_dia( $nMes, $nAny='' )
        {
            if( empty($nAny))
            {
                $nAny = date('Y');
            }
            return '01-'.substr( '00'.$nMes, -2).'-'.$nAny;
        }
?>
                             
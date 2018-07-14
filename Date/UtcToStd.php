<?php
// ----------------------------------------------------------------------------
// ToStd
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
        * Devuelve la fecha STD y hora partieno de una fecha en formaot UTC
        *
        * @param string $sDateTimeUTC
        *
        * @version     3.0        => 12-4-2008
        */

        static function to_STD_from_UTC( $sDateTimeUTC)
        {
            $utcdiff = date('Z', time());  // Diferencia UTC amb segonds

            // -- UTC = 20070724T224556Z
                     
            $y = (int)substr( $sDateTimeUTC, 0, 4 );
            $m = (int)substr( $sDateTimeUTC, 4, 2 );
            $d = (int)substr( $sDateTimeUTC, 6, 2 );
            $h = (int)substr( $sDateTimeUTC, 9, 2 );
            $i = (int)substr( $sDateTimeUTC, 11, 2 );
            $s = (int)substr( $sDateTimeUTC, 13, 2 );

            $stamp = mktime($h, $i, $s, $m, $d, $y );
            $stamp += $utcdiff;
            return date( 'd-m-Y H:i:s', $stamp);
        }
?>

<?php
// ----------------------------------------------------------------------------
// ToUTC
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Devuelve uan fecha y hora en formato UTC partiendo de una fecha STD
 *
 * Format: YYYYMMDDTHHiissZ
 *
 * @return string
 *
 * @version     3.0        => 12-4-2008
 */
static function to_UTC_from_STD( $sDateSTD )
{
    $utcdiff = date('Z', time());  // Diferencia UTC amb segonds

    list($nDia,$nMes,$nAny)=split('-', $sDateSTD);
    $stamp = mktime(0,0,0,$nMes,$nDia,$nAny);
    $stamp -= $utcdiff;
    return date( 'Ymd\THi\0\0\Z', $stamp);
}

?>
                              
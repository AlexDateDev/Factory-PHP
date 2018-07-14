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
 * Combierte una fecha i hora MYSQL (yyyy-mm-dd hh:mm:ss) a STD (dd-mm-yyyy hh:mm:ss)
 *
 * @param string $sDateTimeMYSQL
 * @return string_date_time
 *
 * @version     3.0        => 12-4-2008
 */
static function to_STD($sDateTimeMYSQL)
{
    // -- Convertir el dia mysql a dia str
    list( $sDateMYSQL, $hora) = split( ' ', $sDateTimeMYSQL);
    list($any,$mes,$dia) = split('-', $sDateMYSQL);
    return $dia.'-'.$mes.'-'.$any. ' '.$hora;
}
?>

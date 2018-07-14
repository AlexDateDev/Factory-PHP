<?php
// ----------------------------------------------------------------------------
// ToMysql
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Combierte una fecha i hora STD (dd-mm-yyyy hh:mm:ss) a MYSQL (yyyy-mm-dd hh:mm:ss)
 *
 * @param string $sDateTimeSTD
 * @return string_date_time
 *
 * @version     3.0        => 12-4-2008
 */
static function to_MYSQL( $sDateTimeSTD)
{    
    // -- Convertir el dia std a dia mysql
    list( $diaStd, $hora) = split( ' ', $sDateTimeSTD);
    list($dia,$mes,$any) = split('-', $diaStd);
    return $any.'-'.$mes.'-'.$dia. ' '.$hora;
}
?>

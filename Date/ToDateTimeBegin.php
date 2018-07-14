<?php
// ----------------------------------------------------------------------------
// ToDateTimeBegin
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Devuelve un datetime de inicio de dia a partir de una fecha
 *
 * @param string_date $sDateSTD (dd-mm-yyyy)
 * @return string_date_time (dd-mm-yyyy 00:00:00)
 * */
static function to_dtm_ini( $sDateSTD)
{
    return $sDateSTD .' 00:00:00';
}
?>
                         
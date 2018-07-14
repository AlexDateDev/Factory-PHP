<?php
// ----------------------------------------------------------------------------
// ToDateTimeEnd
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Devuelve un datetime de final de dia a partir de una fecha
 *
 * @param string_date $sDateSTD (dd-mm-yyyy)
 * @return string_date_time (dd-mm-yyyy 23:59:59)
 */
static function to_dtm_fin( $sDateSTD)
{
    return $sDateSTD .' 23:59:59';
}
?>
                    
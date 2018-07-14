<?php
// ----------------------------------------------------------------------------
// GetMonth
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Devuelve el mes de la fecha
 *
 * @param string $sDateSTD
 * @return int
 *
 * @version     3.0        => 12-4-2008
 */
static function get_month( $sDateSTD )
{
    list(,$mes,) = split('-', $sDateSTD);
    return intval($mes);
}
?>

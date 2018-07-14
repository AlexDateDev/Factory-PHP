<?php
// ----------------------------------------------------------------------------
// GetDateOnly
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php

/**
 * Devuelve la fecha STD (dd-mm-yyy)
 *
 * @param string $sDateTimeSTD
 * @return string_std
 *
 * @version     3.0        => 12-4-2008
 * @version     3.1        => 28-10-2008
 */
static function get_date_only( $sDateTimeSTD)
{
    list($diaSTD,) = split(' ',$sDateTimeSTD);
    return $diaSTD;
}
?>

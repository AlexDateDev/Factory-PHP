<?php
// ----------------------------------------------------------------------------
// GetTimeOnly
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php

/**
 * Devuelve la hora
 *
 * @param string $sDateTimeSTD
 * @return string
 *
 * @version     3.0        => 12-4-2008
 * @version     3.1        => 28-10-2008
 */
static function get_time_only( $sDateTimeSTD)
{
    list(,$hora,) = split(' ',$sDateTimeSTD);
    return $hora;
}
?>

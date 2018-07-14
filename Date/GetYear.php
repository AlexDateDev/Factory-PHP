<?php
// ----------------------------------------------------------------------------
// GetYear
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Devuelve el año de la fecha
 *
 * @param string $sDateSTD
 * @return int
 *
 * @version     3.0        => 12-4-2008
 */
static function get_year( $sDateSTD )
{
    list(,,$any) = split('-', $sDateSTD);
    return intval($any);
}
?>
                                   
<?php
// ----------------------------------------------------------------------------
// GetDay
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Devuelve el dia de la fecha
 *
 * @param string $sDateSTD
 * @return int
 *
 * @version     3.0        => 12-4-2008
 */
static function get_day( $sDateSTD )
{
    list($dia,,) = split('-', $sDateSTD);
    return intval($dia);
}                                  

?>

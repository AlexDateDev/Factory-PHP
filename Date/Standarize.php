<?php
// ----------------------------------------------------------------------------
// Standarize
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Estandariza los separadores de la fecha al caracter -
 *
 * @param string $sDate
 * @return string_date_std
 *
 * @version     3.0        => 12-4-2008
 */
static function get_standarized( $sDateStr, $sSep='-' )
{
    list($nDia,$nMes,$nAnio) = split('['.$sSep.']', $sDateStr);
    return sprintf("%02d-%02d-%04d", $nDia, $nMes, $nAnio);
}
?>
                 
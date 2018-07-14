<?php
// ----------------------------------------------------------------------------
// ToDate
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Retorna una data STD d'una data timestamp
 *
 * @param int $nTimestamp
 * @return string_date_std
 *
 * @version     3.0        => 12-4-2008
 */
static function get_from_timestamp($nTimestamp)
{
    $date_str = getdate($nTimestamp);
    $year     = $date_str["year"];
    $mon     = $date_str["mon"];
    $mday     = $date_str["mday"];
    return sprintf( "%02d-%02d-%4d",$mday,$mon,$year);
}
?>

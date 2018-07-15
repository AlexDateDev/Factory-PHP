
<?php
/**
 * Indica si la data esta en format UTC
 *
 * Format: YYYYMMDDTHHiissZ
 *
 * @param string $strUTC
 * @return booelan true si es format UTC valid o false en altre case
 *
 * @version     3.0        => 12-4-2008
 */
static function is_date_time_utc( $sDateTimeUTC)
{
    // -- UTC = 20070724T224556Z
    $sDateTimeUTC = strtoupper($sDateTimeUTC);
    $t = substr( $sDateTimeUTC, 8, 1 );
    $z = substr( $sDateTimeUTC, 15, 1 );
    return( $t == 'T' && $z == 'Z' );
}
?>

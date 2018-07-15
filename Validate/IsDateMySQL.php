
<?php
/**
 * Comprueba si una fecha MYSQL (yyyy-mm-dd) es corecta
 *
 * @param string $sDateMSQK
 * @return bool
 *
 * @version     3.0        => 12-4-2008
 */
static function is_date_MYSQL( $sDateMSQL )
{
    if( self::is_empty($sDateMSQL))
    {
        return false;
    }
    list($nAny,$nMes,$nDia) = split('-', $sDateMSQL);
    return (date( 'Y-m-d', mktime( 0,0,0,$nMes, $nDia, $nAny)) == $sDateMSQL );
}
?>

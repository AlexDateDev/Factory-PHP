
<?php
/**
 * Comprueba si una fecha i hora STD (dd-mm-yyyy hh:mm:ss) es correcta
 *
 * @param string $sDateTimeSTD
 * @return string
 *
 * @version     3.0        => 12-4-2008
 */
static function is_date_time_MYSQL( $sDateTimeMSQL )
{
    if( self::is_empty($sDateTimeMSQL))
    {
        return false;
    }
    list($sDiaMYSQL, $sHora) = split(' ', $sDateTimeMSQL);
    list($nAny,$nMes,$nDia ) = split('-', $sDiaMYSQL);
    list($nHora,$nMin,$nSec) = split(':', $sHora);
    return ($sDateTimeMSQL == date('Y-m-d H:i:s',mktime($nHora,$nMin,$nSec,$nMes,$nDia,$nAny) ));
}
?>

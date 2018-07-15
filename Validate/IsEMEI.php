
<?php
/**
 * Indica si es un IMEI válido
 *
 * @param string $sIMEI
 * @return bool
 */
static function is_imei( $sIMEI )
{
    $sIMEI = trim($sIMEI);
    $bOk = ( eregi( "^[0-9]+$", $sIMEI ) && strlen(trim($sIMEI)) == 15 );
    $nIdCodigo = intval(substr( $sIMEI,0,2));
    return ( $nIdCodigo == 35  && $bOk);
}
?>

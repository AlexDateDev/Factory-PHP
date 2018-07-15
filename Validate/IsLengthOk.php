
<?php
/**
 * Comprueba la longitud de un string
 *
 * @param string $sStr
 * @param int $nLen
 * @param bool $bUseTrim
 * @return bool
 */
static function is_lenght($sStr, $nLen, $bUseTrim=true )
{
    return strlen($bUseTrim ? trim($sStr) : $sStr)==$nLen;
}
?>

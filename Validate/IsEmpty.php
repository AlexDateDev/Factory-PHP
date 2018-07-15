

<?php
/**
 * Indica si un string o fecha esta vació, null o 00-00-0000
 *
 * @param string
 * @return bool
 */
static function is_empty( $sStr )
{
    $sTmp = trim($sStr);
    return (     empty($sTmp) ||
                strtoupper($sTmp)=='NULL' ||
                strtoupper($sTmp)=='(NULL)' ||
                $sTmp == '00-00-000'||
                $sTmp == '00-00-000 00:00:00'
                );
}
?>

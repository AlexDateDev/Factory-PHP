<?php
/**
 * Transforma un array en un string
 *
 * @param array $arr
 * @param string $sSep
 * @return string
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function GetValuesAsString($arr, $sSep=',')
{
    return join( $sSep, $arr);
}
?>
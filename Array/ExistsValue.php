<?php
/**
 * Indica si un valor existe en los valors de array
 *
 * @param array $arr
 * @param string $sValue
 * @return bool              
 *
 * @version 3.0        => 12-4-2008
 */
static function ExistsValue( $arr, $sValue)
{
    return !( false === array_search( $sValue, $arr));
}
?>
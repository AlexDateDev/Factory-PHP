<?php
/**
 * Añade una clave/valor al final del array
 *
 * @param array $arr
 * @param string $sValue
 * @param string $sKey
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function AppendKeyValue( &$arr, $sValue, $sKey ){
    $arr[$sKey]=$sValue;
}

?>
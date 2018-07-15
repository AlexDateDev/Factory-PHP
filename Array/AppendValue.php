<?php

/**
 * Añade un valor al final del array
 *
 * @param array $arr
 * @param string $sValue
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function AppendValue( &$arr, $sValue ){
    array_push($arr, $sValue);
}
?>
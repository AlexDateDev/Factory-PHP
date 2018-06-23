<?php
/**
 * Añade un valor al inicio del array
 *
 * @param array $arr (IN/OUT)
 * @param mixed $value
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function InsertFirst( &$arr, $value ){
    array_unshift($arr, $value);
}
?>
<?php
/**
 * Devuelve y elimina el primer valor del array
 *
 * @param array $arr
 * @return string
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function PopFirst( &$arr){
    return array_shift($arr);
}
?>
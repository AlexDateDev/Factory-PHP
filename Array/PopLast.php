<?php
/**
 * Devuelve y elimina el último valor del array
 *
 * @param array $arr
 * @return srting
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function PopLast( &$arr){
    return array_pop($arr);
}
?>
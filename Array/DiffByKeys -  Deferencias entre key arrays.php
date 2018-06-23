<?php
/**
 * Devuelve todos los claves/valores del array 1 que  NO estan en las claves del otro array
 *
 * @param array $arr1
 * @param array $arr2        
 * @return array
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function DiffByKeys( $arr1, $arr2 ){
    return array_diff($arr1, $arr2);
}
?>
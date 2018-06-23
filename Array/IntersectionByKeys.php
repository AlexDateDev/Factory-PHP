<?php
/**
 * Deveulve sólo las claves/valores del array1 que estan en todos los claves del otro array
 *
 * @param array $arr1
 * @param array $arr2
 * @return array
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function IntersectionByKeys( $arr1, $arr2 ){
    return array_intersect_key($arr1, $arr2);
}
?>
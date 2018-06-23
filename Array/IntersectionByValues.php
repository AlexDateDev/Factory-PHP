<?php
/**
 * Deveulve sólo los valores del array1 que estan en todos los valores del otro array
 *
 * @param array $arr1
 * @param array $arr2
 * @return array
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function IntersectionByValues( $arr1, $arr2 ){
    return array_intersect($arr1, $arr2);
}
?>
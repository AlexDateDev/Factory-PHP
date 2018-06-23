<?php
/**
 * Devuelve la posición que ocupa una clave
 *
 * @param array $arr
 * @param mixed $nsKey
 * @return int | -1
 *
 * @version 3.0        => 12-4-2008
 */
static function IndexOfKey( $arr, $nsKey )
{
    $n = 0;
    foreach($arr as $key => $value){
        if( $key === $nsKey){
            return $n;
        }
        $n++;
    }
    return -1;
}
?>
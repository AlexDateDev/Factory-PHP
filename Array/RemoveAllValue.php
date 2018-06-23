<?php
/**
 * Elimina todos los valores del array de una instancia
 *
 * @param array $arr
 * @param string $sStr
 * @return array si los elementos indicados
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function RemoveAllValue( $arr, $sStr ){
    $t = array();
    foreach ($arr as $key => $value){
        if( $value != $sStr){
            $t[$key]=$value;
        }
    }
    return $t;
}
?>
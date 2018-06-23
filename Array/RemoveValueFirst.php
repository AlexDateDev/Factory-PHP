<?php
/**
 * Elimina el primer valor de una instancia del array
 *
 * @param array $arr
 * @param string $sStr Valor a eliminar
 * @param array sin el primer valor eliminado
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function RemoveValueFirst( $arr, $sStr ){
    $t = array();
    $bTrobat=false;
    foreach ($arr as $key => $value){
        if( $value == $sStr && !$bTrobat){
            $bTrobat=true;
        }
        else{
            $t[$key]=$value;
        }
    }
    return $t;      
}
?>
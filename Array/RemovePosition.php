<?php
/**
 * Elimina una posición determinada del array
 *
 * @param array $arr
 * @param int $nPos
 * @param array sin la posición eliminada
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function RemovePosition( $arr, $nPos ){
    $t = array();
    $n=0;
    foreach ($arr as $key => $value){
        if($nPos != $n){
            $t[$key]=$value;
        }
        $n++;
    }                
    return $t;
}

?>
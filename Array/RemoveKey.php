<?php
/**
 * Elimina una clave y su valor del array
 *
 * @param array $arr
 * @param string $sKey
 * @return array sin la clave indicada
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function RemoveKey( $arr, $sKey ){
    $t = array();
    $bTrobat=false;
    foreach ($arr as $key => $value){
        if( $key == $sKey && !$bTrobat){
            $bTrobat=true;
        }
        else{
            $t[$key]=$value;
        }
    }            
    return $t;
}
?>
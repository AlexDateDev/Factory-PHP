<?php
/**
 * Devuelve una array identico
 *
 * @param array $arr
 * @return array
 * @version         3.2        => 14-05-2010
 */
static function &CloneArray( $arr ){
    $aTmp = array();
    foreach( $arr as $key => $value ){
        $aTmp[$key]=$value;
    }
    return $aTmp;
}
?>
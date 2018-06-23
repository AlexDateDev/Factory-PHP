<?php
/**
 * Ordena los valores de un array, se mantienen las claves
 *
 * @param array $arr
 * @param bool $bAscendent
 * @return array
 * @version         3.2        => 14-05-2010
 */
static function &SortValues( $arr, $bAscendent=true ){
    $aTmp = self::Clone($arr);
    if( $bAscendent){
        asort($aTmp);
    }
    else{
        arsort($aTmp);
    }
    return $aTmp;
}
?>
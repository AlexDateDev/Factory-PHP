<?php
/**
 * Ordena un array por los valroes de forma natural, Se pierdenlas claves
 *
 * @param array $arr
 * @param bool $bAscendent
 * @return array
 * @version         3.2        => 14-05-2010
 */
static function &SortValuesNatural( $arr, $bAscendent=true ){
    $aTmp = self::Clone($arr);
    if( $bAscendent){
        usort($aTmp, "strnatcmp");
    }
    else{
        usort($aTmp, "strnatcmp");
        $aTmp = self::Reverse($aTmp);
    }
    return $aTmp;
}
?>
<?php
/**
 * Retorna l'index que ocupa un valor en un array o -1 si no existeix
 *
 * @param array $arr Array on buscar el valor
 * @param string $sValue Valor al cual buscar la seva clau
 * @return int | -1
 *
 * @version 3.0        => 12-4-2008
 */
static function IndexOfValue( $arr, $sValue )
{
    if( count($arr)==0){
        return -1;      
    }
    $key = array_search( $sValue, $arr);
    if( false === $key){
        return -1;
    }
    return $key;
}
?>
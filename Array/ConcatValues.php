<?php
/**
 * Donat un valor, concatena un valor a una posició clau
 *
 * @param array $arr
 * @param string | int $key
 * @param string $sStr
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function ConcatValue( &$arr, $key, $sStr)
{
    if( isset( $arr[ $key])){
        $arr[ $key ] .= $sStr;
    }
    else{
        $arr[ $key ] = $sStr;
    }
}
?>
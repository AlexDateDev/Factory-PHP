<?php
/**
 * Donat un array suma un valor a una posició clau
 *
 * @param array $arr
 * @param string | int $key
 * @param int $nNum
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function AddValueNum( &$arr, $key, $nNum)
{
    if( isset( $arr[ $key])){
        $arr[ $key ] += $nNum;
    }
    else{
        $arr[ $key ] = $nNum;
    }
}


?>

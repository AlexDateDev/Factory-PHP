<?php
/**
 * Devuelve un array con las claves y valores inercambiados
 *
 * @param array $arr
 * @return array
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function SwapKeyValue( $arr){
    return array_flip($arr);
}
?>
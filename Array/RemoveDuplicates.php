<?php
/**
 * Devuelve un array sin duplicados
 *
 * @param array $arr
 * @return array
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function RemoveDuplicates( $arr ){
    return array_unique($arr);
}
?>
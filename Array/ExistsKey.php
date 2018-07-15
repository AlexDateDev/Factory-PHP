<?php
/**
 * Indica si una clave existe en los indices de un array
 *
 * @param array $arr
 * @param string $key
 * @return bool    
 *
 * @version 3.0        => 12-4-2008
 */
static function ExistsKey( $arr , $key)
{
    return ( array_key_exists(  $key, $arr));
}
?>
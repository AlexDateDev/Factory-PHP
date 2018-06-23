<?php
/**
 * Convierte un array en un string con sus valores separados por un separador
 * y cada valor entre comillas
 *
 * @param array $arr
 * @param string $sSep
 * @return string
 *
 * @version 3.3        => 15-01-2011
 */
static function ImplodedToString( $arr, $sSep='","' )
{               
    return '"'.implode( $sSep, $arr).'"';
}
?>
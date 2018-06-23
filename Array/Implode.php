<?php
/**
 * Convierte un array en un string con sus valores separados por un separador
 *
 * @param array $arr
 * @param string $sSep
 * @return string
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function Implode( $arr, $sSep=',' ){
    return implode( $sSep, $arr);
}
?>
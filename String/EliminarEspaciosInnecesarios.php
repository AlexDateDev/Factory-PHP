<?php
/**
 * Elimina los espacios en blanco inncesarios, ademas de \t \n \r
 *
 * @param string $str
 * @param bool $bControlTabReturn
 * @return string
 *
 * @version     3.1        => 09-10-2015
 * @version     3.0        => 19-06-2008
 */
function EliminarEspaciosInncesarios($str, $bControlTabReturn=false)
{
    if( $bControlTabReturn ){
        $str = preg_replace('/[\n\r\t]+/', '', $str);
    }
    return preg_replace('/\s{2,}/', ' ', $str);
}

$a = EliminarEspaciosInncesarios( " ab    c d e f  "); // $a = (string:12) " ab c d e f "
$a = EliminarEspaciosInncesarios( " ab    c\td\r\ne f  ", true); //$a = (string:10) " ab cde f "
$a = EliminarEspaciosInncesarios( " ab \t\t  c\td\r\ne f  ", true); //$a = (string:10) " ab cde f "



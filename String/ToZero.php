<?php
/**
 * Muestra el valor string 0 per un valor null, vacio o zero
 *
 * @param string $str
 * @return string
 * @package String
 *
 * @version     3.1        => 09-10-2015
 * @version     3.0        => 19-06-2008
 */
function ToZero($str)
{
    if( empty($str)){
        return '0';
    }
    return $str;
}

<?php
/**
 * Devuelve un string formado por microtime con decimales
 *
 * @return string
 *
 * @version     3.0        => 19-06-2008
 */
function get_microtime_float()
{
    list( $usec, $sec ) = explode( " ", microtime() );
    return strval( (float)$usec + (float)$sec );
} 

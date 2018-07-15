<?php
/**
 * Devuelve la query_string del documento o '' si no tiene
 *
 * @return string
 *
 * @version     3.0        => 19-06-2008
 */
 function GetQueryStruing()
{
    if( isset( $_SERVER['QUERY_STRING'] ) && !empty($_SERVER['QUERY_STRING'])) {
        return $_SERVER['QUERY_STRING'];
    }
    return '';  
}      
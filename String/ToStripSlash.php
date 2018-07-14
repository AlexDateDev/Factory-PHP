<?php
/**
* Función que estandariza las barras inclinadas para que no de errores
*
* @param string
* @return string
* @package String
*
* @version     3.1        => 09-10-2015
* @version     3.0        => 19-06-2008
*/
function ToStripSlashes( $str ) //strip_slashes($str)
{
	$ret = '';
    if ( !get_magic_quotes_gpc() || !is_string($str) ){
        $ret = $str;
    }
    else if ( is_string($str) ){
    	$ret = stripslashes($str);
	}
    else{
        $ret = $str;
  	}
  	return $ret;
}

$a = ToStripSlashes("Funciona");			// $a = (string:8) Funciona
$a = ToStripSlashes("Funciona 'nono'");		// $a = (string:15) Funciona 'nono'
$a = ToStripSlashes("Funciona \'nono\'");	// $a = (string:15) Funciona 'nono'
$a = ToStripSlashes("Funciona \"nono\"");	// $a = (string:15) Funciona "nono"
$a = ToStripSlashes("Path=C:\dir1\d2\\");	// $a = (string:13) Path=C:dir1d2

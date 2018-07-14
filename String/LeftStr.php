<?php
/**
* Retorna un text per l'esquerra fins a una text delimitador
*
* @param string Text on buscar
* @param string delimitador
* @return string String o '' si no el troba
* @package String
*
* @version     3.1        => 09-10-2015
* @version     3.0        => 19-06-2008
*/
function LeftStr( $txt, $sStrToFind )
{
	$pos = strpos($txt, $sStrToFind);
	$ret = '';
    if(false !== $pos){
       $ret = substr( $txt, 0, $pos);
    }
    return $ret;
}

$a = LeftStr( "abcdefghijklm", "d");	// $a = (string:3) abc
$a = LeftStr( "abcdefghijklm", "def");	// $a = (string:3) abc
$a = LeftStr( "abcdefghijklm", "djk");	// $a = (string:0)
$a = LeftStr( "abcdefghijklm", "");		// $a = (string:0)
$a = LeftStr( "abcdefghijklm", "xx");	// $a = (string:0)

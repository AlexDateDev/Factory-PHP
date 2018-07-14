<?php
/**
* Retorna un text entre dos deliminatadors
*
* @param string Text on buscar
* @param string|int Pot ser un string o un int
* @param string|int Pot ser un string o un int
* @return string String o '' si no el troba
* @package String
*
* @version     3.1        => 09-10-2015
* @version     3.0        => 19-06-2008
*/
function Mid( $txt, $ini, $fi )
{
	$ret = '';
    if( is_string($ini) && is_string($fi)){
        if( strpos( $txt, $ini ) !== false){
            $pi = strpos( $txt, $ini)+strlen($ini);
            $lon = strpos($txt, $fi) - $pi;
            $ret = substr( $txt, $pi, $lon);
        }
    }
    else if( is_string($ini) && is_numeric($fi)){
        if( strpos($txt, $ini ) !== false){
            $pi = strpos( $txt, $ini)+strlen($ini);
            $ret = substr( $txt, $pi, $fi);
        }
    }
    else if( is_numeric($ini) && is_numeric($fi)){
        $ret = substr( $txt, $ini, $fi );
    }
    else{
        alert( 'Mid: ini, fi no determinado');
    }
    return $ret;
}

$a = Mid( "abcdefghijklm", "d", "j");	// $a = (string:5) efghi
$a = Mid( "abcdefghijklm", "def", "l");	// $a = (string:5) ghijk
$a = Mid( "abcdefghijklm", "djk", "hi");// $a = (string:0)
$a = Mid( "abcdefghijklm", "cde", 3);	// $a = (string:3) fgh
$a = Mid( "abcdefghijklm", "cde", 30);	// $a = (string:8) fghijklm
$a = Mid( "abcdefghijklm", "cde", 0);	// $a = (string:0)

$a = Mid( "abcdefghijklm", 5, 2);		// $a = (string:2) fg
$a = Mid( "abcdefghijklm", 5, 20);		// $a = (string:8) fghijklm
$a = Mid( "abcdefghijklm", 0, 2);		// $a = (string:2) ab
$a = Mid( "abcdefghijklm", 0, 20);		// $a = (string:13) abcdefghijklm


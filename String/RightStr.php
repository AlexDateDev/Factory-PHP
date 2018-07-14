<?php
/**
* Retorna un text per la dreta a partir d'un text determinat
* començant a contar desde l'esquerra.
*
* @param string Text on buscar
* @param string_int Pot ser un string o un int
* @return string String o '' si no el troba
* @package String
*
* @version     3.1        => 09-10-2015
* @version     3.0        => 19-06-2008
*/
function RightStr( $txt, $sStrToFind, $caseInsensitive=true )
{
	$ret = '';
	if( $caseInsensitive){
		$pos = stripos( $txt, $sStrToFind);
	}
	else{
		$pos = strpos( $txt, $sStrToFind);
	}
    if( $pos !== false){
		$ret = substr( $txt,$pos+strlen($sStrToFind), strlen($txt));
    }
    return $ret;
}
$a = RightStr( "abcdefghijk", "f");	// $a = (string:5) ghijk
$a = RightStr( "abcdefghijk", "fgh");	// $a = (string:3) ijk
$a = RightStr( "abcdefghijk", "fGh");	// $a = (string:3) ijk
$a = RightStr( "abcdefghijk", "fGh", false);	// $a = (string:0)
$a = RightStr( "abcdefghijk", "fff");	// $a = (string:0)
$a = RightStr( "abcdefghijk", "");	// $a = (string:0)
$a = RightStr( "abcdefghijk", "b");	// $a = (string:9) cdefghijk


<?php
/**
* Retorna un text per la dreta d'una longitud determinada,
* començant a contar desde la dreta
*
* @param string Text on buscar
* @param int
* @return string String o '' si no el troba
* @package String
*
* @version     3.1        => 09-10-2015
* @version     3.0        => 19-06-2008
*/
function RightNum( $str, $nLen )
{
	$ret = '';
	$len = strlen($str);
    if( $len <= $nLen){
        $ret = '';
    }
    if( $nLen > $len ){
    	$ret = $str;
    }
    else{
    	$ret = substr( $str, $len-$nLen);
    }
    return $ret;
}

$a = RightNum( "abcdefghijk", 1);	// $a = (string:5) k
$a = RightNum( "abcdefghijk", 5);	// $a = (string:5) ghijk
$a = RightNum( "abcdefghijk", 54);	// $a = (string:11) abcdefghijk
$a = RightNum( "abcdefghijk", 0);	// $a = (boolean) false => ''
$a = RightNum( "abcdefghijk", -3);	// $a = (boolean) false => ''
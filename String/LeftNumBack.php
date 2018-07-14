<?php
/**
* Començant a contar desde l'esquerra, retorna el caracters de la seva dreta
* despres d'una longitud determianda
*
* @param string Text on buscar
* @param int
* @return string String
* @package String
*
* @version     3.1        => 09-10-2015
* @version     3.0        => 19-06-2008
*/
function LeftNumBack( $str, $nLen )
{
    // -- Comensant per l'esquerra, retorna la part de la dreta
    return substr( $str, $nLen);
}
$a = LeftNumBack( "abcdefghijklm", 3);		// $a = (string:10) defghijklm
$a = LeftNumBack( "abcdefghijklm", 10);		// $a = (string:10) klm
$a = LeftNumBack( "abcdefghijklm", 0);		// $a = (string:13) abcdefghijklm
$a = LeftNumBack( "abcdefghijklm", 50);		// $a = (boolean) false
$a = LeftNumBack( "abcdefghijklm", -12);	// $a = (string:12) bcdefghijklm
$a = LeftNumBack( "", 3);					// $a = (boolean) false

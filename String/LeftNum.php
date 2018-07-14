<?php
/**
* Retorna el text de l'esquerra d'una longitud determinada, 
* començant a contar desde l'esquerra
*
* @param string Text on buscar
* @param int
* @return string String
*
* @version     3.1        => 09-10-2015
* @version     3.0        => 19-06-2008
*/
function LeftNum( $str, $nLen )
{
    // -- Comensant per l'esquerra, retorna la part de l'esquerra
    return substr( $str, 0, $nLen);
}

$a = LeftNum( "abcdefghijklm", 3);		// $a = (string:3) abc
$a = LeftNum( "abcdefghijklm", 0);		// $a = (string:0)
$a = LeftNum( "abcdefghijklm", 50);		// $a = (string:13) abcdefghijklm
$a = LeftNum( "abcdefghijklm", -12);	// $a = (string:1) a
$a = LeftNum( "", 3);					// $a = (boolean) false


/**
 * The function is used because currently we are not supporting mbstring.func_overload
 * For some user using mssql without FreeTDS, they may store multibyte charaters in varchar using latin_general collation. It cannot store so many mutilbyte characters, so we need to use strlen.
 * The varchar in MySQL, Orcale, and nvarchar in FreeTDS, we can store $length mutilbyte charaters in it. we need mb_substr to keep more info.
* @returns the substred strings.
 */
function sugar_substr($string, $length, $charset='UTF-8')
{
    if(mb_strlen($string,$charset) > $length) {
        $string = trim(mb_substr(trim($string),0,$length,$charset));
    }
    return $string;
}
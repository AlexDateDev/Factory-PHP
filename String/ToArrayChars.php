<?php
/**
 * Trasnforma un string en un array donde cada caracter es una posición
 *
 * @param string $str
 * @return array
 *
 * @version     3.1        => 09-10-2015
 * @version     3.0        => 19-06-2008
 */
function ToArrayChars( $str )
{
    return preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
}

$a = ToArrayChars("one, two");

/*
$a = Array [8]
	0 = (string:1) o
	1 = (string:1) n
	2 = (string:1) e
	3 = (string:1) ,
	4 = (string:1)
	5 = (string:1) t
	6 = (string:1) w
	7 = (string:1) o
*/

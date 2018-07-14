<?php
/**
 * Separa una frase a un array donde cada palabra es una posición
 *
 * @param string $str
 * @return array
 *
 * @version     3.1        => 09-10-2015
 * @version     3.0        => 19-06-2008
 */
function ToArrayWords( $str )
{
    return preg_split('/ /', $str, -1 );
}
$a = ToArrayWords("one, two, three,four");

/*
$a = Array [3]
	0 = (string:4) one,
	1 = (string:4) two,
	2 = (string:10) three,four
*/


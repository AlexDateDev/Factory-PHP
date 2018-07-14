<?php
/**
 * Transforma un string a un array.
 *
 * @param string $str
 * @param string $sSep
 * @return array
 * @package String
 *
 * @version     3.1        => 09-10-2015
 * @version     3.0        => 19-06-2008
 */
function ToArray( $str, $sSep )
{
    return explode( $sSep, $str);
}

$a = ToArray("123,456,789", ",");
/*
$a = Array [3]
	0 = (string:3) 123
	1 = (string:3) 456
	2 = (string:3) 789
*/
$a = ToArray("123,456,789", ".");
/*
$a = Array [1]
	0 = (string:11) 123,456,789
*/

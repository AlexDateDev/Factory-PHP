<?php
/**
 * Devuelve true si un string esta dento de otro
 *
 * @param string $sStr
 * @param string $sToFind
 * @return bool
 *
 * @version     3.1        => 09-10-2015
 * @version     3.1e
 */
function IsIn( $sStr, $sToFind)
{
    return strpos($sStr, $sToFind) !== false;
}

$a = IsIn( "Funciona OK Funciona OK", "OK"); 	// $a = (boolean) true
$a = IsIn( "Funciona OK Funciona", "ERR");	// $a = (boolean) false
$a = IsIn( "Funciona OK", "Fun");	// $a = (boolean) true
$a = IsIn( "", "Fun");	// $a = (boolean) false
$a = IsIn( "", "");	// $a = (boolean) false

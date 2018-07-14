<?php
/**
 * Devuelve un texto con la primera letra en mayúscula. Hace trim
 *
 * @param string $str
 * @return string
 * @package String
 *
 * @version     3.1        => 09-10-2015
 * @version     3.0        => 19-06-2008
 */
function ToUCWwords($str)
{
    return trim(ucwords(strtolower($str)));
}

$a = ToUCWwords(" ok en todo lo que funciona" );	// $a = (string:26) Ok En Todo Lo Que Funciona
$a = ToUCWwords(" OK en TODO lo que funciona" );	// $a = (string:26) Ok En Todo Lo Que Funciona
$a = ToUCWwords("funcionA" );						// $a = (string:8) Funciona
$a = ToUCWwords("" );								// $a = (string:0)

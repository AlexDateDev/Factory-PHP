<?php
/**
 * Devuelve trus si el texto tiene comandos de control
 *
 * @param string $sText
 * @param string $comando => "\t", "\r",...
 * @return bool
 *
 * @version     3.0        => 08-10-2015
 */
function HasComandoControl($sText, $comando)
{
	$pattern = "\\".$comando;
    return preg_match("/(%0A|%0D|".$pattern.")/i", $sText) != 0;
}


$a = HasComandoControl( "HOLA", "\n"); 				// false
$a = HasComandoControl( "HOLA\r\nNANO", "\r");		// true
$a = HasComandoControl( "HOLA\r\nNANO", "\n");		// true
$a = HasComandoControl( "HOLA\r\nNANO", "\r\n");	// true
$a = HasComandoControl( "HOLA\r\nNANO", "\n\r");	// false
$a = HasComandoControl( "HOLA\r\nNANO", "\t");		// false
$a = HasComandoControl( "HOLA\r\n\t", "\t");		// true
$a = HasComandoControl( "\t\tHOLA\tNANO", "\t");	// true
$a = HasComandoControl( "HOLA\rNANO", "\t");		// true
$a = HasComandoControl( "HOLA\nNANO", "\r");		// true
$a = HasComandoControl( "", "\n");					// false
$a = HasComandoControl( " HOLA NANO ", "\t");		// false



<?php
/**
 * Devuelve trus si el texto tiene CR o LF
 *
 * @param string $sText
 * @return bool
 *
 * @version     3.1        => 08-10-2015
 * @version     3.0        => 19-06-2008
 */

function HasNewLines($sText)
{
    return preg_match("/(%0A|%0D|\\n+|\\r+)/i", $sText) != 0;
}


$a = HasNewLines( "HOLA"); 			// false
$a = HasNewLines( "HOLA\r\nNANO");	// true
$a = HasNewLines( "HOLA\r\n");		// true
$a = HasNewLines( "HOLA\r");		// true
$a = HasNewLines( "HOLA\n");		// true
$a = HasNewLines( "HOLA\rNANO");	// true
$a = HasNewLines( "HOLA\nNANO");	// true
$a = HasNewLines( "");				// false
$a = HasNewLines( " HOLA NANO ");	// false


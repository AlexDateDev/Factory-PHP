<?php
/**
*    Convierte un string en un double.
*    El separador decimales en el string es la coma
*    Los miles no llevab punto.
*    Param:        string
*    Devuelve:    double
*
* @version     3.1        => 09-10-2015
*/

function ToDouble($s){
    // Cambiamos la coma decimal por el punto-
    return doubleval( str_replace(',','.',$s));
}
$a = ToDouble( 1);						// $a = (double) 1
$a = ToDouble( 123);					// $a = (double) 123
$a = ToDouble( 12345);					// $a = (string:8) 12,06 KB
$a = ToDouble( 1234567890);				// $a = (double) 1234567890
$a = ToDouble( 1234567890.2344);		// $a = (double) 1234567890.2344
$a = ToDouble( 12345678901234567890);	// $a = (double) 1.2345678901235E+019
$a = ToDouble( '123');					// $a = (double) 123
$a = ToDouble( '12345');				// $a = (double) 12345
$a = ToDouble( '1234567890');			// $a = (double) 12345
$a = ToDouble( '1234567890.2344');		// $a = (double) 1234567890.2344
$a = ToDouble( '12.345678901234567890');// $a = (double) 12.345678901235

$a = ToDouble( "762900293322");			// $a = (double) 762900293322
$a = ToDouble( "12A33");				// $a = (double) 12
$a = ToDouble( "funciona");				// $a = (double) 0
$a = ToDouble( " 99 ");					// $a = (double) 99
$a = ToDouble( "");						// $a = (double) 0

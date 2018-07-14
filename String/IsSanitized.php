<?php
/**
 * Anti SQL Injection: Comprueba si el string sólo tiene número y/o letras
 * Se utiliza para el login
 *
 * @param String $sLogin
 * @return Boolean
 *
 * @version     3.1        => 09-10-2015
 */
function IsSanitized($str)
{
    return !preg_match("/[^\sa-zA-Z0-9]/i", $str);
}

$a = IsSanitized( "Funciona OK Funciona OK"); 	// $a = (boolean) true
$a = IsSanitized( ""); 	// $a = (boolean) true
$a = IsSanitized( "  "); 	// $a = (boolean) true
$a = IsSanitized( " OK "); 	// $a = (boolean) true
$a = IsSanitized( " OK? "); 	// $a = (boolean) false
$a = IsSanitized( "nombre.solo"); 	// $a = (boolean)  false
$a = IsSanitized( "OK"); 	// $a = (boolean) true
$a = IsSanitized( "mylogin001");	// $a = (boolean) false
$a = IsSanitized( "mylogin_is_err");	// $a = (boolean) false
$a = IsSanitized( "Rate!");	// $a = (boolean) false



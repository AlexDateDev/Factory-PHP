<?php
/**
 * Devuelve un numero aleatorio de longitud determinada
 *
 * @param int Numero de numeros a generar concatenados
 * @return string
 * @package String
 *
 * @version     3.1        => 09-10-2015
 * @version     3.0        => 19-06-2008
 */
function GenerateRandomNumber( $nLon=8)
{
    $r = '';
    for( $n=$nLon;$n>0;$n--){
    	$gen = "".mt_rand();
    	$pos = mt_rand(1,strlen($gen)-1);
    	$r .=$gen[$pos];
    }
    return strval($r);
}

$a =  GenerateRandomNumber();		// $a = (string:8) 79069076
$a =  GenerateRandomNumber();		// $a = (string:8) 99611738
$a =  GenerateRandomNumber(3);	// $a = (string:3) 302
$a =  GenerateRandomNumber(32);	// $a = (string:32) 39716637233774934601231984792143

$a =  GenerateRandomNumber(3);	// $a = (string:3) 034
$a =  GenerateRandomNumber(3);	// $a = (string:3) 179
$a =  GenerateRandomNumber(3);	// $a = (string:3) 076
$a =  GenerateRandomNumber(3);	// $a = (string:3) 562
$a =  GenerateRandomNumber(3);	// $a = (string:3) 180

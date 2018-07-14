<?php
/**
* Devuelve un numero aleatorio entre un mínimo y un máximo
*
* @param int $n_lon Numero de numeros a generar concatenados
* @return string
* @package String
*
* @version     3.1        => 09-10-2015
* @version     3.0        => 19-06-2008
*/
function GenerateRandomNumberRange( $nMin, $nMax)
{
	return mt_rand($nMin, $nMax);
}
$a =  GenerateRandomNumberRange( 1, 10);	//	$a = (int) 9
$a =  GenerateRandomNumberRange( 1, 10);	// 	$a = (int) 10
$a =  GenerateRandomNumberRange( 1, 10);	// 	$a = (int) 6
$a =  GenerateRandomNumberRange( 0, 1);		//	$a = (int) 0
$a =  GenerateRandomNumberRange( 0, 1);		//	$a = (int) 1
$a =  GenerateRandomNumberRange( 0, 1);		//	$a = (int) 0
$a =  GenerateRandomNumberRange( 10, 1000);	//	$a = (int) 39
$a =  GenerateRandomNumberRange( 10, 1000);	//	$a = (int) 249
$a =  GenerateRandomNumberRange( 10, 1000);	//  $a = (int) 344

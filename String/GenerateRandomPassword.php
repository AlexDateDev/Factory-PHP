<?php
/**
 * Genera un password aleatorio con números y letras
 *
 * @param int $nLenPassword
 * @return string
 *
 * @version     3.1        => 09-10-2015
 * @version     3.0        => 19-06-2008
 */
function GenerateRandomPassword( $nLenPassword=6 )
{
    $t_val = mt_rand( 0, mt_getrandmax() ) + mt_rand( 0, mt_getrandmax() );
    $t_val = md5( $t_val );
    return substr( $t_val, 0, $nLenPassword);
}

$a =  GenerateRandomPassword();		// $a = (string:6) 5561a6
$a =  GenerateRandomPassword();		// $a = (string:6) fc7274
$a =  GenerateRandomPassword(3);	// $a = (string:3) 75d
$a =  GenerateRandomPassword(32);	// $a = (string:32) 968a1cedc805a097e2c8fcfe6379fc71

$a =  GenerateRandomPassword();	//	$a = (string:6) 9f106c
$a =  GenerateRandomPassword();	// 	$a = (string:6) 9337b2
$a =  GenerateRandomPassword();	//	$a = (string:6) 52fe2e
$a =  GenerateRandomPassword();	//	$a = (string:6) 5f8fe5
$a =  GenerateRandomPassword();	//	$a = (string:6) 22cf19

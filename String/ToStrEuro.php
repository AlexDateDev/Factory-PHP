<?php
/**
 * Devuelve un valor en formato monetario +/- 1.234,00 €
 * Redondea
 *
 * @param string | float |int $value
 * @param bool $bSimbol
 * @return string
 *
 * @version     3.1        => 09-10-2015
 * @version     3.1d    => 17-07-2009    // Si value esta vacio, devuelve vacio
 * @version     3.0        => 19-06-2008
 */
function ToStrEuro($value, $bSimbol=true)
{
    if( $value === '' || is_null($value)){
        return '';
    }
    $f = floatval($value);
    $sSimbol = $bSimbol ? ' €':'';
    if(empty($f)){
        return '0'.$sSimbol;
    }
    if( $f >= 0 ){
        $sSigno = '';
    }
    else{
        $f *= (-1);
        $sSigno ='- ';
    }
    $t = number_format($f,2,',','.');
    return $sSigno.$t.$sSimbol;
}

$a = ToStrEuro( "12345");		// 	$a = (string:11) 12.345,00 €
$a = ToStrEuro( "1,34");		//	$a = ToStrEuro( "1.34");
$a = ToStrEuro( "1.34");		// 	$a = (string:6) 1,34 €
$a = ToStrEuro( 12345);			// 	$a = (string:11) 12.345,00 €
$a = ToStrEuro( 87221.43456);	// 	$a = (string:11) 87.221,43 €
$a = ToStrEuro( 87221.49456);	// 	$a = (string:11) 87.221,49 €
$a = ToStrEuro( 81.999);		// 	$a = (string:7) 82,00 €
$a = ToStrEuro( 81.996);		// 	$a = (string:7) 82,00 €
$a = ToStrEuro( 81.995);		// 	$a = (string:7) 82,00 €
$a = ToStrEuro( 81.994);		// 	$a = (string:7) 81,99 €
$a = ToStrEuro( "");			// 	$a = (string:0)
$a = ToStrEuro( "0");			// 	$a = (string:3) 0 €
$a = ToStrEuro( 0);				// 	$a = (string:3) 0 €

$a = ToStrEuro( "-12345");		// 	$a = (string:13) - 12.345,00 €
$a = ToStrEuro( "-1,34");		// 	$a = (string:8) - 1,00 €
$a = ToStrEuro( "-1.34");		// 	$a = (string:8) - 1,34 €
$a = ToStrEuro( -12345);		// 	$a = (string:13) - 12.345,00 €
$a = ToStrEuro( -87221.43456);	// 	$a = (string:13) - 87.221,43 €
$a = ToStrEuro( "-");			// 	$a = (string:3) 0 €
$a = ToStrEuro( "-0");			// 	$a = (string:3) 0 €
$a = ToStrEuro( -0);			//	$a = (string:3) 0 €

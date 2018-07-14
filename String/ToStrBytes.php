<?php
/**
* Pasamos un valor de bytes a un string amb KBytes, MBytes o GBytes
*
* @param int
* @return srting
*  @package String
*
* @version     3.1        => 09-10-2015
* @version     3.0        => 19-06-2008
*/
function ToStrBytes( $val )
{
    $_1K = 1024;
    $_1M = 1024*1024;
    $_1G = 1024*1024*1024;

    $tamany = $val;
    if( is_int($val)){
    	$tamany = intval( $val );
    }
    else if( is_long($val)){
    	$tamany = $val;
    }
    else if( is_string($val)){
    	$tamany = floatval($val);
    }

    if( $tamany < $_1K ) {
        $str_byt = $tamany . ' Bytes';
    }
    else if( $tamany > $_1K && $tamany < $_1M ){
        $str_byt = number_format( $tamany / $_1K, 2, ',', '.') . ' KB';
    }
    else if( $tamany > $_1M && $tamany < $_1G ){
        $str_byt = number_format( $tamany / $_1M, 2, ',', '.') . ' MB';
    }
    else if( $tamany > $_1G ){
        $str_byt = number_format( $tamany / $_1G, 2, ',', '.') . ' GB';
    }
    else{
        $str_byt = '0';
    }
    return $str_byt;
}

$a = ToStrBytes( 1);						// $a = (string:7) 1 Bytes
$a = ToStrBytes( 123);						// $a = (string:9) 123 Bytes
$a = ToStrBytes( 12345);					// $a = (string:8) 12,06 KB
$a = ToStrBytes( 1234567890);				// $a = (string:7) 1,15 GB
$a = ToStrBytes( 12345678901234567890);		// $a = (string:20) 11.497.809.459,67 GB
$a = ToStrBytes( "762900293322");			// $a = (string:9) 710,51 GB
$a = ToStrBytes( "12A33");					// $a = (string:8) 12 Bytes


/**
 * For translating the php.ini memory values into bytes.  e.g. input value of '8M' will return 8388608.
 */
function return_bytes($val)
{
	$val = trim($val);
	$last = strtolower($val{strlen($val)-1});

	switch($last)
	{
		// The 'G' modifier is available since PHP 5.1.0
		case 'g':
			$val *= 1024;
		case 'm':
			$val *= 1024;
		case 'k':
			$val *= 1024;
	}

	return $val;
}

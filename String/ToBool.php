<?php
/**
 * Transforma un string SI/NO-YES/NO-Y/S-S/N-1/0 a bool.
 * Devuelve -1 si no se puede convertir a true o false
 *
 * @param string $strBool
 * @return bool
 * @package String
 *
 * @version     3.1        => 09-10-2015
 * @version     3.1d    => 17-07-2009    // Si value esta vacio, devuelve vacio
 * @version     3.0        => 19-06-2008
 */
function ToBool( $strBool )
{
	$ret = -1;
    if( $strBool === '' || is_null($strBool)){
        $ret =-1;
    }
	else if( is_string($strBool)){
    	$name = strtolower(strtr($strBool,'Õ”ÌÛ','ioio'));
		$sn = ereg_replace('[^[:alnum:]._-]', '', strtoupper(trim($name)));
        if( $sn=='S' || $sn=='Y' || $sn == 'SI' || $sn == 'YES' || $sn == '1'){
            $ret = true;
        }
        else if( $sn=='N' || $sn == 'NO' || $sn == '0'){
			$ret = false;
        }
        else{
            $ret = -1;
        }
    }
    else if( is_numeric($strBool)){
		if( $strBool === 1){
			$ret = true;
		}
		else if( $strBool === 0){
			$ret =false;
		}
		else{
			$ret = -1;
		}
    }
    else if( is_bool($strBool)){
    	return $strBool;
    }
    return $ret;
}

$a = ToBool( "Si");		// $a = (boolean) true
$a = ToBool( "NO");		// $a = (boolean) false
$a = ToBool( " SÕ ");	// $a = (boolean) true
$a = ToBool( "no");		// $a = (boolean) false
$a = ToBool( "no-no");	// $a = (int) -1
$a = ToBool( "error");	// $a = (int) -1
$a = ToBool( "1");		// $a = (boolean) true
$a = ToBool( " 0 ");	// $a = (boolean) false
$a = ToBool( " 1 ");	// $a = (boolean) true
$a = ToBool( "1");		// $a = (boolean) true
$a = ToBool( "S");		// $a = (boolean) true
$a = ToBool( "N");		// $a = (boolean) false
$a = ToBool( "Y");		// $a = (boolean) true
$a = ToBool( "N");		// $a = (boolean) false
$a = ToBool( "YES");	// $a = (boolean) true
$a = ToBool( 1 );		// $a = (boolean) true
$a = ToBool( 0 );		// $a = (boolean) false
$a = ToBool( 123 );		// $a = (int) -1
$a = ToBool( true );		// $a = (boolean) true
$a = ToBool( false );		// $a = (boolean) false
$a = ToBool( "");		// $a = (boolean) -1
$b = null;
$a = ToBool( $b);		// $a = (boolean)-1

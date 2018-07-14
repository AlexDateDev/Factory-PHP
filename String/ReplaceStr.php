<?php
/**
 * Substitueix uns string de dintre d'un altre estring
 * Diferencie entre majuscules i minúscules
 *
 * @param string $sBase String base on substituir
 * @param string $sToFind String a substituir
 * @param string $sToReplace String a posar
 * @return string
 * @package String
 *
 * @version     3.1        => 09-10-2015
 * @version     3.0        => 19-06-2008
 */
function ReplaceStr( $sBase, $sToFind, $sToReplace, &$total=null )
{
	$ret = '';
	if(is_null($total)){
    	$ret = str_replace( $sToFind,$sToReplace,$sBase);
	}
	else{
		$ret = str_replace( $sToFind,$sToReplace,$sBase, $total);
	}
	return $ret;
}

$a = ReplaceStr( "abc def ghi jkl", "ef", "XY");	// $a = (string:15) abc dXY ghi jkl
$a = ReplaceStr( "abc def ghi jkl abc def ", "ef", "XY");	// $a = (string:24) abc dXY ghi jkl abc dXY
$total = 0;
$a = ReplaceStr( "abc def jkl abc def ", "ef", "XY", $total);	// $a = (string:24) abc dXY jkl abc dXY  $total=2
$a = ReplaceStr( "abc def ghi jkl", " ", "_");		// $a = (string:15) abc_def_ghi_jkl
$a = ReplaceStr( "abc def ghi jkl", "GHI", "PQR", $total);	// $a = (string:15) abc def ghi jkl  $total=0
$a = ReplaceStr( "abc def ghi jkl", "", "ZZ");		// $a = (string:15) abc def ghi jkl
$a = ReplaceStr( "abc def ghi jkl", "CBA", "ZZ");	// $a = (string:15) abc def ghi jkl


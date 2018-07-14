<?php
/**
 * Substitueix uns string de dintre d'un altre string
 * Case Insensitive
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
function ReplaceStrInsentive( $sBase, $sToFind, $sToReplace, &$total=null )
{
	$ret = '';
	if(is_null($total)){
    	$ret = str_ireplace( $sToFind,$sToReplace,$sBase);
	}
	else{
		$ret = str_ireplace( $sToFind,$sToReplace,$sBase, $total);
	}
	return $ret;
}

$a = ReplaceStrInsentive( "abc def ghi jkl", "GHI", "PQR", $total);	// $a = (string:15) abc def PQR jkl $total=1

$a = ReplaceStrInsentive( "abc def ghi jkl", "ef", "XY");	// $a = (string:15) abc dXY ghi jkl
$a = ReplaceStrInsentive( "abc def ghi jkl abc def ", "ef", "XY");	// $a = (string:24) abc dXY ghi jkl abc dXY
$total = 0;
$a = ReplaceStrInsentive( "abc def abc def ", "ef", "XY", $total);	// $a = (string:24) abc dXY abc dXY // $total=2
$a = ReplaceStrInsentive( "abc def ghi jkl", " ", "_");		// $a = (string:15) abc_def_ghi_jkl
$a = ReplaceStrInsentive( "abc def ghi jkl", "", "ZZ");		// $a = (string:15) abc def ghi jkl
$a = ReplaceStrInsentive( "abc def ghi jkl", "CBA", "ZZ");	// $a = (string:15) abc def ghi jkl


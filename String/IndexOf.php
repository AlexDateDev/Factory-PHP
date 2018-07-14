<?php
/**
 * Retorna la posició d'un string dintre d'un altre o -1 si no el troba
 *
 * @param string $str
 * @param string $strToFind
 * @param int $nOffset
 * @return int
 * @package String
 *
 * @version     3.1        => 09-10-2015
 * @version     3.0        => 19-06-2008
 */

function IndexOf( $str, $strToFind, $nOffset=false )
{
    if( $nOffset){
        $ret = strpos( $str, $strToFind, $nOffset);
    }
    else{
        $ret = strpos( $str, $strToFind );
    }
    if(false===$ret){
        return -1;
    }
    return $ret;
}

$a = IndexOf( "Funciona OK", "OK"); 	// $a = (int) 9
$a = IndexOf( "Funciona OK", "ERR");	// $a = (int) -1
$a = IndexOf( "Funciona OK", "Fun");	// $a = (int) 0
$a = IndexOf( "Funciona OK", "Fun", 4);	// $a = (int) -1
$a = IndexOf( "  Funciona OK", "Fun");	// $a = (int) 2

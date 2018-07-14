<?php
/**
 * Retorna la posició de l'ultim string dintre d'un altre o -1 si no el troba
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
function IndexOfLast( $str, $strToFind, $nOffset=false )
{
    if( $nOffset){
        $ret = strrpos( $str, $strToFind, $nOffset);
    }
    else{
        $ret = strrpos( $str, $strToFind );
    }
    if( false===$ret){
        return -1;
    }
    return $ret;
}
$a = IndexOfLast( "Funciona OK Funciona OK", "OK"); 	// $a = (int) 21
$a = IndexOfLast( "Funciona OK Funciona", "ERR");	// $a = (int) -1
$a = IndexOfLast( "Funciona OK Funciona", "Fun");	// $a = (int) 12
$a = IndexOfLast( "Funciona OK Funciona", "Fun", 4);	// $a = (int) 12
$a = IndexOfLast( "Funciona OK Funciona", "Fun", 15);	// $a = (int) -1
$a = IndexOfLast( "  Funciona OK  Funciona", "Fun");	// $a = (int) 15

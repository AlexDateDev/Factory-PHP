<?php
/**   
 * Busca si existeix una paraula sencera dintre d'una altra, no un text sino una paraula
 * Ex:  "web" => "PHP is web scripting" => true (es una paraula)
 * Ex:  "web" => "PHP is web, scripting" => true (es una paraula)
 * Ex:  "web" => "PHP is web,scripting" => true (es una paraula)
 *        "web" => "PHP is the website scripting" => false (no es una paraula)
 *
 * @param sting $sBase
 * @param string $sStrToFind
 * @return bool
 *
 * @version     3.1        => 08-10-2015
 * @version     3.0        => 19-06-2008
 */

function BuscarPalabra( $sBase, $sStrToFind )
{
    return (bool)preg_match("/\b".$sStrToFind."\b/i", $sBase);
}
?>

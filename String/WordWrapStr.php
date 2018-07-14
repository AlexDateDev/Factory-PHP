<?php
/**
 * Separa un texto en un número de caracteres pro líniea
 * Por defecto inserta al final de cada linea \n.
 * Ex: "The quick brown fox jumped over the lazy dog."
 *            The quick brown fox<br />
 *             jumped over the lazy<br />
 *             dog.
 *
 * @param string $sText
 * @param int $nLen
 * @param string $sBreak
 * @return string
 *
 * @version     3.1        => 08-10-2015
 * @version     3.0        => 19-06-2008
 */
 
function WordWrapStr( $sText, $nLen, $sBreak='')
{
    if( empty($sBreak)){
        return  wordwrap($sText, $nLen);
    }
    else{
        return  wordwrap($sText, $nLen, $sBreak);
    }
}

$a = WordWrapStr( "The quick brown fox jumped over the lazy dog adn every day is perfect.", 20, "<br />");
// $a = (string:85) The quick brown fox<br />jumped over the lazy<br />dog adn every day is<br />perfect.

$a = WordWrapStr( "The quick brown fox jumped over the lazy dog adn every day is perfect.", 20);
/* $a = (string:70) The quick brown fox
jumped over the lazy
dog adn every day is
perfect.
*/
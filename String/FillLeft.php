<?php
/**
 * Rellena por la izquierda un string con un pattern concreto
 *
 * @param string $txt
 * @param char $patternFill
 * @param int $width
 * @return string
 *
 * @version     3.1        => 08-10-2015
 */

function FillLeft($txt, $patternFill, $width){
    $filled = str_repeat($patternFill, $width) . $txt;
    $ret = substr( $filled, strlen($filled)-$width);
    return $ret;
}

$a = FillLeft( "HOLA", "x", 8); // $ret = (string:8) "xxxxHOLA"
$a = FillLeft( "HOLA", "x", 2); // $ret = (string:2) "LA"
$a = FillLeft( "HOLA", " ", 10); // $ret = (string:2) "      HOLA"

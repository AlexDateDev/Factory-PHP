<?php

/**
 * Gerera un string único de 32 caracteres
 *
 * @return string
 *
 * @version     3.1        => 08-10-2015
 * @version     3.0        => 19-06-2008
 */
function GenerarUID32()
{
    $quo1 = (date('Y')*date('m')*date('d'));
    $quo2 = (date('H')+date('i')+date('s'));
    return md5(($quo1*$quo2)*(rand(1,99999)));
}

$a = GenerarUID32(); // $a = (string:32) e8f09bced1c46eb22e55aa3d594cc534
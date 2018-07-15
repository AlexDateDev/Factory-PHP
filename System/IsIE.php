<?php
/**
 * Devuelve true si se esta utilizando IE
 *
 * @return bool
 *
 * @version     3.0        => 19-06-2008
 */
function IsIE()
{
    return (strpos($_SERVER['HTTP_USER_AGENT'], "Firefox") !== true);
}    
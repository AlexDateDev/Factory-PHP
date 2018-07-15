<?php
/**   
 * Devuelve el protocolo utilizado (http,https,...)
 *
 * @return String
 */
function GetServerProtocol()
{
    $sProtocol = $_SERVER['SERVER_PROTOCOL']; // => HTTP/1.1
    return strtolower(substr($sProtocol,0,strpos($sProtocol,'/'))); // http

}
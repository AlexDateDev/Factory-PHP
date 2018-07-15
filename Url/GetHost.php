<?php
/**    
 * Retorna el nom del host d'una url format http
 * Ex: "http://www.php.net/index.html" => www.php.net
 *
 * @param string $sHttp
 * @return strig
 *
 * @version     3.0        => 19-06-2008
 */
function get_host( $sHttp )
{
    $matches =array();
    preg_match("/^(http:\/\/)?([^\/]+)/i",$sHttp, $matches);
    return $matches[2];
}
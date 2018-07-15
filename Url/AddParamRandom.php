<?php
/**
 * Aade un random a la url
 *
 * @param string_url $sUrl
 * @param int $nLon
 *
 * @version     3.1a    => 19-06-2008    => Cambio por strpos
 * @version     3.0        => 19-06-2008
 */
function append_random( &$sUrl, $nLon=1 )
{
    $sSep = '&';
    if( strpos($sUrl,'?') ===false )
    {
        $sSep = '?';
    }
    $sUrl .= $sSep.'rnd='.STRING::get_random($nLon);
}
?>
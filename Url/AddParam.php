<?php
/**
 * Aade un parmetro y valor a la url
 *
 * @param string $sUrl
 * @param string $sParam
 * @param string $sValue
 *
 * @version     3.1a    => 19-06-2008    => Cambio por strpos
 * @version     3.0        => 19-06-2008
 */
function AddParam( &$sUrl, $sParam, $sValue )
{
    $sSep = '&';
    if( strpos($sUrl,'?') === false)
    {
        $sSep = '?';
    }
    $sUrl .= $sSep.$sParam.'='.$sValue;
}
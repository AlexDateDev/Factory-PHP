<?php
/**
 * Redireccionamos a otra url
 *
 * @param string $sUtl
 *
 * @version     3.0        => 19-06-2008
 */
function GoLocation($sUrl)
{
    // header("Status: 200"); // -- Para Chome
    header( 'location: ' . $sUrl);
    exit(0);
}
 
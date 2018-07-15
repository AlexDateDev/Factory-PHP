
<?php
/**
 * Devielve el query string de la url
 *
 * @param string_url $sUrl
 * @return string
 *
 * @version     3.1a    => 25-03-2009    => Obtener la posición de '?'
 * @version     3.0        => 19-06-2008
 */
function get_query_string( $sUrl )
{
    $ret = strpos( $sUrl, '?' );
    if( false === $ret )
    {
        return '';
    }
    $pi = $ret+1;
    return substr( $sUrl, $pi, strlen($sUrl));
}
?>

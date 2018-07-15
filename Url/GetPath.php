
<?php
/**
 * Devuelve todo el path de la url (menos el nombre del archivo)
 *
 * @param string_url $sUrl
 * @return string
 *
 * @version     3.1a    => 25-03-2009    => Obtener la posición de '?'
 * @version     3.0        => 19-06-2008
 */
function get_path( $sUrl )
{
    $ret = strpos( $sUrl, '?' );
    if( false === $ret )
    {
        return '';
    }
    $t = substr( $sUrl, 0, $ret);
    $t = split('/',$t);
    $t[ count($t)-1] = '';
    return join( '/',$t);
}
?>

<?php
/**
 * Indica si existe un parmetro
 *
 * @param string_url $sUrl
 * @return bool
 *
 * @version     3.0        => 19-06-2008
 */
function ExisteParametro( $sUrl,$sParam )
{
    $q = self::get_query_string( $sUrl );
    $a = explode('&',$q); // -- 'a[0] => id=234
    foreach ($a as $key => $value)
    {
        $b = explode('=',$a[$key]);  // $b[0] = id, $b[1]=1234
        if($b[0]==$sParam)
        {
            return true;
        }
    }
    return false;

}
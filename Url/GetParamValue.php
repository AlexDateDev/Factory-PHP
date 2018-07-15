<?php
/**
 * Devuelve el valor de un parametro
 *
 * @param string_url $sUrl
 * @param string $sParam
 * @param string $sDefValue
 * @return string
 *
 * @version     3.0        => 19-06-2008
 */
function get_param_value( $sUrl, $sParam, $sDefValue='' )
{
    $q = self::get_query_string( $sUrl );
    $a = explode('&',$q); // -- 'a[0] => id=234
    foreach ($a as $key => $value)
    {
        $b = explode('=',$a[$key]);  // $b[0] = id, $b[1]=1234
        if($b[0]==$sParam)
        {
            return $b[1];
        }
    }
    return $sDefValue;
}
?>

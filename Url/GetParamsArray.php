
<?php  
/**
 * Devuelve un array con los parametros y valores
 *
 * @param string $sUrl
 * @return array
 *
 * @version     3.0        => 19-06-2008
 */
function GetParamsArray( $sUrl )
{
    $q = self::get_query_string( $sUrl );
    $t = array();
    $a = explode('&',$q);
    foreach ($a as $key => $value)
    {
        $b = explode('=',$a[$key]);
        $t[$b[0]]=$b[1];
    }
    return $t;
}
?>

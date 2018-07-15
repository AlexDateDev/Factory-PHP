

<?php

/**
 * Devuelve un array de objetos con todo el recorrido del ResultSet
 *
 * @param resource $rResource
 * @param object $oObj objeto a crear para el array
 * @return array OBJECT | array vacio
 */
function db_bind_array_obj( $rResource, $oObj)
{
    $p = mysql_num_rows( $rResource );
    $o = array();
    $sObj = get_class($oObj);
    for( $n=0; $n<$p; $n++ )
    {
        $o[] = new $sObj( mysql_fetch_array( $rResource, MYSQL_ASSOC ));
    }
    return $o;
}
?>

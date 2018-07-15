

<?php

/**
 * Retorna el número de files del resultat d'una consulta
 *
 * @param resource $rResource
 * @return int
 */
function db_num_rows( $rResource )
{
    if(!is_resource($rResource))
    {
        return 0;
    }
    $ret = mysql_num_rows( $rResource );
    if( $ret === false )
    {
        db_throw_exception( null, __CLASS__.'::'.__FUNCTION__. ' - Impossible retornar el número de files' );
    }
    return $ret;
}


?>

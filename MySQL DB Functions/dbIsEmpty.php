
<?php

/**
 * Indica si hi ha resultat
 *
 * @param resource $rResource
 * @return bool
 */
function db_is_empty( $rResource )
{
    if( !is_resource($rResource))
    {
        return true;
    }
    $ret = mysql_num_rows( $rResource );
    if( $ret === false )
    {
        db_throw_exception( null, __CLASS__.'::'.__FUNCTION__. ' - Impossible retornar el número de files: is_empty' );
        return null;
    }
    else
    {
        return $ret == 0;
    }
}

?>

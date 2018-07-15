
<?php

/**
 * Tanquem el resultat d'una consulta sql
 *
 * @param resource $rResource
 */
function db_result_close( $rResource )
{
    if( ! mysql_free_result ( $rResource) )
    {
        db_throw_exception( null, __CLASS__.'::'.__FUNCTION__. ' - Impossible alliverar memòria de la connexió' );
    }
}
?>

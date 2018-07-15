<?php
/**
 * Retorna una array d'una consulta SQL per crear un objecte
 *
 * @param resource $rResource
 * @return array
 */
function db_fetch_obj( $rResource )
{
    return  mysql_fetch_row( $rResource );
}
?>

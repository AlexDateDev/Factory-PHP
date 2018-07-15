
<?php

/**
 * Retorna una array d'una consulta SQL on els indexs són les posicions de les columnes.
 *
 * @param resource $rResource
 * @return array
 */
function db_fetch_row( $rResource )
{
    return  mysql_fetch_row( $rResource );
}
?>

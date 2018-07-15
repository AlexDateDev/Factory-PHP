
<?php

/**
 * Retorna una array d'una consulta SQL on els indexs són els noms dels camps.
 *
 * @param resource $rResource
 * @return array
 */
function db_fetch_array( $rResource )
{
    return  mysql_fetch_array( $rResource, MYSQL_ASSOC );
}

?>

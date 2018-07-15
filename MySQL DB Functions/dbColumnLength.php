
<?php

/**
 * Devuelve la longitud del dato dato que contiene una columna
 * La primera columna es la 0
 * @param resource $rResource
 * @return string
 */
function db_column_len( $rResource, $nColumn )
{
    return  mysql_field_len( $rResource, $nColumn );
}
?>


<?php
/**
 * Devuelve el tipo de dato que contiene una columna
 * La primera columna es la 0
 * @param resource $rResource
 * @return string
 */
function db_column_flags( $rResource, $nColumn )
{
    return  mysql_field_flags( $rResource, $nColumn );
}
?>

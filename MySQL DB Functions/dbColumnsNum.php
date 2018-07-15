
<?php
/**
 * Devuelve el número de columnas que contiene el resultado
 *
 * @param resource $rResource
 * @return int
 */
function db_columns_num( $rResource )
{
    return  mysql_num_fields( $rResource );
}
?>

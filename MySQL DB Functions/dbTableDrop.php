
<?php

/**
 * Elimina una tabla
 *
 * @param string $sTable
 */
function db_table_drop($sTable,$hDB)
{
        $sql = 'DROP TABLE {'. $sTable .'}';
    $result = mysql_query( $sql, $hDB);
    if( !$result )
    {
        db_throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sql.']] ' );
    }
    return $result;
}

?>


<?php

/**
 * Renombra una tabla
 *
 * @param string $sTable
 * @param string $sNewTableName
 */
function db_table_rename( $sTable, $sNewTableName, $hDB)
{
        $sql = 'ALTER TABLE {'. $sTable .'} RENAME TO {'. $sNewTableName .'}';
    $result = mysql_query( $sql, $hDB);
    if( !$result )
    {
        db_throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sql.']] ' );
    }
    return $result;
}
?>

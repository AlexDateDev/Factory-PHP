
<?php

/**
 * Elimina un índide de una tabla
 *
 * @param string $sTable
 * @param string $sName
 */
function db_index_drop($sTable, $sName,$hDB)
{
        $sql = 'ALTER TABLE {'. $sTable .'} DROP INDEX '. $sName;
    $result = mysql_query( $sql, $hDB);
    if( !$result )
    {
        db_throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sql.']] ' );
    }
    return $result;
}
?>

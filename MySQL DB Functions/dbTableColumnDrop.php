
<?php

/**
 * Elimina un campo de una tabla
 *
 * @param string $sTable
 * @param string $sField
 */
function db_field_drop($sTable, $sField,$hDB)
{
        $sql = 'ALTER TABLE {'. $sTable .'} DROP '. $sField;
    $result = mysql_query( $sql, $hDB);
    if( !$result )
    {
        db_throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sql.']] ' );
    }
    return $result;
}

?>
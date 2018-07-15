
<?php

/**
 * Inserta una clave única
 *
 * @param string $sTable
 * @param string $sName
 * @param string | array $asFields
 */
function db_unique_key_add($sTable, $sName, $asFields,$hDB)
{
        $sql = 'ALTER TABLE {'. $sTable .'} ADD UNIQUE KEY '. $sName .' ('. _create_key_sql($asFields) .')';
    $result = mysql_query( $sql, $hDB);
    if( !$result )
    {
        db_throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sql.']] ' );
    }
    return $result;
}
?>

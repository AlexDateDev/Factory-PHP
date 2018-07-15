
<?php

/**
 * Elimina una clave primaria
 *
 * @param string $sTable
 */
function db_primary_key_drop($sTable,$hDB)
{
        $sql = update_sql('ALTER TABLE {'. $sTable .'} DROP PRIMARY KEY');
    $result = mysql_query( $sql, $hDB);
    if( !$result )
    {
        db_throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sql.']] ' );
    }
    return $result;
}

?>

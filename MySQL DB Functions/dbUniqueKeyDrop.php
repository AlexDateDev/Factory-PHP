

<?php

/**
 * Elimina una clave unica
 *
 * @param string $sTable
 * @param string $sName
 */
function db_unique_key_drop($sTable, $sName,$hDB)
{
        $sql = 'ALTER TABLE {'. $sTable .'} DROP KEY '. $sName;
    $result = mysql_query( $sql, $hDB);
    if( !$result )
    {
        db_throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sql.']] ' );
    }
    return $result;
}

?>

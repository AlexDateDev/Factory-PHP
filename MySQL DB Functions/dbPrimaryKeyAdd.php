
<?php

/**
 * Añade una clave primaria a una tabla
 *
 * @param string $sTable
 * @param string | array $asFields
 */
function db_primary_key_add($sTable, $asFields,$hDB)
{
      $sql = 'ALTER TABLE {'. $sTable .'} ADD PRIMARY KEY ('. _create_key_sql($asFields) .')';
    $result = mysql_query( $sql, $hDB);
    if( !$result )
    {
        db_throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sql.']] ' );
    }
    return $result;
}

?>

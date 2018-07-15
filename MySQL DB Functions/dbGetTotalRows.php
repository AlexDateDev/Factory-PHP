
<?php

/**
* Devuelve el número total de registros que devuelve una sentencia LINIT
* La sentencia SELECT ha de icorporar el comando SQL_CALC_FOUND_ROWS
*/
function db_get_total_rows($hDB)
{
    $result = mysql_query( 'SELECT FOUND_ROWS()', $hDB);
    if( !$result )
    {
        db_throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar fond_rows' );
    }
    list($nTotal) = mysql_fetch_row($result);
    return $nTotal;

}
?>
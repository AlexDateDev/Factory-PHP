
<?php

/**
 * Seleccionem una base de dades
 *
 * @param resource $rHandle
 * @param string $sDatabase
 */
function db_select_database( $hDB, $sDatabase )
{
    if( @mysql_select_db( $sDatabase, $hDB) === false)
    {
        db_throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible seleccionar base de datos' );
    }
}
?>

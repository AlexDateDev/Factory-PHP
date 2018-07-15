
<?php

/**
 * Executa una sentencia SQL i retorna el resultat de la consulta
 *
 * @param string | object $qry
 * @return resource
 */

function db_execute( $qry, $hPortal=''   )
{
    if(empty($hPortal))
    {
        global $hPortal;
    }
    // -- Montem la query. Pot ser un objecte o un string SELECT
    if( is_object( $qry ))
    {
        $sQuery = $qry->get_query();
    }
    else
    {
        $sQuery = $qry;
    }
    if( empty( $sQuery ))
    {
        db_throw_exception( $hPortal, __CLASS__.'::'.__FUNCTION__. ' - No existeix consulta' );
    }

    $result = mysql_query( $sQuery, $hPortal );
    if( !$result )
    {
        db_throw_exception( $hPortal, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sQuery.']] ' );
    }
    return $result;
}
?>

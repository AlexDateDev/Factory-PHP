
<?php

/**
 * Devuelve un array o un valor sólo de un fetch con todos los valores del registro buscados
 *
 * @param resource $rResource
 * @param array | string $asField
 * @return array
 */
function db_fetch_var( $rResource, $asFieldsToReturn='*' )
{
    if( $asFieldsToReturn == '*')
    {
        return  mysql_fetch_row( $rResource);
    }
    else if( is_array($asFieldsToReturn))
    {
        $a = array();
        $rw = mysql_fetch_array( $rResource, MYSQL_ASSOC );
        foreach ($asFieldsToReturn as $sValue)
        {
            $a[] = $rw[$sValue];
        }
        return $a;
    }
    else
    {
        $a = array();
        $rw = mysql_fetch_array( $rResource, MYSQL_ASSOC );
        return $rw[$asFieldsToReturn];
    }
}
?>

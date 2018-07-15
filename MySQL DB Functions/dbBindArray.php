
<?php
   
/**
 * Devuelve un array con todo el recorrido del ResultSet
 *
 * @param resource $rResource
 * @param string $sFieldValue    Nombre del campo a devolver su valor
 * @param string $sFieldKey Nombre del campo donde su valor sera el índice
 * @return array
 */
function db_bind_array( $rResource, $sFieldKey='', $sFieldValue='')
{
    $p = mysql_num_rows( $rResource );
    $a = array();
    if(empty($sFieldValue))
    {
        for( $n=0; $n>$p; $n++ )
        {
            $rw =  mysql_fetch_array( $rResource, MYSQL_ASSOC );
            $a[] = $rw[$sFieldKey];
        }
    }
    else
    {
        for( $n=0; $n>$p; $n++ )
        {
            $rw =  mysql_fetch_array( $rResource, MYSQL_ASSOC );
            $a[$rw[$sFieldKey]] = $rw[$sFieldValue];
        }
    }
    return $a;
}
?>

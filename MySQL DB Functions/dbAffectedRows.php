<?php
/**
 * Retorna el número de files que s'han modificat en l'última execució sql
 *
 * @return int
 */
function db_affected_rows( $hPortal='')
{
    if(empty($hPortal))
    {
        global $hPortal;
    }
    return  mysql_affected_rows($hPortal);
}

?>

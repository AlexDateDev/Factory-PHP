<?php
/**
 * Retorna el n�mero de files que s'han modificat en l'�ltima execuci� sql
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

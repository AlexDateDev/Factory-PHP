
<?php

/**
 * Indica si la base de dades esta oberta o no
 *
 * @return bool true si esta oberta o false si esta tancada
 */
function db_is_open( $hPortal='' )
{
    if(empty($hPortal))
    {
        global $hPortal;
    }
    return is_resource($hPortal );
}

?>

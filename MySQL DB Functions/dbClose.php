
<?php

/**
 * Tanquem la comunicaci� amb una base de dades.
 *
 */
function db_close( &$hPortal='' )
{
    if(empty($hPortal))
    {
        global $hPortal;
    }
    if( is_resource($hPortal ))
    {
        if( ! mysql_close ($hPortal ) )
        {
            db_exception( __CLASS__.'::'.__FUNCTION__. ' - Impossible tancar connexi�' );
        }
    }
    $hPortal = null;
}
?>
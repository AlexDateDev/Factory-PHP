
<?php

/**
 * Tanquem correctement una transacció
 *
 */
function db_transaction_commit($hPortal='')
{
    if(empty($hPortal))
    {
        global $hPortal;
    }
    if( !mysql_query( 'COMMIT', $hPortal ))
    {
        db_throw_exception( $hPortal, __CLASS__.'::'.__FUNCTION__ );
    }

}

?>
d
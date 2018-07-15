
<?php

/**
 * Iniciem una transacció
 *
 */
function db_transaction_start( $hPortal='')
{
    if(empty($hPortal))
    {
        global $hPortal;
    }
    if( !mysql_query( 'START TRANSACTION', $hPortal ))
    {
        db_throw_exception( $hPortal, __CLASS__.'::'.__FUNCTION__ );
    }
}
?>


<?php
      
/**
 * Cancel·lem una transaccio en curs
 *
 */
function db_transaction_rollback($hPortal='')
{
    if(empty($hPortal))
    {
        global $hPortal;
    }
    if( !mysql_query( 'ROLLBACK', $hPortal ))
    {
        db_throw_exception( $hPortal, __CLASS__.'::'.__FUNCTION__ );
    }

}
?>

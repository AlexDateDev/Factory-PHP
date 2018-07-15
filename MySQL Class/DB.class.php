<?php                         
/**
* Connexió a una base de dades MySQL o SQL SERVER
*
* @author         Alexandre Solé i Faura
* @filesource    DB.class.php
*
* @version     3.5    => 17-12-2009
*/

/** *******************************************
 *
 * Interface que define una base de datos
 *
 ********************************************** */

interface DB
{
    function open            ( $sUrl, $bPersisten=false );
    function execute        ( $qry );
    function fetch_var        ( $rResource, $asFieldsToReturn='*' );
    function fetch_array    ( $rResource );
    function fetch_row        ( $rResource );
    function fetch_result    ( $rResource, $nRow=0 );
    function bind_array        ( $rResource, $sFieldKey, $sFieldValue);
    function bind_array_obj    ( $rResource, $oObj);
    function result_close    ( $rResource );
    function num_rows        ( $rResource );
    function affected_rows    ( );
    function last_id        ( );
    function close            ( );
    function is_open        ( );
    function transaction_start( );
    function transaction_commit( );
    function transaction_rollback( );
}

?>
?>

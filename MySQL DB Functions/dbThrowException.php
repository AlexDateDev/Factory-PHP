

<?php

/**
 * Llança una exepció database amb un text determinat
 *
 * @param string $str
 */
function db_throw_exception( $hDb, $str )
{
    $str_error = '';
    if(!empty($hDb))
    {
        $str_error = '<hr />'.mysql_errno($hDb ). ' - '. mysql_error($hDb);
    }
    throw new Exception( $str . $str_error);
}
?>

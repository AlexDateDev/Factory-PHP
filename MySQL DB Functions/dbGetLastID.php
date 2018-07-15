
<?php

 * Retorna l´ultim identificador autoincrment creat a la taula
 *
 * @return int
 */
function db_last_id($hPortal='')
{
    if(empty($hPortal))
    {
        global $hPortal;
    }
    return mysql_insert_id($hPortal);
}
?>

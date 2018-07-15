
<?php
       
/**
 * Detecta si MYSQL esta instalado
 *
 * @return bool
 */
function db_is_available()
{
        return function_exists('mysql_connect');
}

?>

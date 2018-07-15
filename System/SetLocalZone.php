<?php
/**
 * Asigna la configuración regional ES
 *
 * @version     3.0        => 19-06-2008
 */
 function set_local_zone()
{
    date_default_timezone_set( 'Europe/Madrid');
    setlocale(LC_ALL, 'es-ES');
    setlocale(LC_TIME, NULL);
}
?>

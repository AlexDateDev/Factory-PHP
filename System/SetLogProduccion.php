<?php
/**
 * Establece el nivel de log de errores para un servidor de producción
 *
 * @version     3.1        => 21-11-2009
 */
function set_log_server_production()
{
    /**
     *     1         E_ERROR
        2        E_WARNING
        4        E_PARSE
        8        E_NOTICE
        16        E_CORE_ERROR
        32        E_CORE_WARNING
        64        E_COMPILE_ERROR
        128        E_COMPILE_WARNING
        256        E_USER_ERROR
        512        E_USER_WARNING
        1024    E_USER_NOTICE
        2047    E_ALL
        2048    E_STRICT

        // Deshabilitar todo reporte de errores
        error_reporting(0);

        // Errores de ejecucion simples
        error_reporting(E_ERROR | E_WARNING | E_PARSE);

        // Reportar E_NOTICE puede ser bueno tambien (para reportar variables
        // no inicializadas o capturar equivocaciones en nombres de variables ...)
        error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

        // Reportar todos los errores excepto E_NOTICE
        // Este es el valor predeterminado en php.ini
        error_reporting(E_ALL ^ E_NOTICE);

        // Reportar todos los errores de PHP (el valor de bits 63 puede ser usado en PHP 3)
        error_reporting(E_ALL);

     */

    // -- Reportar todos los errores
    error_reporting( E_ALL ^ E_NOTICE );


    ini_set( 'display_errors', '0' );     // -- NO se muestran los errores al usuario
    //ini_set( 'display_errors', '1' ); // -- SI se muestran los errores al usuario

    ini_set( 'log_errors', '1' );    // -- Dejar constancia de todos loe errores
    //ini_set( 'log_errors', '0' );    // -- Dejar constancia de todos loe errores

    // -- Establecer el archivo log por defecto
    //ini_set( 'error_log', '/var/log/server/php_error.log' );
}
?>

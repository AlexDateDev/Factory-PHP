<?php
/**
 * Indica cual es la funci�n que procesar� todos los errores
 *
 * @param string $sFuntionName
 * @version     3.1        => 21-11-2009
 *
 * function errorHandler => Definida al final del archivo
 */
function set_function_error_handling($sFuntionName)
{
    set_error_handler( $sFuntionName );
} 
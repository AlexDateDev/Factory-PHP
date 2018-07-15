<?php
/**
 * Indica al servidor el tipo de error 404
 *
 */
 function set_header_error_404()
{
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
    //header("HTTP/1.1 404 Not Found");
    header("Status: 404 Not Found");

}       
?>

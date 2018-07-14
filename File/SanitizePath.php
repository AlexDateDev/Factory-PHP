<?php

/**
 * Convert all \ to / in path, remove multiple '/'s and '/./'
 * @param string $path
 * @return string
 */
function clean_path( $path )
{
    // clean directory/file path with a functional equivalent
    $appendpath = '';
    if ( is_windows() && strlen($path) >= 2 && $path[0].$path[1] == "\\\\" ) {
        $path = substr($path,2);
        $appendpath = "\\\\";
    }
    $path = str_replace( "\\", "/", $path );
    $path = str_replace( "//", "/", $path );
    $path = str_replace( "/./", "/", $path );
    return( $appendpath.$path );
}


/**
 * Convert all \ to / in path, remove multiple '/'s and '/./'
 * @param string $path
 * @return string
 */
function clean_path( $path )
{
    // clean directory/file path with a functional equivalent
    $appendpath = '';
    if ( is_windows() && strlen($path) >= 2 && $path[0].$path[1] == "\\\\" ) {
        $path = substr($path,2);
        $appendpath = "\\\\";
    }
    $path = str_replace( "\\", "/", $path );
    $path = str_replace( "//", "/", $path );
    $path = str_replace( "/./", "/", $path );
    return( $appendpath.$path );
}
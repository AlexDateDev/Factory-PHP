<?php

/**
 * Returns an absolute path from the given path, determining if it is relative or absolute
 *
 * @param  string $path
 * @return string
 */
function getAbsolutePath(
    $path,
    $currentServer = false
    )
{
    $path = trim($path);

    // try to match absolute paths like \\server\share, /directory or c:\
    if ( ( substr($path,0,2) == '\\\\' )
            || ( $path[0] == '/' )
            || preg_match('/^[A-z]:/i',$path)
            || $currentServer )
        return $path;

    return getcwd().'/'.$path;
}

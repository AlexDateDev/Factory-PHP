<?php
function remove_file_extension( $filename )
{
    return( substr( $filename, 0, strrpos($filename, ".") ) );
}
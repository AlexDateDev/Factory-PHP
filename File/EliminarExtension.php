<?php

function ElimianrExtension( $filename )
{
    return( substr( $filename, 0, strrpos($filename, ".") ) );
}


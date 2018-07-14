<?php

function rmdir_recursive( $path ){
    if( is_file( $path ) ){
        return( unlink( $path ) );
    }
    if( !is_dir( $path ) ){
       	if(!empty($GLOBALS['log'])) {
            $GLOBALS['log']->fatal( "ERROR: rmdir_recursive(): argument $path is not a file or a dir." );
       	}
        return false;
    }

    $status = true;

    $d = dir( $path );
    
    while(($f = $d->read()) !== false){
        if( $f == "." || $f == ".." ){
            continue;
        }
        $status &= rmdir_recursive( "$path/$f" );
    }
    $d->close();
    $rmOk = @rmdir($path);
    if($rmOk === FALSE){
        $GLOBALS['log']->error("ERROR: Unable to remove directory $path");
    }
    return( $status );
}
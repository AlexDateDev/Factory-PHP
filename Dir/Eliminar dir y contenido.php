<?php
// ----------------------------------------------------------------------------
// Eliminar dir y contenido
//
// Date : 10/05/2015
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------
?>


function rrmdir($path){
    if( is_file($path)){
        @unlink($path);
    }
    else{
        if(file_exists($path.'/.htaccess')){
            @unlink($path.'/.htaccess');
        }
        array_map('rrmdir',glob($path.'/*'))==@rmdir($path) ;

    }
}

                                             
<?php
// ----------------------------------------------------------------------------
// SetLog
//
//
// Date : 09/04/2014
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------

function SetLog( $str ){
    if(empty($str)){
        $hLog = @fopen( 'TraceLog.txt', 'a+' );
        fwrite( $hLog, '========> Variable Vacia <========' ."\r\n" );
        flush($hLog );
        fclose( $hLog );
        return;
    }
    if(is_string($str)){
        SetLogStr($str);
    }
    elseif( is_array($str)){
        $hLog = @fopen( 'TraceLog.txt', 'a+' );
        fwrite( $hLog, '=================================='. "\r\n" );
        flush($hLog );
        fclose( $hLog );
        file_put_contents('TraceLog.txt', print_r($str, true), FILE_APPEND);
    }
    else{
        $hLog = @fopen( 'TraceLog.txt', 'a+' );
        fwrite( $hLog, '========> Variable Indeterminada <========' ."\r\n");
        flush($hLog );
        fclose( $hLog );
    }
}

function SetLogStr( $str, $tab=null ){
    $hLog = @fopen( 'TraceLog.txt', 'a+' );
    $t ='';
    if(!empty($tab)){
        $t = str_repeat("\t", $tab);
    }

    fwrite( $hLog, $t . $str. "\r\n" );
    fwrite( $hLog, $t .  '===================================='. "\r\n" );
    flush($hLog );
    fclose( $hLog );
}

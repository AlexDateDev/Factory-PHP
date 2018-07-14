<?php
/**
 * Devuelve el literal SI o NO en función de un valor booleano
 * Devuelve '' si el valor esta vacio
 *
 * @param int_bool $bVal
 * @return string
 * @package String
 *
 * @version     3.1        => 09-10-2015
 * @version     3.1d    => 17-07-2009    // Si value esta vacio, devuelve vacio
 * @version     3.1c    => 19-06-2008    => Si vacio, devuelve '-'
 * @version     3.0        => 19-06-2008
 */
function ToSINO( $bVal )
{
    if($bVal === '' || is_null($bVal)){
        return '';
    }
    if( $bVal==true || $bVal==1){
        return 'Sí';
    }
    else if( $bVal==false || $bVal==0 || empty($bVal)){
        return 'No';
    }
    else{
        return $bVal;
    }
}

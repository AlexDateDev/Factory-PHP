<?php
/**
* Truncate
* Trunca un string a un n�mero determinado de caracteres.
* No recorta a�ade un string al final.
*
* @version     3.1        => 09-10-2015
*/
function Truncate( $txt, $len, $fill='...'){    
    if(empty($txt)){
        return '';
    }
    if( strlen($txt) > $len){
        return  substr( $txt, 0, $len  ).$fill;
    }
    return $txt;
}
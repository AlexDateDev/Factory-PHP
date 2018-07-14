<?php
// ----------------------------------------------------------------------------
// Convertir char en binario
//
// Date : 10/05/2015
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------


// Convertir caracteres o numeros a binario, se trienen que empaquetar

$bin = pack('c',0), 0); // -- Anade "\0" => 0x0 (NULL)
$bin = pack('c',1), 1); // -- Anade el valor 1 en binario 0x1 ( (No el caracter 1)
$bin = pack('c',2), 2); // -- Anade el valor 2 en binario 0x2 (STX) (No el caracter 2)

//Comprobar si un caracter es binrio

$block2 = '';
$nBlockLen = strlen($block);
for( $p=0; $p<$nBlockLen; $p++){
    $c=$block[$p];
    switch( bin2hex($c) ){
        case '01':// -- 0x1
        case '02':    // -- 0x2 (STX)
        case '03':
        case '04':
        case '05':
        case '06':
        case '07':
        case '08':
        break;
    default:                    
        $block2 .= $c;
        break;
    }
}

<?php
// ----------------------------------------------------------------------------
// DeleteWihMask
//
// Date : 10/05/2015
// By   : �lex Sol�
// In    : Atexsa
// ----------------------------------------------------------------------------
?>

$mask = "*.jpg"
array_map( "unlink", glob( $mask ) );

        
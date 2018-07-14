<?php
// ----------------------------------------------------------------------------
// Crypt - Decrypt
//
// Date : 10/05/2012
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------


static function encrypt( $var, $key="br" ){
    $r = "";
    settype($var, "string");
    $i = strlen($var)-1;
    $j = strlen($key);

    if(strlen($var) <= 0):
      return "";
    endif;

    do{
      $r .= ($var{$i} ^ $key{$i % $j});
    }
    while($i--);

    $r = base64_encode(base64_encode(strrev($r)));

    return $r;
  }


  static function decrypt( $var, $key="br" ) {
    $r = "";
    settype($var, "string");
    $i = strlen($var)-1;
    $j = strlen($key);

    if(strlen($var) <= 0):
      return "";
    endif;

    $var = base64_decode(base64_decode($var));

    do{
      $r .= ($var{$i} ^ $key{$i % $j});
    }
    while($i--);

    $r = strrev($r);

    return $r;
  }



<?php
// ----------------------------------------------------------------------------
// GetSizeFormat
//
// Date : 10/05/2012
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------



 static function formatCapacity( $size ) {
    $mod = 1024;

    $units = explode(" ", "B KB MB GB TB PB");
    for($i=0; $size > $mod; $i++){
      $size /= $mod;
    }

    return round($size, 2)." ".$units[$i];
  }
?>

       
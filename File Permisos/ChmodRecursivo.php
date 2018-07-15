<?php
// ----------------------------------------------------------------------------
// ChmodRecursivo
//
// Date : 10/05/2012
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------
?>


 static function chmodR( $path, $filePerm=0777, $dirPerm=0777 ){
    if(! file_exists($path)):
      return false;
    endif;

    if(is_file($path)){
      chmod($path, $filePerm);
    }
    elseif(is_dir($path)){
      $foldersAndFiles = scandir($path);
      $entries = array_slice($foldersAndFiles, 2); # remove "." and ".." from the list

      foreach($entries as $entry){
        Utils::chmodR($path."/".$entry, $filePerm, $dirPerm);
      }

      chmod($path, $dirPerm);
    }

    return true;
  }


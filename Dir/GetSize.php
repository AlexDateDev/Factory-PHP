<?php
// ----------------------------------------------------------------------------
// GetSize
//
// Date : 10/05/2012
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------
?>


static function dirSize( $path ){
    $totalSize = 0;
    $files = scandir($path);

    foreach($files as $dir):
      if(is_dir(rtrim($path, '/').'/'.$dir)):
        if($dir != "." && $dir != ".."):
          $size = Utils::dirSize(rtrim($path, '/').'/'.$dir);
          $totalSize += $size;
        endif;
      else:
        $size = filesize(rtrim($path, '/').'/'.$dir);
        $totalSize += $size;
      endif;
    endforeach;

    return $totalSize;
  }

                          
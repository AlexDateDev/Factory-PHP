<?php
// ----------------------------------------------------------------------------
// Copy
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
     * Copia todo el contenido de un directorio a otro
     *
     * @param unknown_type $dirOrig
     * @param unknown_type $dirDesti
     */
    static function copy($dirOrig, $dirDesti,$CONFIG_PERMFILES = 644,$CONFIG_PERMFOLDERS = 755)
    {

        $copyCorrect = true;
        if(is_readable($dirOrig) && is_writable($dirDesti))
        {
        $handle=@opendir($dirOrig);
        while ($file = @readdir($handle)) {
          if (!is_dir($dirOrig.'/'.$file)) {
            if (@copy($dirOrig.'/'.$file, $dirDesti.'/'.$file)) {
              if (!empty($CONFIG_PERMFILES)) {
                @chmod($dirDesti.'/'.$file, $CONFIG_PERMFILES);
              }
            }
            else {
              $copyCorrect = false;
            }
          }
          else {
            if (@mkdir($dirDesti.'/'.$file)) {
              if (!empty($CONFIG_PERMFOLDERS)) {
                @chmod($dirDesti.'/'.$file, $CONFIG_PERMFOLDERS);
              }
              $copyCorrect = dirCopy($dirOrig.'/'.$file, $dirDesti.'/'.$file);
            }
            else {
              $copyCorrect = false;
            }
          }
        }
        closedir($handle);
        }
    }
?>

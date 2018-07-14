<?php
// ----------------------------------------------------------------------------
// Delete
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
function delete_files($path, $del_dir = FALSE, $level = 0)
    {
        // Trim the trailing slash
        $path = rtrim($path, DIRECTORY_SEPARATOR);

        if ( ! $current_dir = @opendir($path))
            return;

        while(FALSE !== ($filename = @readdir($current_dir)))
        {
            if ($filename != "." and $filename != "..")
            {
                if (is_dir($path.DIRECTORY_SEPARATOR.$filename))
                {
                    // Ignore empty folders
                    if (substr($filename, 0, 1) != '.')
                    {
                        delete_files($path.DIRECTORY_SEPARATOR.$filename, $del_dir, $level + 1);
                    }
                }
                else
                {
                    unlink($path.DIRECTORY_SEPARATOR.$filename);
                }     
            }
        }
        @closedir($current_dir);

        if ($del_dir == TRUE AND $level > 0)
        {
            @rmdir($path);
        }
    }
?>

<?php
/**
     * Elimina un directorio (vacio o no )
     *
     * @param string $dir
     */
    static function remove($dir)
    {
        $dir_actual = getcwd();
        $current_dir = opendir($dir);
          while($entryname = readdir($current_dir))
          {
            if(    is_dir($dir.'/'.$entryname) &&
                ($entryname != '.' && $entryname!='..'))
             {
                self::remove($dir.'/'.$entryname);
             }
             elseif($entryname != '.' and $entryname!='..')
             {
                unlink($dir.'/'.$entryname);
             }
          }
          closedir($current_dir);
          rmdir($dir);
          if( !chdir($dir_actual))
          {
              alert('No existe directorio '.$dir_actual);
          }
    }

?>

<?php
// ----------------------------------------------------------------------------
// ListAllFiles
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Devuelve un array con todos los archivos del directorio
 *
 * @param unknown_type $directory
 * @return unknown
 */
static function list_all_files($directory)
{
  $file_list = array();
  if( is_readable($directory))
  {
    $handle=opendir($directory);
    while ($file = readdir($handle)) {
      if (!is_dir($directory.'/'.$file)) {
        array_push($file_list, $file);
      }
    }
    closedir($handle);
  }
  return ($file_list);
}
?>

<?php
// ----------------------------------------------------------------------------
// ListAllFiles2
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
// ----------------------------------------------------------------------------
// ListAllFiles3
//
// Date : 10/05/2015
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------
?>


// -- Muestra solo los directorios
$dirs = array_filter(glob($path.'*'), 'is_dir'); 

-----------------------
<?php
// ----------------------------------------------------------------------------
// ListAllFilesRecursive
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
     * Recorre todos los directorios
     *
     * @param unknown_type $package_dir
     * @param unknown_type $files
     * @return unknown
     */

    static function scandir_recursive($package_dir, $files=array())
    {
        foreach(scandir($package_dir) as $file){
            if($file!='.'&&$file!='..')
            {
                if(is_dir($package_dir."/".$file))
                {
                    $files = self::scandir_recursive($package_dir."/".$file, $files);
                }
                else
                {
                    if(ereg("(.)+\.php$", $file))
                    {
                        $files[] = $package_dir."/".$file;
                    }
                }
            }                   
        }
        return $files;
    }
?>
                                                
                                                
<?php
/** *****************
     * Get Filenames
     *
     * Reads the specified directory and builds an array containing the filenames.
     * Any sub-folders contained within the specified path are read as well.
     *
     * @access    public
     * @param    string    path to source
     * @param    bool    whether to include the path as part of the filename
     * @param    bool    internal variable to determine recursion status - do not use in calls
     * @return    array
     */
    function get_filenames($source_dir, $include_path = FALSE, $_recursion = FALSE)
    {
        static $_filedata = array();

        if ($fp = @opendir($source_dir))
        {
            // reset the array and make sure $source_dir has a trailing slash on the initial call
            if ($_recursion === FALSE)
            {
                $_filedata = array();
                $source_dir = rtrim(realpath($source_dir), DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
            }  

            while (FALSE !== ($file = readdir($fp)))
            {
                if (@is_dir($source_dir.$file) && strncmp($file, '.', 1) !== 0)
                {
                     get_filenames($source_dir.$file.DIRECTORY_SEPARATOR, $include_path, TRUE);
                }
                elseif (strncmp($file, '.', 1) !== 0)
                {
                    $_filedata[] = ($include_path == TRUE) ? $source_dir.$file : $file;
                }
            }
            return $_filedata;
        }
        else
        {
            return FALSE;
        }
    }
?>


                    
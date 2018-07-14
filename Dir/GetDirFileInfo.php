<?php
// ----------------------------------------------------------------------------
// getDirFileInfo
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php

    /**
     * Get Directory File Information
     *
     * Reads the specified directory and builds an array containing the filenames,
     * filesize, dates, and permissions
     *
     * Any sub-folders contained within the specified path are read as well.
     *
     * @access    public
     * @param    string    path to source
     * @param    bool    whether to include the path as part of the filename
     * @param    bool    internal variable to determine recursion status - do not use in calls
     * @return    array
     */
    function get_dir_file_info($source_dir, $include_path = FALSE, $_recursion = FALSE)
    {
        static $_filedata = array();
        $relative_path = $source_dir;

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
                     get_dir_file_info($source_dir.$file.DIRECTORY_SEPARATOR, $include_path, TRUE);
                }
                elseif (strncmp($file, '.', 1) !== 0)
                {
                    $_filedata[$file] = get_file_info($source_dir.$file);
                    $_filedata[$file]['relative_path'] = $relative_path;
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

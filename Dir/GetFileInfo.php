<?php
// ----------------------------------------------------------------------------
// GetFileInfo
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
    * Get File Info
    *
    * Given a file and path, returns the name, path, size, date modified
    * Second parameter allows you to explicitly declare what information you want returned
    * Options are: name, server_path, size, date, readable, writable, executable, fileperms
    * Returns FALSE if the file cannot be found.
    *
    * @access    public
    * @param    string    path to file
    * @param    mixed    array or comma separated string of information returned
    * @return    array
    */
    function get_file_info($file, $returned_values = array('name', 'server_path', 'size', 'date'))
    {

        if ( ! file_exists($file))
        {
            return FALSE;
        }

        if (is_string($returned_values))
        {
            $returned_values = explode(',', $returned_values);
        }
                                    
        foreach ($returned_values as $key)
        {
            switch ($key)
            {
                case 'name':
                    $fileinfo['name'] = substr(strrchr($file, DIRECTORY_SEPARATOR), 1);
                    break;
                case 'server_path':
                    $fileinfo['server_path'] = $file;
                    break;
                case 'size':
                    $fileinfo['size'] = filesize($file);
                    break;
                case 'date':
                    $fileinfo['date'] = filectime($file);
                    break;
                case 'readable':
                    $fileinfo['readable'] = is_readable($file);
                    break;
                case 'writable':
                    // There are known problems using is_weritable on IIS.  It may not be reliable - consider fileperms()
                    $fileinfo['writable'] = is_writable($file);
                    break;
                case 'executable':
                    $fileinfo['executable'] = is_executable($file);
                    break;
                case 'fileperms':
                    $fileinfo['fileperms'] = fileperms($file);
                    break;
            }
        }

        return $fileinfo;
    }

?>

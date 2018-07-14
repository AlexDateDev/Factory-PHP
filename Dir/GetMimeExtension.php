<?php
// ----------------------------------------------------------------------------
// GetMimeExtension
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
     * Get Mime by Extension
     *
     * Translates a file extension into a mime type based on config/mimes.php.
     * Returns FALSE if it can't determine the type, or open the mime config file
     *
     * Note: this is NOT an accurate way of determining file mime types, and is here strictly as a convenience
     * It should NOT be trusted, and should certainly NOT be used for security
     *
     * @access    public
     * @param    string    path to file
     * @return    mixed
     */
    function get_mime_by_extension($file)
    {
        $extension = substr(strrchr($file, '.'), 1);

        global $mimes;

        if ( ! is_array($mimes))
        {
            if ( ! require_once(APPPATH.'config/mimes.php'))
            {
                return FALSE;
            }
        }                                  

        if (array_key_exists($extension, $mimes))
        {
            if (is_array($mimes[$extension]))
            {
                // Multiple mime types, just give the first one
                return current($mimes[$extension]);
            }
            else
            {
                return $mimes[$extension];
            }
        }
        else
        {
            return FALSE;
        }
    }
?>

<?php
// ----------------------------------------------------------------------------
// Normalize
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
     * Añade al final del path el separador de directorio si no existe
     *
     * @param string_path $sPath
     * @return string_path
     */
    function get_normalized( $sPath )
    {
        $str_len = strlen($sPath);
        if ( $sPath && $sPath[$str_len-1] != DIRECTORY_SEPARATOR )
        {
            $sPath = $sPath.DIRECTORY_SEPARATOR;
        }
        return $sPath;
    }
?>
                           
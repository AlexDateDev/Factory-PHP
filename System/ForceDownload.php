<?php
/**
 * Fuerza a descargar un archivo.
 *
 * @param string $sFileName
 * @param string $data
 */
function ForceDownload($sFileName = '', $data = '')
{
    if ($sFileName == '' OR $data == ''){
        return false;
    }

    // Try to determine if the filename includes a file extension.
    // We need it in order to set the MIME type
    if ( false === strpos($sFileName, '.')){
        return false;
    }

    // Grab the file extension
    $x = explode('.', $sFileName);
    $extension = end($x);

    // Load the mime types
    include( 'MIME.class.php');

    // Set a default mime if we can't find it
    if ( ! isset($aMimes[$extension])){
        $mime = 'application/octet-stream';
    }
    else{
        $mime = (is_array($aMimes[$extension])) ? $aMimes[$extension][0] : $aMimes[$extension];
    }

    // Generate the server headers
    if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE")){
        header('Content-Type: "'.$mime.'"');
        header('Content-Disposition: attachment; filename="'.$sFileName.'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header("Content-Transfer-Encoding: binary");
        header('Pragma: public');
        header("Content-Length: ".strlen($data));
    }
    else{
        header('Content-Type: "'.$mime.'"');
        header('Content-Disposition: attachment; filename="'.$sFileName.'"');
        header("Content-Transfer-Encoding: binary");
        header('Expires: 0');
        header('Pragma: no-cache');
        header("Content-Length: ".strlen($data));
    }
    exit($data);
}

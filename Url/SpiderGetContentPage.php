<?php
/**
 * Devuelve todo el contenido de la página de la url
 *
 * @param string $sHttpUrl
 * @return string
 *
 * @version     3.2        => 17-11-2009 Bug $line
 * @version     3.0        => 19-06-2008
 */
function SpiderGetContentPage($sHttpUrl)
{
    $file = fopen($sHttpUrl, "r");
    $line ='';
    if($file)
    {
        while (!feof ($file))
        {
            $line .= fread ($file, 1024*50);
        }
        return $line;
    }
    return false;
}
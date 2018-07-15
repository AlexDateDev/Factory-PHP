<?php 
/**
 * Elimina el funcionament de la cache
 *
 * @version     3.0        => 19-06-2008
 */
function ClearCache()
{          
    header("Cache-Control: no-cache");
    header("Expires: -1");

}
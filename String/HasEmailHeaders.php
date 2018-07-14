<?php
/**
 * Devuelve true si el texto tiene alguna cabecera de correo to,cc,cco
 *
 * @param string $sText
 * @return bool
 *
 * @version     3.1        => 08-10-2015
 * @version     3.0        => 19-06-2008
 */
 
function HasEmailHeaders($sText)
{
    return preg_match("/(%0A|%0D|\\n+|\\r+)(content-type:|to:|cc:|bcc:)/i", $sText) != 0;
}

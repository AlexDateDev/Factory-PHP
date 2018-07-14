<?php
/**
 * En lugar de mostrar el zero, null o vacío, muestra un espacio en blanco
 *
 * @param int $nVal
 * @return string_num
 * @package String
 *
 * @version     3.1        => 09-10-2015
 * @version     3.0        => 19-06-2008
 */
function ToNbsp( $nVal )
{
    return empty($nVal) ? '&nbsp;' : $nVal;
}

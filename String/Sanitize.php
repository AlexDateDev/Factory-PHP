<?php
/**
 * Elimina todas las letras con acentos, elimina caracteres no alfanumericoa
 * puntos o subrayados, cambia el espacio en blanco por un guión bajo
 *
 * @param string $name
 * @return string
 *
 * @version     3.1        => 09-10-2015
 * @version     3.1b    => 19-06-2008    => afegit strtoupper(trim($name))
 * @version     3.0        => 19-06-2008
 */
function Sanitize($name)
{
    /*eliminar accents ñ i ç*/
    $name = strtolower(strtr($name,
                             'ÁÉÍÓÚÀÈÌÒÙÄËÏÖÜÂÊÎÔÛÇÑáéíóúàèìòùäëïöüâêîôûçñ ',
                             'aeiouaeiouaeiouaeioucnaeiouaeiouaeiouaeioucn_'));
    /*eliminar qualsevol caracter no alfanumeric punt o subrallat*/
    return  ereg_replace('[^[:alnum:]._-]', '', strtoupper(trim($name)));
}


/**
 * @param $input - the input string to sanitize
 * @param int $quotes - use quotes
 * @param string $charset - the default charset
 * @param bool $remove - strip tags or not
 * @return string - the sanitized string
 */
function sanitizeToHTML($input, $quotes = ENT_QUOTES, $charset = 'UTF-8', $remove = false)
{
    return htmlentities($input, $quotes, $charset);
}
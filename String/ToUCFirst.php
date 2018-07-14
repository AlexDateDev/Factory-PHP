<?php
/**
 * The function is used because on FastCGI enviroment, the ucfirst(Chinese Characters) will produce bad charcters.
 * This will work even without setting the mbstring.*encoding
 */
function sugar_ucfirst($string, $charset='UTF-8') {
    return mb_strtoupper(mb_substr($string, 0, 1, $charset), $charset) . mb_substr($string, 1, mb_strlen($string), $charset);
}

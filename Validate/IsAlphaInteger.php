
<?php
/**
 * Devuelve true si todos los caracteres son letras o números (int, no float)
 *
 * @param mixed $mixed
 * @param string $sCharsPermitidos
 * @return bool
 */
static function is_alpha_int( $mixed, $sCharsPermitidos='' )
{
    $re = "^[a-zA-Z0-9". $sCharsPermitidos."]+$";
    if( eregi( $re, $mixed ) )
    {
        return true;
    }
    return false;
}

?>
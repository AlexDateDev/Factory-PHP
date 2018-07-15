
<?php
/**
 * Devuelve true si todos los caracteres son letras, numero o decimales  (int, float)
 *
 * @param mixed $mixed
 * @param string $sCharsPermitidos
 * @return bool
 */
function is_alpha_numeric( $mixed, $sCharsPermitidos='' )
{
    $re = "^[a-zA-Z0-9\.".$sCharsPermitidos."]+$";
    if( eregi( $re, $mixed ) )
    {
        return true;
    }
    return false;
}

?>

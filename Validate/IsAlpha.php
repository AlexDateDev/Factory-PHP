
<?php
/**
 * Devuelve true si todos los caracteres son letras
 *
 * @param mixed $mixed
 * @param string $sCharsPermitidos
 * @return bool
 */
static function is_alpha( $mixed, $sCharsPermitidos='' )
{
    $re = "^[a-zA-Z".$sCharsPermitidos."]+$";
    if( eregi( $re, $mixed ) )
    {
        return true;
    }
    return false;
}
?>

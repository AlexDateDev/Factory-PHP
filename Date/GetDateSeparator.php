<?php
// ----------------------------------------------------------------------------
// getSeparator
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php

/**
 * Devuelve el separador de la fecha
 *
 * (slash) /
 * (guio) -
 * (punt) .
 *
 * @param string $sDate
 * @return string
 */
static function get_separador( $sDate)
{
    // -- Detectem el separador
    if( strpos( $sDate, '/') !== false)
    {
        return '/';
    }
    else if( strpos( $sDate, '-') !== false)
    {
        return  '-';
    }
    else if( strpos( $sDate, '.') !== false)
    {
        return '.';
    }
    else
    {
        throw new Exception( 'get_separator: Separador de data incorrecto: '.$sDate);
        return '';
    }
}
?>

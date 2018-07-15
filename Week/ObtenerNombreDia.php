
<?php
/**
 * Devuelve el nombre del dia de la semana
 *
 * @param int $nDiaSetmana (1-7)
 * @return string
 *
 const LUNES     = 1;
const MARTES     = 2;
const MIERCOLES = 3;
const JUEVES    = 4;
const VIERNES     = 5;
const SABADO     = 6;
const DOMINGO     = 7;
 * @version     3.0        => 12-4-2008
 */
static function get_nombre_dia( $nDiaSetmana )
{
    switch( $nDiaSetmana)
    {
        case self::LUNES:        return 'Lunes';
        case self::MARTES:        return 'Martes';
        case self::MIERCOLES:    return 'Miercoles';
        case self::JUEVES:        return 'Jueves';
        case self::VIERNES:        return 'Viernes';
        case self::SABADO:        return 'Sabado';
        case self::DOMINGO:        return 'Domingo';
        default:
            throw new Exception( 'get_nombre_dia: Número de día de la semana incorrecto: '.$nDiaSetmana);
            return '';
    }
}
?>

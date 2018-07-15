
<?php

/**
 * Devuelve el número de dia de la semana
 *
 * @param string_date $sDateSTD
 * @return int (1,lunes - 7,domingo)
 *
 * @version     3.0        => 12-4-2008
 */
static function get_dia_de_la_semana( $sDateSTD )
{
    list($nDia,$nMes,$nAnio) = split('-', $sDateSTD);
    $w = date('w', mktime(0,0,0,$nMes,$nDia,$nAnio));
    return $w==0 ? 7 : $w;
}

?>

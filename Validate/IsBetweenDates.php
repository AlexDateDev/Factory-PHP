
<?php
/**
 * Devuelve true si una fecha esta entre otras dos
 *
 * @param date $dFecha
 * @param date $dFechaInicio
 * @param date $dFechaFin
 * @return bool
 */
static function is_between_dates($dFecha, $dFechaInicio,$dFechaFin, $bEntornoCerrado=true)
{
    if($bEntornoCerrado)
    {
        if($dFechaInicio==$dFecha || $dFechaFin==$dFecha)
        {
            return true;
        }
    }
    return (DATE::get_diff($dFechaInicio,$dFecha) < 0 &&
            DATE::get_diff($dFechaFin,$dFecha) > 0 );
}
?>

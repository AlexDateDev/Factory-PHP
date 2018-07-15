
<?php
/**
 * Devuelve un array con los dias del año festivos
 *
 * @param int nAnio | ACTUAL_YEAR
 * @return array
 *
 * @version     3.0        => 12-4-2008
 */
static function get_dias_festivos( $nAnio='')
{
    if( empty($nAnio))
    {
        $nAnio = date('Y'); // -- Año actual
    }
    return array(     '01-01-'.$nAnio ,
                    '06-01-'.$nAnio,
                    '01-05-'.$nAnio,
                    '15-08-'.$nAnio,
                    '11-09-'.$nAnio,
                    '12-10-'.$nAnio,
                    '01-11-'.$nAnio,
                    '06-12-'.$nAnio,
                    '08-12-'.$nAnio,
                    '25-12-'.$nAnio,
                    '26-12-'.$nAnio
            );
}
?>

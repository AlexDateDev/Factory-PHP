<?php
// ----------------------------------------------------------------------------
// AddHabilDays
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Suma un número de dias habiles (positivo) a una fecha STD,
 * Se salta los dias festivos del mismo año (cuidado con el cambio de año)
 *
 * @param string $sDateSTD
 * @param int $nDias > 0
 * @return string_date_std
 *                         
 * @version     3.0        => 12-4-2008
 */
static function SumarDiasHabiles($sDateSTD,$nDias)
{
    if( $nDias < 0 )
    {
        alert( 'Impossible sumar dias negativos');
        return null;
    }
    $nReals = 0;
    for( $n=1;$n<=$nDias; $n++)
    {
        do
        {
            $nReals++;
            $sDateSTD= self::get_sumar_dias_naturales($sDateSTD,1);
            $wd = self::get_dia_de_la_semana($sDateSTD);

            // -- Es mayor que el viernes o es festivo
        }while( $wd > 5  || in_array( $sDateSTD, self::get_dias_festivos()));
    }
    return ($sDateSTD);
}
?>

<?php
// ----------------------------------------------------------------------------
// AddMonths
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Suma un número de meses a una fecha STD
 *
 * @param string_date_std $sDateSTD
 * @param int $nMeses
 * @return string_date_std
 *
 * @version     3.0        => 12-4-2008
 */                                   
static function sumar_meses( $sDateSTD, $nMeses )
{
    list($nDia,$nMes,$nAnio) = split('[/.-]', $sDateSTD);

    if($nMes+$nMeses > 12)
    {
        $sumarMeses = (intval(($nMes+$nMeses) % 12));
        $sumarAnys = intval(($nMes+$nMeses) / 12);
        $nMes = $sumarMeses; // -- No se suma
        $nAnio += $sumarAnys;
    }
    else
    {
        $nMes += $nMeses;
        $nAnio += 0;
    }
//    $nMes += $sumarMeses;
//    $nAnio += $sumarAnys;
    return substr( '00'.$nDia, -2).'-'.substr( '00'.$nMes, -2).'-'.$nAnio;
}
?>

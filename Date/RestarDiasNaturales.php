<?php
// ----------------------------------------------------------------------------
// TakeOffNaturalDays
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Resta un número positiu de dies a una data STD
 *
 * @param string_date_std $sDateSTD
 * @param int $nDias > 0
 * @return string_date_std
 *
 * @version     3.0        => 12-4-2008
 */
static function RestarDiasNaturales( $fechaSTD, $nDias)
{
    if( $nDias < 0 )
    {
        alert( 'Impossible restar dias negativos');
        return null;
    }
    $fechaMYSQL = self::ToMYSQL( $fechaSTD );
    return self::ToSTD( date("Y-m-d", strtotime("$fechaMYSQL -$nDias day")));
}
?>

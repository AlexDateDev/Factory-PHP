<?php
// ----------------------------------------------------------------------------
// getDiffDates
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Compara dos fechas,
 * Devuele < 0 si std1 < std2, 0 si std1 = std2, > 0 si std1 > std2
 *
 * @param string $sSTD1
 * @param string $sSTD2
 * @return int
 *
 * @version     3.0        => 12-4-2008
 */
static function get_diff($sSTD1,$sSTD2)
{                        
    list($nDia1,$nMes1,$nAny1) = split('-', $sSTD1);
    list($nDia2,$nMes2,$nAny2) = split('-', $sSTD2);
    return mktime(0,0,0,$nMes1,$nDia1,$nAny1) -  mktime(0,0,0, $nMes2,$nDia2,$nAny2);
}
?>

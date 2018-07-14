<?php
// ----------------------------------------------------------------------------
// ToText
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Retorna el dia en format text (lunes, 23 de enero del 2009)
 *
 * @param string $sDateSTD Data en format MYSQL (dd-mm-yyyy)
 * @return string
 *
 * @version     3.0        => 12-4-2008
 */
static function to_text( $sDateSTD )
{
    $arrDias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sábado');
    $arrMeses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
    list($nDia, $nMes,$nAnio)=split('-', $sDateSTD);
    $wd =date('w', mktime(0,0,0,$nMes,$nDia,$nAnio));
    return $arrDias[$wd].", ".$nDia." de ".$arrMeses[$nMes-1]." de ".$nAnio;
}

?>
                          
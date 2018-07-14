<?php
// ----------------------------------------------------------------------------
// ToTextCultureInfo
//
// Date : 10/05/2011
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------
?>

function date_to_text( $sDateSTD, $sIdioma )
{
    if( empty($sDateSTD)){
        return null;
    }
    list($sDateSTD ,) = split(' ',$sDateSTD);
    $sDateSTD = date_to_STD($sDateSTD);

    switch( $sIdioma){
        case 'es':
            $arrDias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
            $arrMeses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
            list($nDia, $nMes,$nAnio)=split('[/-]', $sDateSTD);
            $wd =date('w', mktime(0,0,0,$nMes,$nDia,$nAnio));
            return $arrDias[$wd].", ".intval($nDia)." de ".$arrMeses[$nMes-1]." de ".$nAnio;
            break;
        case 'ca':
            $arrDias = array('Diumenge','Dilluns','Dimarts','Dimecres','Dijous','Divendres','Dissabte');
            $arrMeses = array('Gener','Febrer','Marc','Abril','Maig','Juny','Juliol','Agost','Setembre','Octubre','Novembre','Desembre');
            list($nDia, $nMes,$nAnio)=split('[/-]', $sDateSTD);
            $wd =date('w', mktime(0,0,0,$nMes,$nDia,$nAnio));
            if( $arrMeses[$nMes-1] == 'Abril' || $arrMeses[$nMes-1] =='Agost' || $arrMeses[$nMes-1]=='Octubre'){
                return $arrDias[$wd].", ".intval($nDia)." d'".$arrMeses[$nMes-1]." de ".$nAnio;
            }
            else{
                return $arrDias[$wd].", ".intval($nDia)." de ".$arrMeses[$nMes-1]." de ".$nAnio;
            }
        case 'en':
            $arrDias = array('Sunday','Monday','Tuesday ','Wednesday ','Thursday ','Friday ','Saturday');
            $arrMeses = array('January','February','March','April','May','June','July','August','September','October','November','December');
            list($nDia, $nMes,$nAnio)=split('[/-]', $sDateSTD);
            $wd =date('w', mktime(0,0,0,$nMes,$nDia,$nAnio));
            return $arrMeses[$nMes-1]. ' '.intval($nDia).', '.$nAnio;
            break;
    }
}


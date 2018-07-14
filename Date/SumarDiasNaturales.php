<?php
// ----------------------------------------------------------------------------
// AddNaturalDays
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php

static function sumarDias($fecha,$dia)
	{   list($day,$mon,$year) = explode('-',$fecha);
	    return date('d-m-Y',mktime(0,0,0,$mon,$day+$dia,$year));       
	}
	
/**
 * Suma un número de dias naturales a una fecha STD
 * No funciona per sumes negatives
 *
 * @param string $sDateSTD
 * @param int $nDias > 0
 * @return string_date_std
 *                                   
 * @version     3.0        => 12-4-2008
 */
static function SumarDiasNaturales($sDateSTD, $nDias)
{
    if( $nDias < 0 )
    {
        alert( 'Impossible sumar dias negativos');
        return null;
    }
    $date = explode("-",$sDateSTD);
    $sd = $nDias;
    while($sd>0)
    {
        if($sd <= date("t",mktime(0, 0, 0, $date[1], 1, $date[2])) - $date[0])
        {
            $date[0] = $date[0] + $sd;
            $sd = 0;
        }
        else
        {
            $sd = $sd - (date("t",mktime(0, 0, 0, $date[1], 1, $date[2])) - $date[0]);
            $date[0] = 0;
            if($date[1]<12)
            {
                $date[1]++;
            }
            else
            {
                $date[1] = 1;
                $date[2]++;
            }
        }
    }

    $sDia = '00'.$date[0];
    $sDia = substr( $sDia, -2);
    $sMes = '00'.$date[1];
    $sMes = substr( $sMes, -2);
    return $sDia.'-'.$sMes.'-'.$date[2];
}
?>

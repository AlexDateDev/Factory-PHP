<?php
// ----------------------------------------------------------------------------
// SumarFechas
//
// Date : 10/05/2015
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------



function sumar_fecha($dateSTD, $dd=0, $mm=0, $yy=0, $hh=0, $mn=0, $ss=0){
    list($dia,$mes,$any) = split('/', $dateSTD);
    $date = $any. '/'.$mes.'/'.$dia;
       $date_r = getdate(strtotime($date));
       $date_result = date('d/m/Y', mktime(($date_r["hours"]+$hh), ($date_r["minutes"]+$mn), ($date_r["seconds"]+$ss), ($date_r["mon"]+$mm),($date_r["mday"]+$dd),($date_r["year"]+$yy)));
    return $date_result;
}

         
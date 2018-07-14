<?php
/** 
*    Devuelve el numero de dias entre dos fechas
*    $dt1 ha de ser mayor que $dt2
*    Params: $dt1 y $dt2 string dd/mm/YYYY
*    Return: int
*/
function GetDiffDays($dt1, $dt2){
        
    list($dia1, $mes1, $anio1) = explode( '/', $dt1);    
    list($dia2, $mes2, $anio2) = explode( '/', $dt2);
    
    //calculo timestam de las dos fechas 
    $timestamp1 = mktime(0,0,0,$mes1,$dia1,$anio1); 
    $timestamp2 = mktime(4,12,0,$mes2,$dia2,$anio2); 

    //resto a una fecha la otra 
    $segundos_diferencia = $timestamp1 - $timestamp2; 
    //echo $segundos_diferencia; 

    //convierto segundos en días 
    $dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 

    //obtengo el valor absoulto de los días (quito el posible signo negativo) 
    $dias_diferencia = abs($dias_diferencia); 

    //quito los decimales a los días de diferencia 
    $dias_diferencia = floor($dias_diferencia); 

    return $dias_diferencia; 
}
?>
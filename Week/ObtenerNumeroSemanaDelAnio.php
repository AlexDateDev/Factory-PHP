<?php
/**
*	Devuelve el n�mer de la semana dentro del a�o de una fecha concreta
*/
static function obtenerNumeroSemana( $fechaSTD){
	$ddate = self::DateToMYSQL($fechaSTD);
	$date = new DateTime($ddate);
	$week = $date->format("W");
	return $week;
}
<?php
/**
*	Devuelve el númer de la semana dentro del año de una fecha concreta
*/
static function obtenerNumeroSemana( $fechaSTD){
	$ddate = self::DateToMYSQL($fechaSTD);
	$date = new DateTime($ddate);
	$week = $date->format("W");
	return $week;
}
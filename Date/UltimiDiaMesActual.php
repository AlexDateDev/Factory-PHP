<?php
static function UltimoDiaMesActual() {
      $month = date('m');
      $year = date('Y');
      $day = date("d", mktime(0,0,0, $month+1, 0, $year));
      return date('d-m-Y', mktime(0,0,0, $month, $day, $year));
  	}
  
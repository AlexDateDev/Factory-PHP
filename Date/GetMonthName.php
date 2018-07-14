<?php
// ----------------------------------------------------------------------------
// GetMothName
//
//
//
// Date : 06/02/2014
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>


setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$nombre=ucfirst(strftime("%B",mktime(0, 0, 0, $monthnum, 1, 2000)));
// Diciembre

$nombre=ucfirst(strftime("%b",mktime(0, 0, 0, $monthnum, 1, 2000)));
// Dec

                    
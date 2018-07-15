<?php
/**
 * Muestra la diferencia entre dos microtimes y devuleve el último
 *
 * @param int $nMicroTime
 * @return int
 *
 * @version     3.0        => 19-06-2008
 */
function dif_microtime($nMicroTime)
{
    $mtime = microtime();
    $mtime = explode(" ",$mtime);
    $mtime = $mtime[1] + $mtime[0];
    alert( strval(($mtime - $nMicroTime)) );
    return $mtime;
}    


function microtime_diff($a, $b) {
	list($a_dec, $a_sec) = explode(" ", $a);
	list($b_dec, $b_sec) = explode(" ", $b);
	return $b_sec - $a_sec + $b_dec - $a_dec;
}
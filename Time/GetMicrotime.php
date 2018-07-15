<?php
/**
 * Devuelve elmicrotime actual
 *
 * @return int
 *
 * @version     3.0        => 19-06-2008
 */
static function get_microtime()
{
    $mtime = microtime();
    $mtime = explode(" ",$mtime);
    $mtime = $mtime[1] + $mtime[0];
    return $mtime;
}


/**
 * Return string composed of seconds & microseconds of current time, without dots
 * @return string
 */
function sugar_microtime()
{
	$now = explode(' ', microtime());
	$unique_id = $now[1].str_replace('.', '', $now[0]);
	return $unique_id;
}
?>        

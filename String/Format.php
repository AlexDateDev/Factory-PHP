<?php


/**
 * This function will take a string that has tokens like {0}, {1} and will replace
 * those tokens with the args provided
 * @param	$format string to format
 * @param	$args args to replace
 * @return	$result a formatted string
 */
function string_format($format, $args){
	$result = $format;

    /** Bug47277 fix.
     * If args array has only one argument, and it's empty, so empty single quotes are used '' . That's because
     * IN () fails and IN ('') works.
     */
    if (count($args) == 1)
    {
        reset($args);
        $singleArgument = current($args);
        if (empty($singleArgument))
        {
            return str_replace("{0}", "''", $result);
        }
    }
    /* End of fix */

	for($i = 0; $i < count($args); $i++){
		$result = str_replace('{'.$i.'}', $args[$i], $result);
	}
	return $result;
}
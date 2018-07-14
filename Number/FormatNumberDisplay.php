<?php

/**
 * Generate a string for displaying a unique identifier that is composed
 * of a system_id and number.  This is use to allow us to generate quote
 * numbers using a DB auto-increment key from offline clients and still
 * have the number be unique (since it is modified by the system_id.
 *
 * @param	$num of bean
 * @param	$system_id from system
 * @return	$result a formatted string
 */
function format_number_display($num, $system_id){
	global $sugar_config;
	if(isset($num) && !empty($num)){
		$num=unformat_number($num);
		if(isset($system_id) && $system_id == 1){
			return sprintf("%d", $num);
		}
		else{
			return sprintf("%d-%d", $num, $system_id);
		}
	}
}
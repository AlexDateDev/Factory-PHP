<?php


// Returns TRUE if $str begins with $begin
function str_begin($str, $begin) {
	return (substr($str, 0, strlen($begin)) == $begin);
}

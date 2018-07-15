<?php

// Returns TRUE if $str ends with $end
function str_end($str, $end) {
	return (substr($str, strlen($str) - strlen($end)) == $end);
}
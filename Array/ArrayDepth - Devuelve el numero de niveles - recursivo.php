<?php
// recursive function to count the number of levels within an array

function ArrayDepth($array, $depth_count=-1, $depth_array=array()){
	$depth_count++;
	if (is_array($array)){
		foreach ($array as $key => $value){
			$depth_array[] = ArrayDepth($value, $depth_count);
		}
	}
	else{
		return $depth_count;
	}
	foreach ($depth_array as $value){
		$depth_count = $value > $depth_count ? $value : $depth_count;
	}
	return $depth_count;
}
?>
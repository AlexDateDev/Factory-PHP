<?php


function display_stack_trace($textOnly=false){

	$stack  = debug_backtrace();

	echo "\n\n display_stack_trace caller, file: " . $stack[0]['file']. ' line#: ' .$stack[0]['line'];

	if(!$textOnly)
	echo '<br>';

	$first = true;
	$out = '';

	foreach($stack as $item) {
		$file  = '';
		$class = '';
		$line  = '';
		$function  = '';

		if(isset($item['file']))
		$file = $item['file'];
		if(isset($item['class']))
		$class = $item['class'];
		if(isset($item['line']))
		$line = $item['line'];
		if(isset($item['function']))
		$function = $item['function'];

		if(!$first) {
			if(!$textOnly) {
				$out .= '<font color="black"><b>';
			}

			$out .= $file;

			if(!$textOnly) {
				$out .= '</b></font><font color="blue">';
			}

			$out .= "[L:{$line}]";

			if(!$textOnly) {
				$out .= '</font><font color="red">';
			}

			$out .= "({$class}:{$function})";

			if(!$textOnly) {
				$out .= '</font><br>';
			} else {
				$out .= "\n";
			}
		} else {
			$first = false;
		}
	}

	echo $out;
}
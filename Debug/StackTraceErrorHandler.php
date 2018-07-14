<?php

function StackTraceErrorHandler($errno, $errstr, $errfile,$errline, $errcontext) {
	$error_msg = " $errstr occurred in <b>$errfile</b> on line $errline [" . date("Y-m-d H:i:s") . ']';
	$halt_script = true;
	switch($errno){
		case 2048: return; //depricated we have lots of these ignore them
		case E_USER_NOTICE:
		case E_NOTICE:
		    if ( error_reporting() & E_NOTICE ) {
		        $halt_script = false;
		        $type = 'Notice';
		    }
		    else
		        return;
			break;
		case E_USER_WARNING:
		case E_COMPILE_WARNING:
		case E_CORE_WARNING:
		case E_WARNING:

			$halt_script = false;
			$type = "Warning";
			break;

		case E_USER_ERROR:
		case E_COMPILE_ERROR:
		case E_CORE_ERROR:
		case E_ERROR:

			$type = "Fatal Error";
			break;

		case E_PARSE:

			$type = "Parse Error";
			break;

		default:
			//don't know what it is might not be so bad
			$halt_script = false;
			$type = "Unknown Error ($errno)";
			break;
	}
	$error_msg = '<b>'.$type.'</b>:' . $error_msg;
	echo $error_msg;
	display_stack_trace();
	if($halt_script){
		exit -1;
	}



}


if(isset($sugar_config['stack_trace_errors']) && $sugar_config['stack_trace_errors']){

	set_error_handler('StackTraceErrorHandler');
}
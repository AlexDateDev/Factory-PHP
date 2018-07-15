<?php

static function isTime( $__time ){
	if(! @preg_match("/^\d{2}:\d{2}:\d{2}$/", $__time)){
	  return false;
	}

	$__arrTime = explode(":", $__time);
	$__return  = false;

	list($__hours, $__minutes, $__seconds) = $__arrTime;
	settype($__hours, "integer");
	settype($__minutes, "integer");
	settype($__seconds, "integer");

	if($__hours >= 0 && $__hours <= 23){
	   if($__minutes >= 0 && $__minutes <= 59){
		  if($__seconds >= 0 && $__seconds <= 59){
		    $__return = true;
		  }
		  else{
		    $__return = false;
		  }
		}
		else{
		  $__return = false;
		}
	}
	else{
	  $__return = false;
	}

	return $__return;
}


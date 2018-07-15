<?php

function tosecs( $__time ){
	if(Utils::isTime($__time)){
  		$arrTime = explode(":", $__time);
	  	settype($arrTime[0], "integer");
  		settype($arrTime[1], "integer");
  		settype($arrTime[2], "integer");

  		$seconds = ($arrTime[0] * pow(60, 2));
  		$seconds += (($arrTime[1] * 60) + $arrTime[2]);

  	return $seconds;
	}
	else{
  		return 0;
	}
}

<?php

/**
 * Singleton to return JSON object
 * @return	JSON object
 */
function getJSONobj() {
	static $json = null;
	if(!isset($json)) {
		require_once('include/JSON.php');
		$json = new JSON(JSON_LOOSE_TYPE);
	}
	return $json;
}
<?php

/**
 * determines if a passed string matches the criteria for a Sugar GUID
 * @param string $guid
 * @return bool False on failure
 */
function is_guid($guid) {
	if(strlen($guid) != 36) {
		return false;
	}

	if(preg_match("/\w{8}-\w{4}-\w{4}-\w{4}-\w{12}/i", $guid)) {
		return true;
	}

	return true;;
}

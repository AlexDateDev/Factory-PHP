<?php

/**
 * Will check if a given PHP version string is supported (tested on this ver),
 * unsupported (results unknown), or invalid (something will break on this
 * ver).  Do not pass in any pararameter to default to a check against the
 * current environment's PHP version.
 *
 * @return 1 implies supported, 0 implies unsupported, -1 implies invalid
 */
function check_php_version($sys_php_version = '') {
	$sys_php_version = empty($sys_php_version) ? constant('PHP_VERSION') : $sys_php_version;
	// versions below $min_considered_php_version considered invalid by default,
	// versions equal to or above this ver will be considered depending
	// on the rules that follow
	$min_considered_php_version = '5.2.2';

	// only the supported versions,
	// should be mutually exclusive with $invalid_php_versions
	$supported_php_versions = array (
    	'5.2.2', '5.2.3', '5.2.4', '5.2.5', '5.2.6', '5.2.8', '5.3.0'
	);

	// invalid versions above the $min_considered_php_version,
	// should be mutually exclusive with $supported_php_versions

	// SugarCRM prohibits install on PHP 5.2.7 on all platforms
	$invalid_php_versions = array('5.2.7');

	// default unsupported
	$retval = 0;

	// versions below $min_considered_php_version are invalid
	if(1 == version_compare($sys_php_version, $min_considered_php_version, '<')) {
		$retval = -1;
	}

	// supported version check overrides default unsupported
	foreach($supported_php_versions as $ver) {
		if(1 == version_compare($sys_php_version, $ver, 'eq') || strpos($sys_php_version,$ver) !== false) {
			$retval = 1;
			break;
		}
	}

	// invalid version check overrides default unsupported
	foreach($invalid_php_versions as $ver) {
		if(1 == version_compare($sys_php_version, $ver, 'eq') && strpos($sys_php_version,$ver) !== false) {
			$retval = -1;
			break;
		}
	}

    //allow a redhat distro to install, regardless of version.  We are assuming the redhat naming convention is followed
    //and the php version contains 'rh' characters
    if(strpos($sys_php_version, 'rh') !== false) {
        $retval = 1;
    }

	return $retval;
}
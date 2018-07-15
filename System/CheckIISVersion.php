<?php

/**
 * Will check if a given IIS version string is supported (tested on this ver),
 * unsupported (results unknown), or invalid (something will break on this
 * ver).
 *
 * @return 1 implies supported, 0 implies unsupported, -1 implies invalid
 */
function check_iis_version($sys_iis_version = '') {

	$server_software = $_SERVER["SERVER_SOFTWARE"];
	$iis_version = '';
	if(strpos($server_software,'Microsoft-IIS') !== false && preg_match_all("/^.*\/(\d+\.?\d*)$/",  $server_software, $out))
	    $iis_version = $out[1][0];

    $sys_iis_version = empty($sys_iis_version) ? $iis_version : $sys_iis_version;

    // versions below $min_considered_iis_version considered invalid by default,
    // versions equal to or above this ver will be considered depending
    // on the rules that follow
    $min_considered_iis_version = '6.0';

    // only the supported versions,
    // should be mutually exclusive with $invalid_iis_versions
    $supported_iis_versions = array ('6.0', '7.0',);
    $unsupported_iis_versions = array();
    $invalid_iis_versions = array('5.0',);

    // default unsupported
    $retval = 0;

    // versions below $min_considered_iis_version are invalid
    if(1 == version_compare($sys_iis_version, $min_considered_iis_version, '<')) {
        $retval = -1;
    }

    // supported version check overrides default unsupported
    foreach($supported_iis_versions as $ver) {
        if(1 == version_compare($sys_iis_version, $ver, 'eq') || strpos($sys_iis_version,$ver) !== false) {
            $retval = 1;
            break;
        }
    }

    // unsupported version check overrides default unsupported
    foreach($unsupported_iis_versions as $ver) {
        if(1 == version_compare($sys_iis_version, $ver, 'eq') && strpos($sys_iis_version,$ver) !== false) {
            $retval = 0;
            break;
        }
    }

    // invalid version check overrides default unsupported
    foreach($invalid_iis_versions as $ver) {
        if(1 == version_compare($sys_iis_version, $ver, 'eq') && strpos($sys_iis_version,$ver) !== false) {
            $retval = -1;
            break;
        }
    }

    return $retval;
}
<?php

/**
 * getJavascriptSiteURL
 * This function returns a URL for the client javascript calls to access
 * the site.  It uses $_SERVER['HTTP_REFERER'] in the event that Proxy servers
 * are used to access the site.  Thus, the hostname in the URL returned may
 * not always match that of $sugar_config['site_url'].  Basically, the
 * assumption is that however the user accessed the website is how they
 * will continue to with subsequent javascript requests.  If the variable
 * $_SERVER['HTTP_REFERER'] is not found then we default to old algorithm.
 * @return $site_url The url used to refer to the website
 */
function getJavascriptSiteURL() {
	global $sugar_config;
	if(!empty($_SERVER['HTTP_REFERER'])) {
		$url = parse_url($_SERVER['HTTP_REFERER']);
		$replacement_url = $url['scheme']."://".$url['host'];
		if(!empty($url['port']))
		$replacement_url .= ':'.$url['port'];
		$site_url = preg_replace('/^http[s]?\:\/\/[^\/]+/',$replacement_url,$sugar_config['site_url']);
	} else {
		$site_url = preg_replace('/^http(s)?\:\/\/[^\/]+/',"http$1://".$_SERVER['HTTP_HOST'],$sugar_config['site_url']);
		if(!empty($_SERVER['SERVER_PORT']) &&$_SERVER['SERVER_PORT'] == '443') {
			$site_url = preg_replace('/^http\:/','https:',$site_url);
		}
	}
	//$GLOBALS['log']->debug("getJavascriptSiteURL(), site_url=".  $site_url);
	return $site_url;
}
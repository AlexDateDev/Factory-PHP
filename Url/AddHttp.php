<?php

function add_http($url) {
	if(!preg_match("@://@i", $url)) {
		$scheme = "http";
		if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
			$scheme = 'https';
		}

		return "{$scheme}://{$url}";
	}

	return $url;
}
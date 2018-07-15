<?php

/**
 * This function will take a number and system_id and format
 * @param	$url URL containing host to append port
 * @param	$port the port number - if '' is passed, no change to url
 * @return	$resulturl the new URL with the port appended to the host
 */
function appendPortToHost($url, $port)
{
	$resulturl = $url;

	// if no port, don't change the url
	if($port != '')
	{
		$split = explode("/", $url);
		//check if it starts with http, in case they didn't include that in url
		if(str_begin($url, 'http'))
		{
			//third index ($split[2]) will be the host
			$split[2] .= ":".$port;
		}
		else // otherwise assumed to start with host name
		{
			//first index ($split[0]) will be the host
			$split[0] .= ":".$port;
		}

		$resulturl = implode("/", $split);
	}

	return $resulturl;
}
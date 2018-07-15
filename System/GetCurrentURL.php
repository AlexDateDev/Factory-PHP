<?php
function getCurrentURL()
{
	$href = "http:";
	if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
	{
		$href = 'https:';
	}

	$href.= "//".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'].'?'.$_SERVER['QUERY_STRING'];
	return $href;
}

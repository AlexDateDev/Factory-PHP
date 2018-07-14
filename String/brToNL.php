<?php

function br2nl($str) {
	$regex = "#<[^>]+br.+?>#i";
	preg_match_all($regex, $str, $matches);

	foreach($matches[0] as $match) {
		$str = str_replace($match, "<br>", $str);
	}

	$brs = array('<br>','<br/>', '<br />');
	$str = str_replace("\r\n", "\n", $str); // make from windows-returns, *nix-returns
	$str = str_replace("\n\r", "\n", $str); // make from windows-returns, *nix-returns
	$str = str_replace("\r", "\n", $str); // make from windows-returns, *nix-returns
	$str = str_ireplace($brs, "\n", $str); // to retrieve it

	return $str;
}
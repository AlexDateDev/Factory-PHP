<?php



/**
 * This function returns an array of phpinfo() results that can be parsed and
 * used to figure out what version we run, what modules are compiled in, etc.
 * @param	$level			int		info level constant (1,2,4,8...64);
 * @return	$returnInfo		array	array of info about the PHP environment
 * @author	original by "code at adspeed dot com" Fron php.net
 * @author	customized for Sugar by Chris N.
 */
function getPhpInfo($level=-1) {
	/**	Name (constant)		Value	Description
		INFO_GENERAL		1		The configuration line, php.ini location, build date, Web Server, System and more.
		INFO_CREDITS		2		PHP Credits. See also phpcredits().
		INFO_CONFIGURATION	4		Current Local and Master values for PHP directives. See also ini_get().
		INFO_MODULES		8		Loaded modules and their respective settings. See also get_loaded_extensions().
		INFO_ENVIRONMENT	16		Environment Variable information that's also available in $_ENV.
		INFO_VARIABLES		32		Shows all predefined variables from EGPCS (Environment, GET, POST, Cookie, Server).
		INFO_LICENSE		64		PHP License information. See also the license FAQ.
		INFO_ALL			-1		Shows all of the above. This is the default value.
	 */
	ob_start();
	phpinfo($level);
	$phpinfo = ob_get_contents();
	ob_end_clean();

	$phpinfo	= strip_tags($phpinfo,'<h1><h2><th><td>');
	$phpinfo	= preg_replace('/<th[^>]*>([^<]+)<\/th>/',"<info>\\1</info>",$phpinfo);
	$phpinfo	= preg_replace('/<td[^>]*>([^<]+)<\/td>/',"<info>\\1</info>",$phpinfo);
	$parsedInfo	= preg_split('/(<h.?>[^<]+<\/h.>)/', $phpinfo, -1, PREG_SPLIT_DELIM_CAPTURE);
	$match		= '';
	$version	= '';
	$returnInfo	= array();

	if(preg_match('/<h1 class\=\"p\">PHP Version ([^<]+)<\/h1>/', $phpinfo, $version)) {
		$returnInfo['PHP Version'] = $version[1];
	}


	for ($i=1; $i<count($parsedInfo); $i++) {
		if (preg_match('/<h.>([^<]+)<\/h.>/', $parsedInfo[$i], $match)) {
			$vName = trim($match[1]);
			$parsedInfo2 = explode("\n",$parsedInfo[$i+1]);

			foreach ($parsedInfo2 AS $vOne) {
				$vPat	= '<info>([^<]+)<\/info>';
				$vPat3	= "/$vPat\s*$vPat\s*$vPat/";
				$vPat2	= "/$vPat\s*$vPat/";

				if (preg_match($vPat3,$vOne,$match)) { // 3cols
					$returnInfo[$vName][trim($match[1])] = array(trim($match[2]),trim($match[3]));
				} elseif (preg_match($vPat2,$vOne,$match)) { // 2cols
					$returnInfo[$vName][trim($match[1])] = trim($match[2]);
				}
			}
		} elseif(true) {

		}
	}

	return $returnInfo;
}
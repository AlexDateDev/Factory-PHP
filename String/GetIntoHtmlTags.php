<?php
 /**
 * Retorna el contingut de dintre d'una tag inici i final html
 * Ex: <b>example:</b> => example:
 * Ex: <div align=left>this is a test</div> => this is a test
 *
 * @param string $sTagIniEnd
 * @return string
 *
 * @version     3.1        => 08-10-2015
 */
function GetIntoHtmltags( $sTag )
{
	return preg_replace("/\<[^\>]*\>?/"," ",$sTag);
}
$a = GetIntoHtmltags( '<b>example:</b>'); 						// $a = (string:10)  example: 
$a = GetIntoHtmltags( '<div align=left>this is a test</div>'); 	// $a = (string:16)  this is a test 
$a = GetIntoHtmltags( '<div><span>1111</span></div>'); 			// $a = (string:8)   1111  
$a = GetIntoHtmltags( '<div>INICI<span>1111</span>FIN</div>'); 	// $a = (string:16)  INICI 1111 FIN 


 /**
 * Retorna el contingut de dintre d'una tag inici i final html
 * Ex: <b>example:</b> => example:
 * Ex: <div align=left>this is a test</div> => this is a test
 *
 * @param string $sTagIniEnd
 * @return string
 */
function GetIntoHtmltags( $sTagIniEnd )
{
    $out = array();
    preg_match_all("|<[^>]+>(.*)</[^>]+>|U", $sTagIniEnd, $out, PREG_PATTERN_ORDER);
    return $out[1][0];
}

$a = GetIntoHtmltags( '<b>example:</b>'); 						// $a = (string:8) example:
$a = GetIntoHtmltags( '<div align=left>this is a test</div>'); 	// $a = (string:14) this is a test
$a = GetIntoHtmltags( '<div><span>1111</span></div>'); 			// $a = (string:10) <span>1111
$a = GetIntoHtmltags( '<div>INICI<span>1111</span>FIN</div>'); 	// $a = (string:15) INICI<span>1111

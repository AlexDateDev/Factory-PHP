
<?php
/**
* Descomprime un string encriptado y zipado
*
* @param string_zip $strZip
* @return mixed
*
* @version     3.0        => 19-06-2008
*/
function get_unzip($strZip)
{
	return unserialize(base64_decode(gzuncompress($strZip)));
}
/**
 * Devuelde un valos encriptado y zipado
 *
 * @param mixed $mixed
 * @return string_zip
 *
 * @version     3.0        => 19-06-2008
 */
 function get_zip($mixed)
{
    return gzcompress(base64_encode(serialize($mixed)),9);
}  

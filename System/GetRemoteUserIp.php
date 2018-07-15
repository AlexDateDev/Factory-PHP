<?php
/**   
 * Devuelve la IP del usuari remoto
 *
 * @return string
 *
 * @version     3.0        => 19-06-2008
 */
function GetRemoteUserIp()
{
  	$tmp = array();
  	if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && strpos($_SERVER['HTTP_X_FORWARDED_FOR'],',')){
		$tmp +=  explode(',',$_SERVER['HTTP_X_FORWARDED_FOR']);
    }
    elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$tmp[] = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
    $tmp[] = $_SERVER['REMOTE_ADDR'];

    $ipusuari = $tmp['0'];        
    return $ipusuari;
}

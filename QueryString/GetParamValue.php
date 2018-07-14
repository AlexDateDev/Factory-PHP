<?php
// ----------------------------------------------------------------------------
// GetParamValue
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Devuelve el valor de un parametro
 *
 * @param string_url $sUrl
 * @param string $sParam
 * @param string $sDefValue
 * @return string
 *
 * @version     3.0        => 24-06-2008
 */
static function get_param_value( $sQueryString, $sParam, $sDefValue='' )
{
    $a = explode('&',$sQueryString); // -- 'a[0] => id=234
    foreach ($a as $key => $value)
    {
        $b = explode('=',$a[$key]);  // $b[0] = id, $b[1]=1234
        if($b[0]==$sParam)
        {
            return $b[1];
        }
    }
    return $sDefValue;
}
        
        
/**
 * This function will allow you to get a variable value from query string
 */
function getVariableFromQueryString($variable, $string){
	$matches = array();
	$number = preg_match("/{$variable}=([a-zA-Z0-9_-]+)[&]?/", $string, $matches);
	if($number){
		return $matches[1];
	}
	else{
		return false;
	}
}
?>
                                  
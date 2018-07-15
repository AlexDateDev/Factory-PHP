
<?php
/**
 * Verifica si es un email correcto. RFC 2822
 *
 * @param $sMail A string containing an e-mail address.
 * @return TRUE if the address is in a valid format.
 *
 * @version     3.0        => 19-06-2008
 */
static function is_email($sEmail)
{
    $mail_address = $sEmail;
    if( function_exists("filter_var") )
    {
        if( !filter_var($mail_address, FILTER_VALIDATE_EMAIL) )
            return false;

        return true;
    }

    $atIndex = strrpos($mail_address, "@");

    if( $atIndex === false ) return false;

    $domain = substr($mail_address, ($atIndex + 1));
    $local  = substr($mail_address, 0, $atIndex);

    $domainLen = strlen($domain);
    $localLen  = strlen($local);

    // Local size
    if( ($localLen < 1) || ($localLen > 64) ) return false;

    // Domain size
    if( ($domainLen < 1) || ($domainLen > 255) ) return false;

    // Local starts or ends with dot [.] ?
    if( ($local[0] == '.') || $local[$localLen - 1] == '.' ) return false;

    // Local have 2 consecutives dots [..] ?
    if( preg_match('/\\.\\./', $local) ) return false;

    // Invalid char in domain
    if( !preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain) ) return false;

    // Domain have 2 consecutives dots [..] ?
    if( preg_match('/\\.\\./', $domain) ) return false;

    // Invalid char in local
    if( !preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\", "", $local)) )
    {
        if( !preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\", "", $local)) ) return false;
    }

    // Check domain with checkdnsrr() function
    if( !(checkdnsrr($domain, "MX") || checkdnsrr($domain, "A")) ) return false;

    return true;
}

?>

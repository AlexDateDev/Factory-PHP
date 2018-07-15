
<?php

/**
 * Codifica una url a carcters % tots els caracters no alfanumrics
 * Ex:    'http://www.php.es/par word/any?no=true&si=23'
 *        'http%3A%2F%2Fwww.php.es%2Fpar%20word%2Fany%3Fno%3Dtrue%26si%3D23'
 *
 * @param string $sUrlNormal
 * @return string
 *
 * @version     3.0        => 19-06-2008
 */
function get_encoded( $sUrlNormal )
{
    return urlencode( $sUrlNormal );
}

/**
 * Decodifica una url amb carcters % a caracters no alfanumrics
 * Ex:    'http%3A%2F%2Fwww.php.es%2Fpar%20word%2Fany%3Fno%3Dtrue%26si%3D23'
 *         'http://www.php.es/par word/any?no=true&si=23'
 *
 * @param string $sUrlNormal
 * @return string
 *
 * @version     3.0        => 19-06-2008
 */
function Decode( $sUrlEncoded )
{
    return urldecode( $sUrlEncoded );
}
?>

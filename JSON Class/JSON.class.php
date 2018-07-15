<?php


/**
 * This class used to perform json encode / decode functions but has now been replaced by
 * the built in php.
 *
 * Note: We no longer eval our json so there is no more need for security envelopes. The parameter
 * has been left for backwards compatibility.
 * @api
 */
class JSON
{

    /**
     * JSON encode a string
     *
     * @param string $string
     * @param bool $addSecurityEnvelope defaults to false
     * @param bool $encodeSpecial
     * @return string
     */
    public static function encode($string, $addSecurityEnvelope = false, $encodeSpecial = false)
    {
        $encodedString = json_encode($string);

        if ($encodeSpecial)
        {
            $charMap = array('<' => '\u003C', '>' => '\u003E', "'" => '\u0027', '&' => '\u0026');
            foreach($charMap as $c => $enc)
            {
                $encodedString = str_replace($c, $enc, $encodedString);
            }
        }

        return $encodedString;
    }

    /**
     * JSON decode a string
     *
     * @param string $string
     * @param bool $examineEnvelope Default false, true to extract and verify envelope
     * @param bool $assoc
     * @return string
     */
    public static function decode($string, $examineEnvelope=false, $assoc = true)
    {
        return json_decode($string,$assoc);
    }

    /**
     * @deprecated use JSON::encode() instead
     */
     /*
    public static function encodeReal($string)
    {
        return self::encode($string);
    }
*/
    /**
     * @deprecated use JSON::decode() instead
     */
     /*
    public static function decodeReal($string)
    {
        return self::decode($string);
    }
    */
}

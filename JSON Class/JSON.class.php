<?php

/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

/*********************************************************************************

 * Description:  Includes generic helper functions used throughout the application.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

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
    public static function encodeReal($string)
    {
        return self::encode($string);
    }

    /**
     * @deprecated use JSON::decode() instead
     */
    public static function decodeReal($string)
    {
        return self::decode($string);
    }
}

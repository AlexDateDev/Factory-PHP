
<?php
/**
 * Comprueva la sintaxis de una url
 *
 * @param $url The URL to verify.
 * @param $absolute  Whether the URL is absolute (beginning with a scheme such as "http:").
 * @return TRUE if the URL is in a valid format.
 *
 * @version     3.0        => 19-06-2008
 */
static function is_valid($sUrl, $bAsolute = false)
{
  $allowed_characters = '[a-z0-9\/:_\-_\.\?\$,;~=#&%\+]';
  if ($bAsolute)
  {
    return preg_match("/^(http|https|ftp):\/\/". $allowed_characters ."+$/i", $sUrl);
  }
  else {
    return preg_match("/^". $allowed_characters ."+$/i", $sUrl);
  }
}
?>

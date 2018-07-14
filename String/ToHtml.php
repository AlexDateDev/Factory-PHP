<?php
/**
 * Retorna un text sense caracters especials HTML i substiruint els CRLF per <br />
 * O si es blanc o null retorna '&nbsp;'
 *
 * @param string Text observacions
 * @return string
 * @package String
 *
 * @version     3.1        => 09-10-2015
 * @version     3.1d    => 17-07-2009    // Si value esta vacio, devuelve vacio
 * @version     3.0        => 19-06-2008
 */
function ToHtml($o)
{
    if($o==='' || is_null($o)){
        return '&nbsp;';
    }
    return nl2br(htmlspecialchars($o));
}

$a = ToHtml("ok");										// $a = (string:2) ok
$a = ToHtml("ok\r\nOK");								// $a = (string:12) ok<br />OK
$a = ToHtml("<a href='http://www.google.es'>ok</a>");
// $a = (string:49) &lt;a href='http://www.google.es'&gt;ok&lt;/a&gt;

$a = ToHtml("<a href=\"http://www.google.es\">ok</a>");
// $a = (string:59) &lt;a href=&quot;http://www.google.es&quot;&gt;ok&lt;/a&gt;
<?php

// works nicely to change UTF8 strings that are html entities - good for PDF conversions
function html_entity_decode_utf8($string)
{
    static $trans_tbl;
    // replace numeric entities
    //php will have issues with numbers with leading zeros, so do not include them in what we send to code2utf.
    $string = preg_replace('~&#x0*([0-9a-f]+);~ei', 'code2utf(hexdec("\\1"))', $string);
    $string = preg_replace('~&#0*([0-9]+);~e', 'code2utf(\\1)', $string);
    // replace literal entities
    if (!isset($trans_tbl))
    {
        $trans_tbl = array();
        foreach (get_html_translation_table(HTML_ENTITIES) as $val=>$key)
            $trans_tbl[$key] = utf8_encode($val);
    }
    return strtr($string, $trans_tbl);
}
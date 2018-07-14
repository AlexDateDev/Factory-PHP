<?php
/**
 * Sustituye los carácteres html especiales por sus equivalentes
 *
 * Ex:    $bReplaceQuotes = true
 *
 *         &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt; => "<a href='test'>Test</a>"
 *         &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt; => '<a href=\'test\'>Test</a>'
 *         &lt;a href=&quot;test&quot;&gt;Test&lt;/a&gt; => "<a href=\"test\">Test</a>"
 *         &lt;a href=&quot;test&quot;&gt;Test&lt;/a&gt; => '<a href="test">Test</a>'
 *
 * @param string $sText
 * @param bool $bReplaceQuotes
 * @return string
 *
 * @version     3.1        => 08-10-2015
 * @version     3.0        => 19-06-2008
 */
 
function EntityDecode( $sText, $bReplaceQuotes=true)
{
    if( $bReplaceQuotes){
        $ret = html_entity_decode($sText, ENT_QUOTES);
    }
    else{
        $ret = html_entity_decode($sText );
    }
    return $ret;
}

$a = EntityDecode('&lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;');
// $a = "<a href='test'>Test</a>"

<?php
 /**
 * Sustituye los carácteres html especiales por sus equivalentes
 *
 * Ex:    $bReplaceQuotes = true
 *         "<a href='test'>Test</a>"    =>    &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;
 *         '<a href=\'test\'>Test</a>' 	=>    &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;
 *         "<a href=\"test\">Test</a>" 	=>    &lt;a href=&quot;test&quot;&gt;Test&lt;/a&gt;
 *         '<a href="test">Test</a>'    =>    &lt;a href=&quot;test&quot;&gt;Test&lt;/a&gt;
 * 
 * Ex:    $bReplaceQuotes = false
 *         "<a href='test'>Test</a>"    =>    &lt;a href='test'&gt;Test&lt;/a&gt;
 *         '<a href=\'test\'>Test</a>' 	=>    &lt;a href='test'&gt;Test&lt;/a&gt;
 *         "<a href=\"test\">Test</a>" 	=>    &lt;a href=&quot;test&quot;&gt;Test&lt;/a&gt;
 *         '<a href="test">Test</a>'    =>    &lt;a href=&quot;test&quot;&gt;Test&lt;/a&gt;
 *
 * @param string $sText
 * @param bool $bReplaceQuotes
 * @return string
 *
 * @version     3.1        => 08-10-2015
 * @version     3.0        => 19-06-2008
 */
 
function EntityEcode( $sText, $bReplaceQuotes=true)
{
    if( $bReplaceQuotes){
        $ret = htmlspecialchars($sText, ENT_QUOTES);
    }
    else{
        $ret = htmlspecialchars($sText );
    }
    return $ret;
}

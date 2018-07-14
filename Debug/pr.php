<?php
// ----------------------------------------------------------------------------
// pr
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php

/**                        
 * print_r de qualsevol cosa
 * No necessita cap altre arxiu php
 *
 * @param Objecte Objecte a mostrar
 *
 * @version     3.1        => 08-10-2015
 * @version     3.0        => 24-06-2008
 */

static function pr( $o )
{
    $sOut = '<pre>'.addslashes(nl2br(print_r( $o, true ))).'</pre>';
    $sOut = str_replace( array("\r", "\n", "\r\n"), array('','',''), $sOut);

    echo '<script type="text/javascript">';
    echo 'w=window.open("","_blank","toolbar=yes, location=yes, directories=no, status=yes, menubar=yes, scrollbars=yes, resizable=yes, copyhistory=yes" );';//, width=400, height=400")';
    echo 'w.document.write("<html><head>';
    //echo '<meta http-equiv=\"Content-type\" content=\"text/html; charset=ISO-8859-1\" />';    
    echo '<title>debug</title></head><body>'.$sOut .'</body>");';
    echo 'w.document.close();';
    echo '</script>';

}	

/**                        
 * print_r d'un objecte
 *
 * @param Objecte Objecte a mostrar
 *
 * @version     3.0        => 24-06-2008
 */
function pr( $o )
{

    $id = session_id();
    if( empty( $id ))
    {
        session_start();
    }
    if( is_object($o) && method_exists($o,'get_query') )
    {
        $o = ''.$o;
    }
    $_SESSION[ 'DEBBUG' ] = $o;
    echo '<script>';
    echo 'window.open("'.HTTP_APP.'system/core/debug.php","_blank","toolbar=yes, location=yes, directories=no, status=yes, menubar=yes, scrollbars=yes, resizable=yes, copyhistory=yes" );';//, width=400, height=400")';
    echo '</script>';
}
?>



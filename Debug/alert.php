<?php
// ----------------------------------------------------------------------------
// alert
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php

/**
 * Mostra un alert pel navegador
 *
 * @param String
 *
 * @version     3.0        => 24-06-2008
 */
function alert($t)
{
    $t = addslashes($t);
    $t=str_replace( '\\\\n', '\\n', $t );
    $t=str_replace( '\\\\t', '\\t', $t );
    echo "<script>alert('$t');</script>";
}
?>                 

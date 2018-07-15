<?php
/**        
 * Devuelve la pgina php actual
 *
 * @return string
 *
 * @version     3.0        => 19-06-2008
 *
 * /dtt/libs/demos2/demo_a.php
 */
function GetURIActualPage()
{
    return $_SERVER[ 'PHP_SELF'];
}
?>
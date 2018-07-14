
<?php
/**
 * Indica si existe un parametro en el post
 *
 * @param string $sName
 * @return bool
 *
 * @version     3.0        => 24-06-2008
 */
static function existeClave( $clave )
{
    return isset($_POST[$clave]);
}
?>
                    
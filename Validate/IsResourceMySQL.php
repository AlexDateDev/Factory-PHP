
<?php
/**
 * Indica si un recurso es del tipo database
 *
 * @param resource $hDB
 * @return bool
 */
static function is_resource_mysql( $hDB )
{
    return get_resource_type($hDB) == 'mysql link';
}
?>

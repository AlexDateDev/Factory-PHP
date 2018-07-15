
<?php
/**
 * Indica si un recurso es del tipo archivo
 *
 * @param resource $hFile
 * @return bool
 */
static function is_resource_file( $hFile )
{
    return get_resource_type($hFile) == 'file';
}
?>

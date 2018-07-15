

<?php
/**
 * Indica si un año es visiesto
 *
 * @param int $nAnio (YYYY)
 * @return bool
 */
static function is_visiesto( $nAnio )
{
    return (((fmod($nAnio,4)==0) && (fmod($nAnio,100)!=0)) || (fmod($nAnio,400)==0));
}
?>

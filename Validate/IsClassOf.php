
<?php
/**
 * Indica si un objeto es de una clase determinada
 *
 * @param mixed $oObj
 * @param string $sClass
 * @return bool
 *
 */
static function is_class_of( $oObj, $sClass )
{
    return strtoupper(get_class( $oObj )) == strtoupper($sClass);
}

?>

<?php
/**
 * Combina el valor del primer array como clave con el valor del segundo array como valor
 *                       
 * @param array $arrKeys
 * @param array $arrValues
 * @return array
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function CombineKeyValue( $arrKeys, $arrValues ){
    return array_combine($arrKeys, $arrValues);
}
?>
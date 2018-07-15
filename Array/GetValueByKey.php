<?php
/**
 * Devuelve el valor de una clave del array o si no existe un valor por defecto
 *
 * @param array $arr
 * @param string | int $key
 * @param mixed $sDefault
 * @return mixed
 *
 * @version 3.0        => 12-4-2008
 */                           
static function GetValueByKey( $arr, $key, $sDefault='' )
{
    if( isset( $arr[ $key]))
    {
        return $arr[ $key ];
    }
    else
    {
        return $sDefault;
    }
}
?>
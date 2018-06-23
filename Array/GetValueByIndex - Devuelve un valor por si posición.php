<?php
/**
 * Devuelve el valor de la posición secuencial deterninada o un valor por defecto so no existe
 *
 * @param arrau $arr
 * @param int $nPos
 * @param mixed $sDefault
 * @return mixed
 *
 * @version 3.0        => 12-4-2008
 */
static function GetValueByIndex( $arr, $nPos, $sDefault='' )
{
    $n = 0;
    foreach ($arr as $value)
    {
        if( $n==$nPos)
        {
            return $value;
        }
        $n++;
    }
    return $sDefault;

}
?>
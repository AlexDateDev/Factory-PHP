<?php
 * Devuelve la clave que ocupa un valor determinado o si no existe, un valor por defecto
 *
 * @param array $arr
 * @param string $sValue
 * @param string $sDefault
 * @return mixed
 *               
 * @version 3.0        => 12-4-2008
 */
static function GetKeyByValue( $arr, $sValue, $sDefault='' )
{
    foreach ($arr as $key => $value)
    {
        if( $value == $sValue)
        {
            return $key;
        }
    }
    return $sDefault;

}
?>
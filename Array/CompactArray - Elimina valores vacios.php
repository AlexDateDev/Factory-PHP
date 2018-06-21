<?php
/**
 * Devuelve un array sin valorese vacios (null, 0, '')
 *                       
 * @param array $arr
 * @return array
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function CompactArray( $arr )
{
    $t = array();
    foreach ($arr as $key => $value){
        if( !empty($arr[$key])){
            $t[$key]=$value;
        }
    }
    return $t;
}
?>
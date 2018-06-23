<?php
/**
 * Insertamos una valor en una posición determianda
 *
 * @param array $arr
 * @param int $nPos
 * @param mixed $value
 * @return arraay
 *
 * @version 3.2        => 08-10-2015
 * @version 3.1        => 27-10-2009 
 * @version 3.0        => 12-4-2008
 */
static function InsertValueToPosition( $arr, $nPos, $value)
{
    $t=array();       
    $n=0;
    foreach($arr as $key => $val){
        if($n < $nPos ){
            $t[$key] = $val;
        }
        else{
            break;
        }
        $n++;
    }
    $t[$nPos] = $value;
    $n=0;
    foreach($arr as $key => $val){
        if( $n >= $nPos){
            $t[$key] = $val;
        }
        $n++;
    }
    return $t;
}
?>
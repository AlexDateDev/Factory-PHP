<?php
/**
 * Devuelve una parte del array
 *
 * @param array $arr
 * @param int $nBegin
 * @param int $nEnd
 * @return array
 *
 * @version 3.0        => 12-4-2008
 * @version 3.1        => 27-10-2009
 */
static function GetSubArray( $arr, $nBegin, $nEnd ){
    return array_slice($arr, $nBegin, $nEnd);
}

?>
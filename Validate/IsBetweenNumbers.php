
<?php
/**
 * Indica si un valor esta comprendido entre otros dos
 *
 * @param int $nNum
 * @param int $nMin
 * @param int $nMax
 * @param bool $bEntornoCerrado
 * @return bool
 */
static function is_between($nNum, $nMin, $nMax, $bEntornoCerrado=true)
{
    if($bEntornoCerrado)
    {
        return ( $nNum >= $nMin && $nNum <= $nMax);
    }
    else
    {
        return ( $nNum > $nMin && $nNum < $nMax);
    }
    return false;
}
?>

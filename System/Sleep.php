<?php
/**
* sleeps some number of microseconds
*
* @param    string $usec the number of microseconds to sleep
* @access   public
*
* @version     3.0        => 19-06-2008
*/
function sleep($usec)
{
    $start = gettimeofday();
    do
    {
        $stop = gettimeofday();
        $timePassed = 1000000 * ($stop['sec'] - $start['sec'])
        + $stop['usec'] - $start['usec'];
    }
    while ($timePassed < $usec);
}
?>

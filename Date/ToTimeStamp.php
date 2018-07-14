<?php
// ----------------------------------------------------------------------------
// ToTimeStamp
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
  * Convierte una fecha STD en timestamp, 15-05-2010 => 1273874400
  *
  * Returns the timestamp equivalent of a given DATE
  *
  * @param string_date_std $sDateSTD
  * @return     integer
  */
static function to_timestamp($sDateSTD)
{
    if( strlen($sDateSTD) != 10)
    {
        return '';
    }
    $datetime = self::to_MYSQL($sDateSTD);
    $date = $datetime;
    $hours = 0;
    $minutes = 0;
    $seconds = 0;
    list($year, $month, $day) = explode("-", $date);
    return mktime($hours, $minutes, $seconds, $month, $day, $year);
}
?>
                             
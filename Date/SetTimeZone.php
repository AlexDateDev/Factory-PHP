<?php
// ----------------------------------------------------------------------------
// SetTimeZone
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Estableix la zona horaria
 *
 */
static function set_time_zone()
{
    if (version_compare(phpversion(), "5.0.4", ">"))
    {
        // -- Especifica el TZ, sino dona un E_NOTICE
        date_default_timezone_set( 'Europe/Madrid');
    }
    else
    {                               
        // No es necessari ja que la versiso php no ho implementa
        //return phpversion();
    }
}

?>

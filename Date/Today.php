<?php
// ----------------------------------------------------------------------------
// Today
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Retorna el dia actual en format STD (dd-mm-yyyy)
 * Es pot indicar un separador diferent
 *
 * @return string
 *
 * @version     3.1        => 08-10-2015
 * @version     3.0        => 12-04-2008
 */
static function Today( $sep='-')
{
    return date('d'.$sep.'m'.$sep.'Y');
}
?>
               
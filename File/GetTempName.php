<?php
// ----------------------------------------------------------------------------
// GetTempName
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Retorna un nom remporal únic per un arxiu en un directori determinat
 *
 * @param string $sDir
 * @param string $sPrefix
 */
static function get_temp_name( $sDir=null, $sPrefix='temp')
{
    if( is_null($sDir))
    {
        $sDir = '.';
    }
    return tempnam( $sDir, $sPrefix);
}

function mk_temp_dir( $base_dir, $prefix="" )
{
    $temp_dir = tempnam( $base_dir, $prefix );
    if( !$temp_dir || !unlink( $temp_dir ) )
    {
        return( false );
    }

    if( sugar_mkdir( $temp_dir ) ){
        return( $temp_dir );
    }

    return( false );
}
?>
                
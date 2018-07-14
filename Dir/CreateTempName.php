<?php
// ----------------------------------------------------------------------------
// CreateTempName
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
     * Devuelve el directorio temporal del sistema
     *
     * @return unknown
     */
    static function get_temp()
    {
        foreach( array( 'TMPDIR', 'TMP', 'TEMP' ) as $var )
        {
            $tmp = getenv( $var );
            if( $tmp && file_exists( $tmp ) &&
                is_dir( $tmp ) &&
                is_writable( $tmp ) )
            {
                return self::get_normalized($tmp);
            }
        }
        # Hope this is Unix of some kind!
        return '/tmp/';
    }
?>
                                               
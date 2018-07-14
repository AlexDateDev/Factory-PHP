<?php
// ----------------------------------------------------------------------------
// NormalizeExtension
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Normaliza la extensión, sin el .
         * Extensiones con valores no letras y números se desestiman
         *
         * @param $ext
         * @return string
         */
        static function get_normalize_extension( $ext )
        {
            $lower = strtolower( $ext );
            $squish = array(
                'htm' => 'html',
                'jpeg' => 'jpg',
                'mpeg' => 'mpg',
                'tiff' => 'tif' );
            if( isset( $squish[$lower] ) )
            {
                return $squish[$lower];
            }
            elseif( preg_match( '/^[0-9a-z]+$/', $lower ) )
            {
                return $lower;
            }
            else
            {
                return '';
            }
        }
?>

<?php
// ----------------------------------------------------------------------------
// GetScanf
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Retorna un valor en forma d'un tipus de format
         *
         * @param string $sFormat
         * @return mixed
         */
        static function get_scanf( $hFile, $sFormat)
        {
            return fscanf( $hFile, $sFormat);
        }
?>
                 
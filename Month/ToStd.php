<?php
// ----------------------------------------------------------------------------
// ToStd
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Devuelve un mes el formato MM
         *
         * @param int $nMes (1-12)
         * @return string (01-12)
         */
        static function get_standarized( $nMes )
        {
            return substr( '00'.$nMes, -2);
        }
?>
                  
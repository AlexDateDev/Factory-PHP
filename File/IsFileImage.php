<?php
// ----------------------------------------------------------------------------
// IsFileImage
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Indica si l'arxiu és una imatge
         *
         * @return bool
         */
        static function is_image($sFile)
        {
            $trash = '';
            return( (bool)ereg("(\.jpeg$)|(\.gif$)|(\.jpg$)|(\.png$)",$sFile,$trash));
        }
?>
                  
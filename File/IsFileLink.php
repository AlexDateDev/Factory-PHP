<?php
// ----------------------------------------------------------------------------
// IsFileLink
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Indica si l'arxiu �s un link simb�lic, no es necessari que estigui obert
         *
         * @return unknown
         */
        static function is_link_file($sFileName)
        {
            return is_link($sFileName);
        }
?>
             
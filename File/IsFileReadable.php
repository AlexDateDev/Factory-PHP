<?php
// ----------------------------------------------------------------------------
// IsFileReadable
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Indica si l'arxiu es pot llegir, no es necessari que estigui obert
         *
         * @return bool
         */
        static function is_readable_file( $sFileName)
        {
            return is_readable($sFileName);
        }

?>
                       
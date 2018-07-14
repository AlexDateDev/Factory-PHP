<?php
// ----------------------------------------------------------------------------
// GetTargetLink
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Retorna el nom de l'arxiu d'on apunta el link, no es necessari que estigui obert
         *
         * @return string
         */
        static function get_target_link($sFileName)
        {
            return readlink($sFileName);
        }
?>
       
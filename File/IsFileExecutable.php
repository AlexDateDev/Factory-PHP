<?php
// ----------------------------------------------------------------------------
// IsFileExecutable
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Indica si l'arxiu es pot executar o no, no es necessari que estigui obert
         *
         * @return string
         */
        static function is_executable_file($sFileName)
        {
            return is_executable($sFileName);
        }
?>
                               
<?php
// ----------------------------------------------------------------------------
// GetNewTempFile
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Devuevle un identificador a un archivo temporal abierto
         *
         * @return resource
         */
        static function get_new_temporal_file()
        {
            return tmpfile();
        }
?>
                   
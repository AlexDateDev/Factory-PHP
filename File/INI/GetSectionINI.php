<?php
// ----------------------------------------------------------------------------
// GetSection
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Devuelve las secciones del archivo .ini
         *
         * @param string_path $sPathFile
         * @return array
         */
        static function get_sections($sPathFile)
        {
            return array_keys(parse_ini_file($sPathFile,true));
        }
?>
                        
<?php
// ----------------------------------------------------------------------------
// GetUnzip
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Descomprime un string encriptado y zipado
         *
         * @param string_zip $strZip
         * @return mixed
         *
         * @version     3.0        => 24-06-2008
         */
        static private function get_unzip($strZip)
        {
            return unserialize(base64_decode(gzuncompress($strZip)));
        }
?>
                     
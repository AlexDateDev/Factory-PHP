<?php
// ----------------------------------------------------------------------------
// GetZip
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Devuelde un valos encriptado y zipado
         *
         * @param mixed $mixed
         * @return string_zip
         *
         * @version         3.0        => 24-06-2008
         */
        static private function get_zip($mixed)
        {
            return gzcompress(base64_encode(serialize($mixed)),9);
        }
?>
               
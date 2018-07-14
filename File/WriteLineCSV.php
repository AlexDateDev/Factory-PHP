<?php
// ----------------------------------------------------------------------------
// WriteLine
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Escribe una línea de valroes en un archivo CVS
         *
         * @param    resource    hFile
         * @param    array        valores a escribir
         * @param    string        delimiter
         * @param    string        enclosure
         * @return    int            length of written string
         */
        static function write_line($hFile, $aFields, $sDelimiter = "\t", $sEnclosure = '"')
        {
            // Checking for a handle resource
            if ( ! is_resource($hFile))
            {
                throw new Exception( 'El handle no es un recurso');
            }

            // OK, it is a resource, but is it a stream?
            if (get_resource_type($hFile) !== 'stream')
            {
                throw new Exception( 'El handle no es un recurso stream');
            }

            // Checking for an array of fields
            if ( ! is_array($aFields))
            {
                throw new Exception( 'Array de campos incorrecto');
            }

            // validate delimiter
            if (strlen($sDelimiter) > 1)
            {
                throw new Exception( 'Delimitador incorrecto');
            }

            // validate enclosure
            if (strlen($sEnclosure) > 1)
            {
                throw new Exception( 'Entre comillas incorrecto');

            }

            $out = '';

            foreach ($aFields as $cell)
            {
                $cell = str_replace($sEnclosure, '\\'.$sEnclosure, $cell);

                $out .= $sEnclosure.$cell.$sEnclosure.$sDelimiter;
            }

            $length = @fwrite($hFile, substr($out, 0, -1)."\n");
            return $length;
        }
?>

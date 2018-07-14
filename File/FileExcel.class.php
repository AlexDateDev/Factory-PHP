<?php
// ----------------------------------------------------------------------------
// FileExcel_php
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
<?php

/**
* FILE_EXCEL.
* Arxhivo <table><tr><td></td></tr></table>
*
* @author         Alexandre Solé i Faura
*
* @version         3.0        => 18-05-2010
*
*/

require_once( 'FILE.class.php');

if( !class_exists('FILE_EXCEL',false))
{
    abstract class FILE_EXCEL extends FILE
    {
        /**
         * Inicio del archivo EXCEL
         *
         * @param resource $hFile
         */
        static function write_begin( $hFile)
        {
            @fwrite($hFile, '<table>'."\n");
        }
                                               
        /**
         * Fin del archivo EXCEL
         *
         * @param resource $hFile
         */
        static function write_end( $hFile)
        {
            @fwrite($hFile, '</table>'."\n");
        }
        /**
         * Escribe una línea de valroes en un archivo EXCEL
         *
         * @param    resource    hFile
         * @param    array        valores a escribir
         * @param    string        delimiter
         * @param    string        enclosure
         * @return    int            length of written string
         */
        static function write_line($hFile, $aFields )
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

            $out = '<tr>';
            foreach ($aFields as $cell)
            {
                $out .= '<td>'.$cell.'</td>';
            }
            $out .= '</tr>';
            $length = @fwrite($hFile, $out."\n");
            return $length;
        }
    }
}

/*
$hF = FILE_EXCEL::open( 'bb.xls','a+');
FILE_EXCEL::write_begin($hF);
$a[] = 'aaaad aa';
$a[] = 'bbb  bbbd ';
$a[] = 23;
$a[] = 24.44;
$a[] = -33323424.44;
FILE_EXCEL::write_line($hF, $a);
FILE_EXCEL::write_line($hF, $a);
FILE_EXCEL::write_line($hF, $a);
FILE_EXCEL::write_end($hF);
*/
?>
?>

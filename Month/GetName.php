<?php
// ----------------------------------------------------------------------------
// GetName
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
    /**
         * Devuelve el nombre del mes
         *
         * @param int $nMes (1-12)
         * @return string
         *
         * @version     3.0        => 12-4-2008
         */
        static function get_nombre( $nMes )
        {
            switch( $nMes)
            {
                case 1:    return 'Enero';
                case 2: return 'Febrero';
                case 3: return 'Marzo';
                case 4: return 'Abril';
                case 5: return 'Mayo';
                case 6: return 'Junio';
                case 7: return 'Julio';
                case 8: return 'Agosto';
                case 9: return 'Septiembre';
                case 10: return 'Octubre';
                case 11: return 'Noviembre';
                case 12: return 'Diciembre';
                default:
                    throw new Exception( 'get_nombre: Número de mes incorrecto: '.$nMes);
                    return '';
            }
        }          
?>

<?php
// ----------------------------------------------------------------------------
// GetLastDayNatural
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Devuelve el último dia del mes, por defecto sobre el año actual
         *
         * @param int $nMes (1-12)
         * @param int $nAny (yyyy) o año actual
         * @return string_std
         *
         * @version     3.0        => 12-4-2008
         */
        static function get_ultimo_dia_natural($nMes, $nAny='' )
        {
            if( empty($nAny))
            {
                $nAny = date('Y');
            }
               if (((fmod($nAny,4)==0) and (fmod($nAny,100)!=0)) or (fmod($nAny,400)==0))
               {
                $dias_febrero = 29;
               }
               else
               {
                $dias_febrero = 28;
               }
               switch($nMes)
               {
                case 1: $dia= 31; break;
                   case 2: $dia= $dias_febrero; break;
                   case 3: $dia= 31; break;
                   case 4: $dia= 30; break;
                   case 5: $dia= 31; break;
                   case 6: $dia= 30; break;
                   case 7: $dia= 31; break;
                   case 8: $dia= 31; break;
                   case 9: $dia= 30; break;
                   case 10: $dia= 31; break;
                   case 11: $dia= 30; break;
                   case 12: $dia= 31; break;
               }
               return $dia.'-'.substr( '00'.$nMes, -2).'-'.$nAny;
        }

?>

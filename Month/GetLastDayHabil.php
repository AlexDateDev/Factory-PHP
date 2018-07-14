<?php
// ----------------------------------------------------------------------------
// GetLastDayHabil
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Devuelve la fecha del último dia habil del mes.  Formato dd-mm-yyy
         *
         * @param int $nMes
         * @param int $nAny
         * @return string_date_std
         */
        static function get_ultimo_dia_habil($nMes, $nAny='' )
        {
            if(empty($nAny))
            {
                $nAny = date('Y');
            }
            $sFecha = self::get_ultimo_dia_natural_mes($nMes, $nAny );
            $nDia = self::get_dia_de_la_semana($sFecha );
            if( $nDia == WEEK::DOMINGO)
            {
                $nDia--;
            }
            if( $nDia == WEEK::SABADO)
            {
                $nDia--;
            }
            return date( 'd-m-Y', mktime ( 0, 0, 0, $nMes, $nDia, $nAny ));
        }

?>                           

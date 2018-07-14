<?php
// ----------------------------------------------------------------------------
// GetNumDays
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Devuelve el n�mero de dias de un m�s y a�o
         *
         * @param int $nAnio (YYYY)
         * @param int $nMes (1-12)
         * @return int
         */
        static function get_num_days( $nMes, $nAnio= '')
        {
            if(empty($nAnio))
            {
                $nAnio = date('Y');
            }
            return cal_days_in_month(CAL_GREGORIAN, $nMes, $nAnio);
        }

?>
               
<?php
// ----------------------------------------------------------------------------
// CalculateYearsOld
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Calcula la edat de una persona por la fecha de su nacimiento
         *
         * @param String(date) $dtBorn
         * @return Integer
         */
        static function calcular_edat($sDate)
        {               
            return     floor(self::get_diff_days($sDate,date("d-m-Y"))/365);
        }
?>

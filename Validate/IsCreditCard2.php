
<?php
    /**
         * Validación del número de una tarjeta de crédito
         *
         * @param unknown_type $CCNumber
         * @param unknown_type $month
         * @param unknown_type $year
         * @return unknown
         */
        /*
        static function is_credit_card($CCNumber, $month, $year)
        {
            $ret = false;
            if ($CCNumber != false) {
                $date = time();
                $currentYear = date("Y", $date);
                $currentMonth = date("m", $date);
                if ($month < $currentMonth && $year == $currentYear) {
                    return false;
                } else {
                    $ret = true;
                }
                $CCNumberLenght = strlen($CCNumber);
                if ($CCNumberLenght != 13 && $CCNumberLenght != 15 && $CCNumberLenght != 16) {
                    return false;
                } else {
                    $ret = true;
                }
                if (($CCNumberLenght % 2) == 0) {
                    $pair = 0;
                } else {
                    $pair = 2;
                }
                for($i = 0;$i != $CCNumberLenght;$i++) {
                    $numberArray[$i] = substr($CCNumber, $i, 1);
                }
                for($nume = ($p / 2);$nume != $CCNumberLenght - $pair;$nume = $nume + 2) {
                    $numberArray[$nume] = $numberArray[$nume] * 2;
                    if ($numberArray[$nume] >= 10) {
                        $X1 = substr($numberArray[$nume], 0, 1);
                        $X2 = substr($numberArray[$nume], 1, 1);
                        $numberArray[$nume] = substr($numberArray[$nume], 0, 1) + substr($numberArray[$nume], 1, 1);
                    }
                }
                for($i = 0;$i != $CCNumberLenght;$i++) {
                    $val = $val + $numberArray[$i];
                }
                if ($val == 0) {
                    return false;
                }
                if (substr($val, 1, 1) != 0) {
                    return false;
                } else {
                    return true;
                }
            }
        }
*/
?>              
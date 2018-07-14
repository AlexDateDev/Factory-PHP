<?php
// ----------------------------------------------------------------------------
// alertBack
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Alert and back to previous page
         *
         * @param String $msg
         */
        static function alert_back($msg)
        {
            echo "<script language='javascript'>
                    <!--
                        alert('".$msg."');
                        history.back();
                    -->
                  </script>";
        }
?>
       
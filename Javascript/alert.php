<?php
// ----------------------------------------------------------------------------
// alert
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php

/**
         * Alert
         *
         * @param String $msg
         */
        static function alert($msg)
        {
            echo "<script language='javascript'>
                    <!--
                        alert('".$msg."');
                    -->
                  </script>";
        }
?>
              
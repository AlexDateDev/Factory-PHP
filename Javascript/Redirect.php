<?php
// ----------------------------------------------------------------------------
// Redirect
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
         * Redirect page
         *
         * @param String $page
         */
        static function location_redirect($sUrl)
        {
            echo "<script language='javascript'>
                    <!--
                        location.href='".$sUrl."';
                    -->
                  </script>";
        }
?>
              
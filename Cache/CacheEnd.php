<?php
// ----------------------------------------------------------------------------
// cache_end
//
// Date : 10/05/201
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------
?>


<?php
// Generamos el nuevo archivo cache
$fp = @fopen($cachefile, 'w');
// guardamos el contenido del buffer
@fwrite($fp, ob_get_contents());
@fclose($fp);
ob_end_flush();
?>
                       
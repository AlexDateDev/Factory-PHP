<?php
// ----------------------------------------------------------------------------
// cache_start
//
// Date : 10/05/2011
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------
?>


<?php
// Settings
$cachedir = $CONFIG_PATHPHP.'../cache/';   // directorio de cache
$cachetime = 86400;   // duración del cache (86400 => 1 dia)
$cacheext = 'cache';   // extensión de cache

// script a procesar
$cachepage = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$cachefile = $cachedir.md5($cachepage).'.'.$cacheext;
// calculamos el tiempo del cache
if (@file_exists($cachefile)) {
    $cachelast = @filemtime($cachefile);
}
else {
    $cachelast = 0;
}
@clearstatcache();
// Mostramos el archivo si aun no vence
if (time() - $cachetime <$cachelast) {
    @readfile($cachefile);
    exit();
}
ob_start();
?>                                           

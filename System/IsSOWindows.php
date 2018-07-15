<?php
/**    
 * Indica si el servidor es windows o no
 *
 * @return bool
 *
 * @version     3.0        => 19-06-2008
 */
function IsSOWindows()
{
    return (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN');
}


/**
 * tries to determine whether the Host machine is a Windows machine
 */
function is_windows() {
    static $is_windows = null;
    if (!isset($is_windows)) {
        $is_windows = strtoupper(substr(PHP_OS, 0, 3)) == 'WIN';
    }
    return $is_windows;
}

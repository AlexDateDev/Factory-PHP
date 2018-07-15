<?php

/**
 * Returns true if the application is being accessed on a touch screen interface ( like an iPad )
 */
function isTouchScreen()
{
    $ua = empty($_SERVER['HTTP_USER_AGENT']) ? "undefined" : strtolower($_SERVER['HTTP_USER_AGENT']);

    // first check if we have forced use of the touch enhanced interface
    if ( isset($_COOKIE['touchscreen']) && $_COOKIE['touchscreen'] == '1' ) {
        return true;
    }

    // next check if we should use the touch interface with our device
    if ( strpos($ua, 'ipad') !== false ) {
        return true;
    }

    return false;
}
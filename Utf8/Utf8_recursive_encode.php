<?php

/**
 * utf8_recursive_encode
 *
 * This function walks through an Array and recursively calls utf8_encode on the
 * values of each of the elements.
 *
 * @param $data Array of data to encode
 * @return utf8 encoded Array data
 */
function utf8_recursive_encode($data)
{
    $result = array();
    foreach($data as $key=>$val) {
        if(is_array($val)) {
           $result[$key] = utf8_recursive_encode($val);
        } else {
           $result[$key] = utf8_encode($val);
        }
    }
    return $result;
}
<?php

/**
 * Tests if $var can be accurately represented as an integer.  
 * If true, $var is modified to integer representation of $var.
 * 
 * @param mixed $var Value to test, passed by reference
 * @return boolean 
 */
function is_really_int(&$var)
{
    $num = (int) $var;
    if ($var == $num) {
        $var = $num;
        return true;
    }
    return false;
}

/**
 * Tests if $var can be accurately represented as an integer.
 * Note that boolean values return false, mimicking the behavior of is_int()
 * 
 * @param mixed $var Value to test
 * @return boolean 
 */
function valueCanBeInt($var)
{
    if (is_numeric($var) && $var == (int) $var) {
        return true;
    }

    return false;
}

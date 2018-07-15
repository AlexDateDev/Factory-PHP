
<?php

/**
 * Escapa un valor para que no se produzca SQL Injection, transforma ' y " a \' \"
 *
 * @param string | numeric $value
 * @return string
 */
function db_to_str_escape($value)
{
    // Stripslashes
    if (get_magic_quotes_gpc())
    {
        $value = stripslashes($value);
    }
    // Quote if not integer
    if (!is_numeric($value))
    {
        $value = mysql_real_escape_string($value);
    }
    return $value;
}

?>

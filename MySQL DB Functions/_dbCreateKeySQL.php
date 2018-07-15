
<?php
  
/**
 * Crea un string con las claves a crear
 *
 * @param string | array $fields
 * @return string
 */

function _create_key_sql($fields)
{
    $ret = array();
      foreach ($fields as $field)
      {
        if (is_array($field))
        {
              $ret[] = $field[0] .'('. $field[1] .')';
        }
        else
        {
              $ret[] = $field;
        }
      }
      return implode(', ', $ret);
}
?>



<?php

/**
 * Devuelve la versi�n del servidor. Ha
 *
 * @return string
 */
function db_get_version($hDB)
{
  list($version) = explode('-', mysql_get_server_info($hDB));
  return $version;
}
?>

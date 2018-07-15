
<?php
/**
     * Elimina una clave unica
     *
     * @param string $sTable
     * @param string $sName
     */
    static function unique_key_drop($sTable, $sName,$hDB)
    {
          $sql = 'ALTER TABLE {'. $sTable .'} DROP KEY '. $sName;
        $result = mysql_query( $sql, $hDB);
        if( !$result )
        {
            self::throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sql.']] ' );
        }
        return $result;
    }
?>
<?php

    /**
     * Inserta una clave única
     *
     * @param string $sTable
     * @param string $sName
     * @param string | array $asFields
     */
    static function unique_key_add($sTable, $sName, $asFields,$hDB)
    {
          $sql = 'ALTER TABLE {'. $sTable .'} ADD UNIQUE KEY '. $sName .' ('. self::_create_key_sql($asFields) .')';
        $result = mysql_query( $sql, $hDB);
        if( !$result )
        {
            self::throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sql.']] ' );
        }
        return $result;
    }
?>
<?php
/**
     * Renombra una tabla
     *
     * @param string $sTable
     * @param string $sNewTableName
     */
    static function table_rename( $sTable, $sNewTableName, $hDB)
    {
          $sql = 'ALTER TABLE {'. $sTable .'} RENAME TO {'. $sNewTableName .'}';
        $result = mysql_query( $sql, $hDB);
        if( !$result )
        {
            self::throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sql.']] ' );
        }
        return $result;
    }

?>
<?php
/**
     * Elimina una tabla
     *
     * @param string $sTable
     */
    static function table_drop($sTable,$hDB)
    {
          $sql = 'DROP TABLE {'. $sTable .'}';
        $result = mysql_query( $sql, $hDB);
        if( !$result )
        {
            self::throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sql.']] ' );
        }
        return $result;
    }
?>
<?php
/**
     * Elimina un campo de una tabla
     *
     * @param string $sTable
     * @param string $sField
     */
    static function field_drop($sTable, $sField,$hDB)
    {
          $sql = 'ALTER TABLE {'. $sTable .'} DROP '. $sField;
        $result = mysql_query( $sql, $hDB);
        if( !$result )
        {
            self::throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sql.']] ' );
        }
        return $result;
    }
?>
<?php
/**
     * Seleccionem una base de dades
     *
     * @param resource $rHandle
     * @param string $sDatabase
     */
    static function select_database( $hDB, $sDatabase )
    {
        if( @mysql_select_db( $sDatabase, $hDB) === false)
        {
            self::throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible seleccionar base de datos' );
        }
    }

?>
<?php
/**
     * Escapa un valor para que no se produzca SLQ Injection, transforma ' y " a \' \"
     *
     * @param string | numeric $value
     * @return string
     */
    function to_str_escape($value)
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
<?php
/**
     * Elimina una clave primaria
     *
     * @param string $sTable
     */
    static function primary_key_drop($sTable,$hDB)
    {
          $sql = update_sql('ALTER TABLE {'. $sTable .'} DROP PRIMARY KEY');
        $result = mysql_query( $sql, $hDB);
        if( !$result )
        {
            self::throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sql.']] ' );
        }
        return $result;
    }
?>
<?php
/**
     * Detecta si MYSQL esta instalado
     *
     * @return bool
     */
    static function is_available()
    {
          return function_exists('mysql_connect');
    }
?>
<?php
/**
     * Elimina un índide de una tabla
     *
     * @param string $sTable
     * @param string $sName
     */
    static function index_drop($sTable, $sName,$hDB)
    {
          $sql = 'ALTER TABLE {'. $sTable .'} DROP INDEX '. $sName;
        $result = mysql_query( $sql, $hDB);
        if( !$result )
        {
            self::throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sql.']] ' );
        }
        return $result;
    }
?>
<?php
/**
     * Crea un íncide en una tabla
     *
     * @param string $sTable
     * @param string $sName
     * @param string | array $asFields
     */
    static function index_add($sTable, $sName, $asFields,$hDB)
    {
          $sql = 'ALTER TABLE {'. $sTable .'} ADD INDEX '. $sName .' ('. self::_create_key_sql($asFields) .')';
        $result = mysql_query( $sql, $hDB);
        if( !$result )
        {
            self::throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sql.']] ' );
        }
        return $result;
    }
?>
<?php

    /**
    * Devuelve el número total de registros que devuelve una sentencia LINIT
    * La sentencia SELECT ha de icorporar el comando SQL_CALC_FOUND_ROWS
    */
    public function get_total_rows($hDB)
    {
        $result = mysql_query( 'SELECT FOUND_ROWS()', $hDB);
        if( !$result )
        {
            self::throw_exception( $hDB, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar fond_rows' );
        }
        list($nTotal) = mysql_fetch_row($result);
        return $nTotal;

    }
?>
<?php
/**
     * Devuelve la versión del servidor. Ha
     *
     * @return string
     */
    static function get_version($hDB)
    {
      list($version) = explode('-', mysql_get_server_info($hDB));
      return $version;
    }
?>

<?php

    /**
     * Devuelve el número de columna que contiene el resultado
     *
     * @param resource $rResource
     * @return int
     */
    static function columns_num( $rResource )
    {
        return  mysql_num_fields( $rResource );
    }

?>

<?php
/**
     * Devuelve el tipo de dato que contiene una columna
     * La primera columna es la 0
     *
     * @param resource $rResource
     * @return string
     */
    static function column_type( $rResource, $nColumn )
    {
        return  mysql_field_type( $rResource, $nColumn );
    }
?>

<?php
/**
     * Devuelve el tipo de dato que contiene una columna
     * La primera columna es la 0
     * @param resource $rResource
     * @return string
     */
    static function column_name( $rResource, $nColumn )
    {
        return  mysql_field_name( $rResource, $nColumn );
    }

?>
<?php
/**
     * Devuelve la longitud del dato dato que contiene una columna
     * La primera columna es la 0
     * @param resource $rResource
     * @return string
     */
    static function column_len( $rResource, $nColumn )
    {
        return  mysql_field_len( $rResource, $nColumn );
    }
?>
<?php
/**
     * Crea un string con las claves a crear
     *
     * @param string | array $fields
     * @return string
     */

    static private function _create_key_sql($fields)
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
<?php
/**
     * Devuelve el tipo de dato que contiene una columna
     * La primera columna es la 0
     * @param resource $rResource
     * @return string
     */
    static function column_flags( $rResource, $nColumn )
    {
        return  mysql_field_flags( $rResource, $nColumn );
    }
?>
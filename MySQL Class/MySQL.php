<?php
/**
* Connexió a una base de dades MySQL
*
* @author         Alexandre Solé i Faura
* @filesource    DB.class.php
*
* @version     3.6    => 01-02-2011
* @version     3.5    => 17-12-2009
*
*     function to_str_escape    ($value)
    function open            ( $sUrl, $bPersisten=false )
    function execute        ( $qry )
    function fetch_row        ( $rResource )
    function fetch_array    ( $rResource )
    function fetch_var        ( $rResource, $asFieldsToReturn='*' )
    function fetch_result    ( $rResource, $nRow=0 )
    function bind_array        ( $rResource,  $sFieldKey, $sFieldValue )
    function bind_array_obj    ( $rResource, $oObj)
    function result_close    ( $rResource )
    function num_rows        ( $rResource )
    function affected_rows    ( )
    function last_id        ( )
    function is_open        ( )
    function close            ( )
    function transaction_start        ( )
    function transaction_commit        ( )
    function transaction_rollback    ( )
    function get_handle()
*
*/

require_once( 'DB.class.php');

/** *****************************************
 *
 * Connexión con una base de datos MYSQL
 *
 ******************************************** */

class MYSQL implements DB
{
    /**
     * Handle de la connexión con la base de datos
     *
     * @var resource
     */
    protected $_hDb;

    /**
     * Constructor
     *
     */
    function __construct()
    {
    }

    /**
     * Devuelve el recurso
     *
     * @return resource
     */
    function get_handle()
    {
        return $this->_hDb;
    }
    /**
     * Abre la connexión con una base de datos
     *
     * @param string $sUrl
     * @param bool $bPersisten
     */
    function open( $sUrl, $bPersisten=false )
    {
        $url         = parse_url($sUrl);
        $_server     = $url['host'];
        $_login     = $url['user'];
        $_password     = $url['pass'];
        if( isset($url['port']))
        {
            $_server .= ':'.$url['port'];
        }
        if( isset($url['path']))
        {
            $_database = substr( $url['path'], 1, strlen($url['path'])-1);
        }
        if( strtolower($url['scheme'])!='mysql')
        {
            $this->throw_exception(null,  __CLASS__.'::'.__FUNCTION__. ' - la url de connexión no es de MySQL');
        }
        try
        {
            if($bPersisten)
            {
                $this->_hDb = mysql_pconnect( $_server,$_login,$_password, true, MYSQL_CLIENT_COMPRESS );
            }
            else
            {
                $this->_hDb = mysql_connect( $_server,$_login,$_password, true, MYSQL_CLIENT_COMPRESS );
            }
        }
        catch( Exception $e )
        {
            $this->throw_exception( null, __CLASS__.'::'.__FUNCTION__. ' - Fallo autenticación. Usuari o password incorrecta:'. $e->getMessage() );
        }

        // -- connexió oberta correctament
        if( ! $this->_hDb )
        {
            $this->throw_exception( null, __CLASS__.'::'.__FUNCTION__. ' - Impossible connectar amb el servidor' );
        }

        //  -- Seleccionem base de dades
        if( !mysql_select_db( $_database, $this->_hDb) )
        {
            $this->throw_exception( $this->_hDb, __CLASS__.'::'.__FUNCTION__. ' - 1 Impossible seleccionar base de dades: ' . $this->_database);
        }
    }

    /**
     * Ejecuta una sentencia SQL y devuelve el resultado
     *
     * @param string | object $qry
     * @return resource
     */
    function execute( $qry )
    {
        // -- Montem la query. Pot ser un objecte o un string SELECT
        if( is_object( $qry ))
        {
            if( in_array( 'get_query', get_class_methods( $qry ) ))
            {
                $sQuery = $qry->get_query();
            }
            else
            {
                $this->throw_exception( $this->_hDb, __CLASS__.'::'.__FUNCTION__. ' - Objeto sin función get_query' );
            }
        }
        else
        {
            $sQuery = $qry;
        }
        if( empty( $sQuery ))
        {
            $this->throw_exception( $this->_hDb, __CLASS__.'::'.__FUNCTION__. ' - No existeix consulta' );
        }

        $result = mysql_query( $sQuery, $this->_hDb );
        if( !$result )
        {
            $this->throw_exception( $this->_hDb, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sQuery.']] ' );
        }
        return $result;
    }

    /**
     * Retorna una array d'una consulta SQL on els indexs són les posicions de les columnes.
     *
     * @param resource $rResource
     * @return array
     */
    function fetch_row( $rResource )
    {
        return  mysql_fetch_row( $rResource );
    }

    /**
     * Retorna una array d'una consulta SQL on els indexs són els noms dels camps.
     *
     * @param resource $rResource
     * @return array
     */
    function fetch_array( $rResource )
    {
        return  mysql_fetch_array( $rResource, MYSQL_ASSOC );
    }

    /**
     * Devuelve un conjunto de variables de un registro
     *
     * @param resource $rResource
     * @param array | string $asField
     * @return list
     */
    function fetch_var( $rResource, $asFieldsToReturn='*' )
    {
        if( '*' == $asFieldsToReturn )
        {
            return mysql_fetch_row( $rResource );
        }
        else if( is_array($asFieldsToReturn))
        {
            // -- He de devolver un array formado con sólo las columnas a devolver
            $a = array();
            $rw = mysql_fetch_array( $rResource, MYSQL_ASSOC );
            foreach ($asFieldsToReturn as $sValue)
            {
                $a[] = $rw[$sValue];
            }
            return $a;
        }
        else
        {
            // -- He de devolver un array con un sólo la columna seleccionada
            $rw = mysql_fetch_array( $rResource, MYSQL_ASSOC );
            return $rw[$asFieldsToReturn];
        }
    }

    /**
     * Devuelve un único valor como resultado de un registro de una consulta
     *
     * @param resource $rResource
     * @param int $nRow
     * @return mixed
     */
    function fetch_result( $rResource, $nRow=0 )
    {
        return mysql_result($rResource, $nRow);
    }

    /**
     * Lanza una excepción
     *
     * @param resource $hDb
     * @param string $str
     */
    private function throw_exception( $hDb, $str )
    {
        $str_error = '';
        if(!empty($hDb))
        {
            $str_error = '<hr />'.mysql_errno($hDb ). ' - '. mysql_error($hDb);
        }
        throw new Exception( $str . $str_error);
    }

    /**
     * Devuelve un array con todo el recorrido del ResultSet
     * Cierra el resultado
     *
     * @param resource $rResource
     * @param string $sFieldKey | null    Nombre del campo del índice
     * @param string $sFieldValue        Nombre del campo del valor
     * @return array | array vacio
     */
    function bind_array( $rResource,  $sFieldKey, $sFieldValue)
    {
        // -- Puede que los valores contengan el nombre de la tablas
        if( STRING::is_in($sFieldKey,'.'))
        {
            $sFieldKey = STRING::get_right_str($sFieldKey,'.');
        }
        if( STRING::is_in($sFieldValue,'.'))
        {
            $sFieldValue = STRING::get_right_str($sFieldValue,'.');
        }
        $p = mysql_num_rows( $rResource );
        $a = array();
        // -- Si no hay clave, devuelvo un array con todos los valores
        // -- las claves son 0,1,2,3....
        if(empty($sFieldKey))
        {
            for( $n=$p; $n>0; $n-- )
            {
                $rw =  mysql_fetch_array( $rResource, MYSQL_ASSOC );
                $a[] = $rw[$sFieldValue];
            }
        }
        else
        {
            // -- Devuelvo un array con pares clave/valor
            for( $n=$p; $n>0; $n-- )
            {
                $rw =  mysql_fetch_array( $rResource , MYSQL_ASSOC );
                $a[$rw[$sFieldKey]] = $rw[$sFieldValue];
            }
        }
        mysql_free_result ( $rResource);
        return $a;
    }

    /**
     * Devuelve un array de objetos con todo el recorrido del ResultSet
     * Cierra el resultado
     *
     * @param resource $rResource
     * @param objectg $oObj objeto a crear para el array
     * @return array OBJECT | array vacio
     */
    function bind_array_obj( $rResource, $oObj)
    {
        $p = mysql_num_rows( $rResource );
        $o = array();
        $sObj = get_class($oObj);
        for( $n=$p; $n>0; $n-- )
        {
            $o[] = new $sObj( mysql_fetch_array( $rResource, MYSQL_ASSOC ));
        }
        mysql_free_result ( $rResource);
        return $o;
    }

    /**
     * Tanquem el resultat d'una consulta sql
     *
     * @param resource $rResource
     */
    function result_close( $rResource )
    {
        if( is_resource($rResource))
        {
            mysql_free_result ( $rResource);
        }
    }

    /**
     * Retorna el número de files del resultat d'una consulta
     *
     * @param resource $rResource
     * @return int
     */
    function num_rows( $rResource )
    {
        if( !is_resource($rResource))
        {
            return 0;
        }
        $ret = mysql_num_rows( $rResource );
        if( false === $ret )
        {
            $this->throw_exception( null, __CLASS__.'::'.__FUNCTION__. ' - Impossible retornar el número de files' );
        }
        return $ret;
    }

    /**
     * Retorna el número de files que s'han modificat en l'última execució sql
     *
     * @return int
     */
    function affected_rows( )
    {
        return  mysql_affected_rows($this->_hDb);
    }

    /**
     * Retorna l´ultim identificador autoincrment creat a la taula
     *
     * @return int
     */
    function last_id( )
    {
        return mysql_insert_id($this->_hDb);
    }

    /**
     * Indica si la base de dades esta oberta o no
     *
     * @return bool true si esta oberta o false si esta tancada
     */
    function is_open( )
    {
        return is_resource($this->_hDb);
    }

    /**
     * Tanquem la comunicació amb una base de dades.
     *
     */
    function close( )
    {
        if( is_resource($this->_hDb ))
        {
            if( ! mysql_close ($this->_hDb) )
            {
                $this->throw_exception( null, __CLASS__.'::'.__FUNCTION__. ' - Impossible tancar connexió' );
            }
        }
        $this->_hDb = null;
    }

    /**
     * Iniciem una transacció
     *
     */
    function transaction_start( )
    {
        if( !mysql_query( 'START TRANSACTION', $this->_hDb ))
        {
            $this->throw_exception( $this->_hDb, __CLASS__.'::'.__FUNCTION__ );
        }
    }

    /**
     * Tanquem correctement una transacció
     *
     */
    function transaction_commit( )
    {
        if( !mysql_query( 'COMMIT', $this->_hDb ))
        {
            $this->throw_exception( $this->_hDb, __CLASS__.'::'.__FUNCTION__ );
        }

    }

    /**
     * Cancel·lem una transaccio en curs
     *
     */
    function transaction_rollback( )
    {
        if( !mysql_query( 'ROLLBACK', $this->_hDb ))
        {
            $this->throw_exception( $this->_hDb, __CLASS__.'::'.__FUNCTION__ );
        }
    }


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

}

?>

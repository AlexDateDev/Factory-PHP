                    
<?php
/**
* Connexió a una base de dades SQL SERVER
*
* @author         Alexandre Solé i Faura
* @filesource    DB.class.php
*
* @version     3.5    => 17-12-2009
*
    function open            ( $sUrl, $bPersisten=false )
    function execute        ( $qry )
    function fetch_var        ( $rResource, $asFieldsToReturn='*' )
    function fetch_array    ( $rResource )
    function fetch_row        ( $rResource )
    function fetch_result    ( $rResource, $nRow=0 )
    function bind_array        ( $rResource, $sFieldKey, $sFieldValue )
    function bind_array_obj    ( $rResource, $oObj )
    function result_close    ( $rResource )
    function num_rows        ( $rResource )
    function affected_rows    ( )
    function last_id        ( )
    function close            ( )
    function is_open        ( )
    function transaction_start        ( )
    function transaction_commit        ( )
    function transaction_rollback        ( )
*
*/

require_once( 'DB.class.php');


/** *****************************************
 *
 * Connexión con una base de datos SQL SERVER
 *
 ******************************************** */

class MSSQL implements DB
{
    /**
     * Handle de la connexión con la base de datos
     *
     * @var resource
     */
    private $_hDb;

    /**
     * Constructor
     *
     */
    function __construct()
    {
    }

    /**
     * Abre la connexión con una base de datos
     *
     * @param string $sUrl
     * @param bool $bPersisten
     */
    function open( $sUrl, $bPersisten=false )
    {
        $url = parse_url($sUrl);
        $_server = $url['host'];
        $_login = $url['user'];
        $_password = $url['pass'];
        if( isset($url['port']))
        {
            $_server .= ':'.$url['port'];
        }
        if( isset($url['path']))
        {
            $_database = substr( $url['path'], 1, strlen($url['path'])-1);
        }
        if( strtolower($url['scheme'])!='sqlsrv')
        {
            $this->throw_exception(null,  __CLASS__.'::'.__FUNCTION__. ' - la url de connexión no es de SQL Server');
        }
        try
        {
            if($bPersisten)
            {
                $this->_hDb = mssql_pconnect( $_server,$_login,$_password );
            }
            else
            {
                $this->_hDb = mssql_connect( $_server,$_login,$_password );
            }
        }
        catch( Exception $e )
        {
            $this->throw_exception( null, __CLASS__.'::'.__FUNCTION__. ' - Fallo autenticación. Usuari o password incorrecta:'. $e->getMessage() );
        }

        // -- connexió oberta correctament
        if( !$this->_hDb )
        {
            $this->throw_exception( null, __CLASS__.'::'.__FUNCTION__. ' - Impossible connectar amb el servidor' );
        }

        //  -- Seleccionem base de dades
        if( !mssql_select_db( $_database, $this->_hDb ) )
        {
            $this->throw_exception( $this->_hDb, __CLASS__.'::'.__FUNCTION__. ' - 1 Impossible seleccionar base de dades: ' . $this->_database);
        }
        return $this->_hDb;
    }

    /**
     * Llança una exepció database amb un text determinat
     *
     * @param string $str
     */
    function throw_exception( $hDb, $str )
    {
        $str_error = '';
        if(!empty($hDb))
        {
            $str_error = '<hr />'.mssql_get_last_message();
        }
        throw new Exception( $str . $str_error);
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
        $result = mssql_query( $sQuery, $this->_hDb );
        if( !$result )
        {
            $this->throw_exception( $this->_hDb, __CLASS__.'::'.__FUNCTION__. ' - Impossible executar consulta [['.$sQuery.']] ' );
        }
        return $result;
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
            return mssql_fetch_row( $rResource );
        }
        else if( is_array($asFieldsToReturn))
        {
            // -- He de devolver un array formado con sólo las columnas a devolver
            $a = array();
            $rw = mssql_fetch_array( $rResource, MSSQL_ASSOC );
            foreach ($asFieldsToReturn as $sValue)
            {
                $a[] = $rw[$sValue];
            }
            return $a;
        }
        else
        {
            // -- He de devolver un array con un sólo la columna seleccionada
            $rw = mssql_fetch_array( $rResource, MSSQL_ASSOC );
            return $rw[$asFieldsToReturn];
        }
    }

    /**
     * Retorna una array d'una consulta SQL on els indexs són els noms dels camps.
     *
     * @param resource $rResource
     * @return array
     */
    function fetch_array( $rResource )
    {
        return  mssql_fetch_array( $rResource, MSSQL_ASSOC );
    }

    /**
     * Retorna una array d'una consulta SQL on els indexs són les posicions de les columnes.
     *
     * @param resource $rResource
     * @return array
     */
    function fetch_row( $rResource )
    {
        return  mssql_fetch_row( $rResource );
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
        return mssql_result($rResource, $nRow);
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
    function bind_array( $rResource, $sFieldKey, $sFieldValue)
    {
        $p = mssql_num_rows( $rResource );
        $a = array();
        // -- Si no hay clave, devuelvo un array con todos los valores
        // -- las claves son 0,1,2,3....
        if(empty($sFieldKey))
        {
            for( $n=$p; $n>0; $n-- )
            {
                $rw =  mssql_fetch_array( $rResource, MSSQL_ASSOC );
                $a[] = $rw[$sFieldValue];
            }
        }
        else
        {
            // -- Devuelvo un array con pares clave/valor
            for( $n=$p; $n>0; $n-- )
            {
                $rw =  mssql_fetch_array( $rResource, MSSQL_ASSOC );
                $a[$rw[$sFieldKey]] = $rw[$sFieldValue];
            }
        }
        mssql_free_result ( $rResource);
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
        $p = mssql_num_rows( $rResource );
        $o = array();
        $sObj = get_class($oObj);
        for( $n=$p; $n>0; $n-- )
        {
            $o[] = new $sObj( mssql_fetch_array( $rResource, MSSQL_ASSOC ));
        }
        mssql_free_result ( $rResource);
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
            mssql_free_result ( $rResource);
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
        $ret = mssql_num_rows( $rResource );
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
        return  mssql_rows_affected($this->_hDb);
    }

    /**
     * Retorna l´ultim identificador autoincrment creat a la taula
     *
     * @return int
     */
    function last_id( )
    {
        $query="SELECT @@IDENTITY as LAST_INSERT_ID";
        $rs = mssql_query($query, $this->_hDb);
        $r = mssql_fetch_assoc($rs);
        return $r['LAST_INSERT_ID'];
    }

    /**
     * Tanquem la comunicació amb una base de dades.
     *
     */
    function close( )
    {
        if( is_resource($this->_hDb ))
        {
            if( ! mssql_close ($this->_hDb) )
            {
                $this->throw_exception( null, __CLASS__.'::'.__FUNCTION__. ' - Impossible tancar connexió' );
            }
        }
        $this->_hDb = null;
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
     * Iniciem una transacció
     *
     */
    function transaction_start( )
    {
        if( !mssql_query( 'BEGIN TRAN', $this->_hDb ))
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
        if( !mssql_query( 'COMMIT TRAN',  $this->_hDb  ))
        {
            $this->throw_exception(  $this->_hDb , __CLASS__.'::'.__FUNCTION__ );
        }
    }

    /**
     * Cancel·lem una transaccio en curs
     *
     */
    function transaction_rollback( )
    {
        if( !mssql_query( 'ROLLBACK TRAN', $this->_hDb   ))
        {
            $this->throw_exception( $this->_hDb  , __CLASS__.'::'.__FUNCTION__ );
        }
    }
}
?>

?>

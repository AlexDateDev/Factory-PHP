

<?php

/**
 * Connexió amb una base de dades
 *
 * @param string $sUrl
 * @return resource
 */
function db_open( $sUrl, $bPersisten=false )
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
    if( strtolower($url['scheme'])!='mysql')
    {
        db_throw_exception(null,  __CLASS__.'::'.__FUNCTION__. ' - la url de connexión no es de MySQL');
    }
//    alert($_server);
//    alert($_login);
//    alert($_password);
    try
    {
        if(!$bPersisten)
        {
            $hDb = mysql_connect( $_server,$_login,$_password, true, MYSQL_CLIENT_COMPRESS );
        }
        else
        {
            $hDb = mysql_pconnect( $_server,$_login,$_password, true, MYSQL_CLIENT_COMPRESS );
        }
    }
    catch( Exception $e )
    {
        db_throw_exception( null, __CLASS__.'::'.__FUNCTION__. ' - Fallo autenticación. Usuari o password incorrecta:'. $e->getMessage() );
    }

    // -- connexió oberta correctament
    if( !$hDb )
    {
        db_throw_exception( null, __CLASS__.'::'.__FUNCTION__. ' - Impossible connectar amb el servidor' );
    }


    //  -- Seleccionem base de dades
    if( !mysql_select_db( $_database, $hDb ) )
    {
        db_throw_exception( $hDb, __CLASS__.'::'.__FUNCTION__. ' - 1 Impossible seleccionar base de dades: ' . $this->_database);
    }
    return $hDb;
}
?>

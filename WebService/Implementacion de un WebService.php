<?php
// ----------------------------------------------------------------------------
// Implementacion de un WebService
//
// Date : 10/05/2011
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------


// Implementacion de una clase Web Service para descargar contenido de otros servidores

class WebService{

    private $_aOptions;

    /**
     * Constructor del WebServices
     *
     * @param string $sMethod: Metode utilitzar en la comunicaio: POS, GET
     * @param string $sContentType: Tipus de dades a descarregar: (defecte: text/josn)
     * @param string $sCharset: (defecte: utf-8)
     */
    function __construct( $sMethod='GET', $sContentType='text/json', $sCharset='utf-8' ){
        $this->_aOptions = array( 'http'=>array(
            'method'=>$sMethod,
            'header'=>'Content-Type: '.$sContentType.'; charset='.$sCharset));
    }

    /**
     * Retorna el contingut d'una adreca web
     *
     * @param string $sUrlWebService:
     * @return false si falla o les dades si ha anat be
     */
    function getContents( $sUrlWebService ){
        try{
            $stmContext = stream_context_create($this->_aOptions);
            return file_get_contents($sUrlWebService, false, $stmContext);
        }
        catch( Exception $e){
            return false;
        }
    }
}

/**
* Url de conexio del servidor per descarregar dades
*/

abstract class UrlWebServices            
{
    const URL_MEMBRES = 'http://gandalf.fcee.urv.es/departaments/economia/serveis/dadesMembre?codi=';
    const URL_PUBLICACIONS = 'http://gandalf.fcee.urv.es/departaments/economia/serveis/publicacionsMembre?codi=';
    const URL_PROJECTES = 'http://gandalf.fcee.urv.es/departaments/economia/serveis/projectesMembre?codi=';
}

/**
* Clase que utilitzara el web service
*/

class Membre extends WebService{

    // -- Url de conexio
    const URL_WEB_SERVICE_PUBLICACIONS = UrlWebServices::URL_PUBLICACIONS;

    function __construct( ... ){
        // -- Inicialitzem el webservice
        parent::__construct();
    }

    function getWebServicesPublicacions( ){
        if( empty($this->_id)){
            return false;
        }

        // -- Conectem
        $json = parent::getContents(self::URL_WEB_SERVICE_PUBLICACIONS.$this->_id);
        if( !$json ){
            return false;
        }

        // -- Ho passem a un array
        $this->_aPublicacions = json_decode($json,true);
        return true;

    }
}

/**
* Utilitzacio
*/                        
$oMembre = new Membre( ... );

// -- Obtenim les dades del perfil
if( $oMembre->getWebServicesPublicacions()){
    // -- Publicacions descarregades
}



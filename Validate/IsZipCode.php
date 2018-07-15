
<?php
/**
 * Indica si es un código postal válido
 *
 * @param unknown_type $sCP
 * @return unknown
 */
static function is_codigo_postal( $sCP )
{
    $sCP = trim($sCP);
    $bOk = ( eregi( "^[0-9]+$", $sCP ) && strlen($sCP) == 5 );
    $nIdProvincia = intval(substr( $sCP,0,2));
    return ( $nIdProvincia >= 1 && $nIdProvincia <= 52 && $bOk);
    /*
    switch( $sProvincia )
    {
        case '01': // -- Álava
        case '02': // -- Albacete
        case '03': // -- Alicante
        case '04': // -- Almería
        case '05': // -- Ávila
        case '06': // -- Badajoz
        case '07': // -- Illes Balears
        case '08': // -- Barcelona
        case '09': // -- Burgos
        case '10': // -- Cáceres
        case '11': // -- Cádiz
        case '12': // -- Castellón
        case '13': // -- Ciudad Real
        case '14': // -- Córdoba
        case '15': // -- Coruña
        case '16': // -- Cuenca
        case '17': // -- Girona
        case '18': // -- Granada
        case '19': // -- Guadalajara
        case '20': // -- Guipuzcoa
        case '21': // -- Huelva
        case '22': // -- Huesca
        case '23': // -- Jaén
        case '24': // -- León
        case '25': // -- Lleida
        case '26': // -- La Rioja
        case '27': // -- Lugo
        case '28': // -- Madrid
        case '29': // -- Málaga
        case '30': // -- Murcia
        case '31': // -- Navarra
        case '32': // -- Ourense
        case '33': // -- Asturias
        case '34': // -- Palencia
        case '35': // -- Las Palmas
        case '36': // -- Pontevedra
        case '37': // -- Salamanca
        case '38': // -- S.C. Tenerife
        case '39': // -- Cantabria
        case '40': // -- Segovia
        case '41': // -- Sevilla
        case '42': // -- Soria
        case '43': // -- Tarragona
        case '44': // -- Teruel
        case '45': // -- Toledo
        case '46': // -- Valencia
        case '47': // -- Valladolid
        case '48': // -- Vizcaya
        case '49': // -- Zamora
        case '50': // -- Zaragoza
        case '51': // -- Ceuta
        case '52': // -- Melilla
        case 'AD': // -- Andorra
    }*/
}
?>         
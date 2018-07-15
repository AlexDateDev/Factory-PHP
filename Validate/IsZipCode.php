
<?php
/**
 * Indica si es un c�digo postal v�lido
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
        case '01': // -- �lava
        case '02': // -- Albacete
        case '03': // -- Alicante
        case '04': // -- Almer�a
        case '05': // -- �vila
        case '06': // -- Badajoz
        case '07': // -- Illes Balears
        case '08': // -- Barcelona
        case '09': // -- Burgos
        case '10': // -- C�ceres
        case '11': // -- C�diz
        case '12': // -- Castell�n
        case '13': // -- Ciudad Real
        case '14': // -- C�rdoba
        case '15': // -- Coru�a
        case '16': // -- Cuenca
        case '17': // -- Girona
        case '18': // -- Granada
        case '19': // -- Guadalajara
        case '20': // -- Guipuzcoa
        case '21': // -- Huelva
        case '22': // -- Huesca
        case '23': // -- Ja�n
        case '24': // -- Le�n
        case '25': // -- Lleida
        case '26': // -- La Rioja
        case '27': // -- Lugo
        case '28': // -- Madrid
        case '29': // -- M�laga
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
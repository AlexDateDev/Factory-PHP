
<?php
/**
 * Número de telefono fijo
 *
 * @param string $sPhone
 * @return bool
 */
static function is_phone_fix( $sPhone9 )
{
    $sPhone9 = trim($sPhone9);
    $bOk = ( eregi( "^[0-9]+$", $sPhone9 ) && strlen(trim($sPhone9)) == 9 );
    $nIdCodigo = intval(substr( $sPhone9,0,2));
    switch( $nIdCodigo )
    {
        case 91: // -- Madrid        91
        case 93: // -- Barcelona    93
        case 94: // -- Vizcaya        94
        case 95: // -- Sevilla        95
        case 96: // -- Alicante        96
        case 98: // -- Asturias        98
            $nIdProvincia2Ok = true;
            break;
        default:
            $nIdProvincia2Ok = false;
            break;
    }
    $nIdCodigo = intval(substr( $sPhone9,0,3));
    switch( $nIdCodigo )
    {
        case 923: // -- Salamanca    923
        case 973: // -- Lleida        973
        case 921: // -- Segovia        921
        case 926: // -- Ciudad Real    926
        case 975: // -- Soria        975
        case 977: // -- Tarragona    977
        case 920: // -- Avila        920
        case 922: // -- Tenerife    922
        case 924: // -- Badajoz        924
        case 972: // -- Girona        972
        case 978: // -- Teruel        978
        case 971: // -- Baleares    971
        case 925: // -- Toledo        925
        case 979: // -- Palencia    979
        case 927: // -- Cáceres        927
        case 928: // -- Palmas, Las    928
        case 974: // -- Huesca        974
        case 976: // -- Zaragoza    976
            $nIdProvincia3Ok = true;
            break;
        default:
            $nIdProvincia3Ok = false;
            break;
    }
    return ( ($nIdProvincia2Ok || $nIdProvincia3Ok) && $bOk);

    /**
Alava        945    Castellón    964    León        987    Salamanca    923
Albacete    967    Ceuta        956    Lleida        973    Segovia        921
Alicante    96    Ciudad Real    926    Lugo        982    Sevilla        95
Almería        950    Córdoba        957    Madrid        91    Soria        975
Asturias    98    Coruña, La    981    Málaga        95    Tarragona    977
Avila        920    Cuenca        969    Melilla        95    Tenerife    922
Badajoz        924    Girona        972    Murcia        968    Teruel        978
Baleares    971    Granada        958    Navarra        948    Toledo        925
Barcelona    93    Guadalajara    949    Orense        988    Valencia    96
Burgos        947    Guipúzcoa    943    Palencia    979    Valladolid    983
Cáceres        927    Huelva        959    Palmas, Las    928    Vizcaya        94
Cádiz        956    Huesca        974    Pontevedra    986    Zamora        980
Cantabria    942    Jaén        953    Rioja, La    941    Zaragoza    976
     */
}
?>

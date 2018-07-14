<?php
// ----------------------------------------------------------------------------
// Importar datos XML to MsAccess
//
// Date : 10/05/2012
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------
?>


<?php
/**
 * Importació de noticies XML de periodistes
 *
 * Nota: Ha d'haber un DSN d'Usuari aomonat "noticies_xml_periodistes" que apunti a la base de dades Access
 * La base de dades no te user/pass
 */

try
{
    $archivos = array( 'personatges.xml', 'institucional.xml', 'catalunya.xml' );
    foreach ( $archivos as $archivo)
    {
        importar_archivo( $archivo);
    }

}

catch( Exception $e)                      
{
    echo 'Error: '. $e->getMessage();
}


function importar_archivo($archivo)
{
    if (file_exists($archivo)) {

    // Cuidado. Los XML contienen un caracter que hace que el XML este mal formateado.
    // Eliminar el caracter hasta que simplexml_load_file no de errores
    $noticias = simplexml_load_file($archivo);
    $n = 0;
      if($noticias)
      {
        $hDb = odbc_pconnect( 'noticies_xml_periodistes','','',SQL_CUR_USE_ODBC );

          foreach( $noticias as $articulo )
          {
              $n++;
              $att = $articulo->attributes();
              $_id = "" . $att->id;

              $head = $articulo->head;

              $_author = toIso( "" . $head->Author );
              $_description  = toIso( "" . $head->Description );
              $_date = toIso( "" . $head->DREDATE );
              list($any,$mes,$dia) = split('/', $_date);
            $_date = $dia.'/'.$mes.'/'.$any;
            $_edition = toIso( "" . $head->Edition );
            $_newspaper= toIso( "" . $head->Newspaper );
            $_page= toIso( "" . $head->Page );
            $_section= toIso( "" . $head->Section );
            $_subtitle= toIso( "" . $head->Subtitle );
            $_title= toIso( "" . $head->Title );

            $body = $articulo->body;

              $_content= toIso("". $body->DRECONTENT);
            $sql = "INSERT INTO noticies_xml ( [articulo_id],[date],[newspaper],[edition],[section],[title],[subtitle],[author],[page],[description],[content])";
            $sql .= " VALUES ( '$_id','$_date','$_newspaper','$_edition','$_section','$_title','$_subtitle','$_author','$_page','$_description','$_content')";
            odbc_exec($hDb, $sql);
          }
        odbc_close($hDb);
    }
      else
      {
          echo "Sintaxi XML inválida";
      }
}
    echo 'Total: ' .$archivo . '= ' .$n;
}

function toIso( $s )
{
    // Se eliminan los ' porque ADO transforma los \' a ' y la sentencia insert falla
    return utf8_decode(addslashes(str_replace( array( "'"), ' ', ("". $s))));
}
?>

Formnato XML


<?xml version="1.0" encoding="utf-8"?>
<documento>
  <articulo id="EPT200901281029">
    <head>
      <DREDATE>2009/01/28</DREDATE>
      <Newspaper>Diari El Punt</Newspaper>
      <Edition><![CDATA[Barcelona]]></Edition>
      <Section><![CDATA[OPINION Vista]]></Section>
      <Title><![CDATA[El periodista homA?fob]]></Title>
      <Subtitle><![CDATA[]]></Subtitle>
      <Author><![CDATA[la galeria]]></Author>
      <Page>B015</Page>
      <Photo><![CDATA[]]></Photo>
      <Description><![CDATA[]]></Description>
      <Fields/>
      <PDF><![CDATA[http://pdfsrv.mynewsonline.com/C1104011/EPT200901281029B015/3d6aeddac906073014b4dd38bac01e4f60f825f3]]></PDF>
    </head>
    <body>
      <DRECONTENT><![CDATA[<p></p>
<p></p>
<p></p>
<p></p>
<p>la galeria|jordi duran</p>
<p>El periodista homA?fob</p>
<p>La DemarcaciAl del ColÂ·legi de Periodistes a les Terres de l'Ebre va retre divendres un homenatge a la trajectA?ria professional de quatre periodistes ebrencs veterans, entre els quals, Daniel Arasa (JesAss-Tortosa, 1944). El currA­culum d'Arasa no A©s poca cosa: ha estat corresponsal internacional i cap de redacciAl d'Europa Press, escriu a La Vanguardia, A©s assagista i ha publicat diversos llibres de gruix histA?ric. PerA? es veu que aquest senyor A©s un homA?fob, o almenys aquesta A©s l'opiniAl de l'AssociaciAl per la Igualtat de Gais i Lesbianes, organitzaciAl que mesos enrere va distingir-lo amb el guardAl Un Riu d'OpressiAl, per les seues opinions sobre la famA­lia i el matrimoni d'homosexuals. En definitiva, que l'associaciAl esmentada no s'explica com el ColÂ·legi de Periodistes a les Terres de l'Ebre ha pogut donar una placa a un personatge que Â«no respecta els drets humansÂ». En fi, vivim en un paA­s lliure i tothom pot dir la seua, perA?, sincerament, trobo que voler barrejar una cosa i l'altra A©s pixar fora de test. Em sembla tan absurd com que els antitaurins ?persones molt respectables, per cert? qALestionessin un premi a la trajectA?ria musical de Joan Manuel Serrat pel fet que li agraden els bous i Â«no respecta els drets dels animalsÂ». O que els defensors de la famA­lia i la tradiciAl, dels quals Arasa A©s un lA­der, impugnessin un premi cinematogrA fic a AlmodAlvar per la seua opciAl sexual i perquA¨ Â«no respecta no sA© quA¨Â». Com deia aquell que no existeix: qui estigui lliure de pecat...</p>
]]></DRECONTENT>
    </body>
  </articulo>
  <articulo id="EPT200901281068">
    <head>
      <DREDATE>2009/01/28</DREDATE>
      <Newspaper>Diari El Punt</Newspaper>
      <Edition><![CDATA[Barcelona]]></Edition>
      <Section><![CDATA[SOCIEDAD ComunicaciAl]]></Section>
      <Title><![CDATA[ La Malla, la COM i ...]]></Title>
      <Subtitle><![CDATA[]]></Subtitle>
      <Author><![CDATA[]]></Author>
      <Page>B037</Page>
      <Photo><![CDATA[]]></Photo>
      <Description><![CDATA[]]></Description>
      <Fields/>
      <PDF><![CDATA[http://pdfsrv.mynewsonline.com/C1104011/EPT200901281068B037/c43ca587944137043dc876288c50437576591550]]></PDF>
    </head>
    <body>
      <DRECONTENT><![CDATA[<p></p>
<p></p>
<p></p>
<p></p>
<p>La Malla, la COM i la XTVL llancen Â«EuropeusÂ»</p>
<p>Barcelona. Lamalla.cat, COM RA dio i la XTVL posen en marxa aquesta setmana Europeus, un projecte multimA¨dia que tA© com a objectiu difondre les activitats que duen a terme a Catalunya institucions de diferents paAZsos de la UE. La iniciativa va arrencar ahir a Lamalla.cat, on s'ha creat un portal sobre el tema, i tambA© a la COM amb un espai en el magazA­n de tarda el punt</p>
<p>Polemica perquA¨ la BBC no emet un espot sobre Gaza</p>
<p>Londres. La BBC afronta des de dilluns una allau de crA­tiques per la seva decisiAl de no emetre un espot de les principals ONG del paA­s, una crida d'ajuda humanitA ria a Gaza, amb l'argument que no volia comprometre la seva imparcialitat. L'ens ja ha rebut mA©s de 15.000 queixes dels ciutadans i 50 diputats li han demanat que canviAZ d'opiniAl. efe</p>
<p>El Grup Barnils critica el CPC pel premi a SentA­s</p>
<p>Barcelona. El Grup de Periodistes Ramon Barnils va emetre ahir un comunicat en quA¨ creu Â«inacceptableÂ» que el ColÂ·legi de Periodistes Â«participi en la glorificaciAl del periodista franquista Carlos SentA­sÂ», que dilluns va rebre la medalla al mA¨rit del treball, atorgada pel Ministeri espanyol de Treball, a la seu del CPC. el punt</p>
]]></DRECONTENT>
    </body>
  </articulo>
</documento>


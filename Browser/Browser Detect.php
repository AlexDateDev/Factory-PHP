<?php
// ----------------------------------------------------------------------------
// Broser Detect
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
* Browser
*
* @author         Alexandre Solé i Faura
* @filesource    BROWSER.class.php
*
* @version         3.1        => 27-10-2009
*
*/
if( !class_exists( 'BROWSER'))
{
    /**
     * Diferents sistemes operatius
     *
     * @author         Alexandre Solé i Faura
     * @version     1.0    -> Mon Jun 18 18:27:24 CEST 2007
     * @name        SO
     * @package     Utils
     */
    if( !class_exists( 'SYSTEM_OPERATING'))
    {
        abstract class SYSTEM_OPERATING
        {
            const WINDOWS     = 'win';
            const WINDOWSCE = 'WindowsCE';
            const MAC         = 'mac';
            const LINUX     = 'linux';
            const OS2         = 'OS/2';
            const BEOS      = 'BeOS';
        }
    }

    /**
     * Detecta el navegador utilitzat per l'usuari
     *
     * @author         Alexandre Solé i Faura
     * @copyright     BTCelular.com
     * @name        BROWSER
     * @package     Utils
     */

    class BROWSER
    {
        private $Name = null;
        private $Version = null;
        private $Platform = null;
        private $UserAgent = null;
        private $AOL = false;

        const OPERA         = 'opera';
        const WEBTV            = 'webtv';
        const IE            = 'msie';
        const NETPOSITIVE    = 'NetPositive';
        const IEPOCKET        = 'mspie';
        const GALEON        = 'galeon';
        const KONQUEROR     = 'konqueror';
        const ICAB            = 'icab';
        const OMNIWEB        = 'omniweb';
        const PHOENIX         = 'Phoenix';
        const FIREBIRD         = 'firebird';
        const FIREFOX         = 'Firefox';
        const MOZILLA         = 'mozilla';
        const LYNX            = 'linxs';
        const AMAYA         = 'amaya';
        const SAFARI         = 'safari';
        const NETSCAPE         = 'netscape';
        const AOL             = 'AOL';
        const SEAMONKEY        = 'SeaMonkey';

        function __construct()
        {
            $agent = $_SERVER['HTTP_USER_AGENT'];
            $this->_isIe = null;
            $this->_isGecko= null;

            $bd['platform'] = null;
            $bd['browser'] = null;
            $bd['version'] = null;
            $this->UserAgent = $agent;

            if (eregi( SYSTEM_OPERATING::WINDOWS, $agent))
            {
                $bd['platform'] = SYSTEM_OPERATING::WINDOWS; //"Windows";
            }
            elseif (eregi(SYSTEM_OPERATING::MAC, $agent))
            {
                $bd['platform'] = SYSTEM_OPERATING::MAC; //"MacIntosh";
            }
            elseif (eregi(SYSTEM_OPERATING::LINUX, $agent))
            {
                $bd['platform'] = SYSTEM_OPERATING::LINUX; //"Linux";
            }
            elseif (eregi(SYSTEM_OPERATING::OS2, $agent))
            {
                $bd['platform'] = SYSTEM_OPERATING::OS2; //"OS/2";
            }
            elseif (eregi(SYSTEM_OPERATING::BEOS, $agent))
            {
                $bd['platform'] = SYSTEM_OPERATING::BEOS; //"BeOS";
            }

            // Opera
            if (eregi(BROWSER::OPERA,$agent))
            {
                $this->_isIe = true;
                $this->_isGecko= false;

                $val = stristr($agent, BROWSER::OPERA);
                if (eregi("/", $val))
                {
                    $val = explode("/",$val);
                    $bd['browser'] = $val[0];
                    $val = explode(" ",$val[1]);
                    $bd['version'] = $val[0];
                }
                else
                {
                    $val = explode(" ",stristr($val,BROWSER::OPERA));
                    $bd['browser'] = $val[0];
                    $bd['version'] = $val[1];
                }

            }
            // WebTV
            elseif(eregi(BROWSER::WEBTV,$agent))
            {
                $val = explode("/",stristr($agent,BROWSER::WEBTV));
                $bd['browser'] = $val[0];
                $bd['version'] = $val[1];
            }
            // Internet Explorer version 1
            elseif(eregi("microsoft internet explorer", $agent))
            {
                $this->_isIe = true;
                $this->_isGecko= false;

                $bd['browser'] = BROWSER::IE;
                $bd['version'] = "1.0";
                $var = stristr($agent, "/");
                if (ereg("308|425|426|474|0b1", $var))
                {
                    $bd['version'] = "1.5";
                }
            }
            // NetPositive
            elseif(eregi(BROWSER::NETPOSITIVE, $agent))
            {
                $val = explode("/",stristr($agent,BROWSER::NETPOSITIVE));
                $bd['platform'] = SYSTEM_OPERATING::BEOS ; //"BeOS";
                $bd['browser'] = $val[0];
                $bd['version'] = $val[1];
            }
            // Internet Explorer
            elseif(eregi(BROWSER::IE,$agent) && !eregi(BROWSER::OPERA,$agent))
            {
                $this->_isIe = true;
                $this->_isGecko= false;

                $val = explode(" ",stristr($agent,BROWSER::IE));
                $bd['browser'] = $val[0];
                $bd['version'] = $val[1];
            }
            // MS Pocket Internet Explorer
            elseif(eregi(BROWSER::IEPOCKET,$agent) || eregi('pocket', $agent))
            {
                $this->_isIe = true;
                $this->_isGecko= false;

                $val = explode(" ",stristr($agent,BROWSER::IEPOCKET));
                $bd['browser'] = BROWSER::IEPOCKET;
                $bd['platform'] = SYSTEM_OPERATING::WINDOWSCE ; //"WindowsCE";
                if (eregi(BROWSER::IEPOCKET, $agent))
                {
                    $bd['version'] = $val[1];
                }
                else
                {
                    $val = explode("/",$agent);
                    $bd['version'] = $val[1];
                }
            }
            // Galeon
            elseif(eregi(BROWSER::GALEON,$agent))
            {
                $this->_isIe = false;
                $this->_isGecko= true;

                $val = explode(" ",stristr($agent,BROWSER::GALEON));
                $val = explode("/",$val[0]);
                $bd['browser'] = $val[0];
                $bd['version'] = $val[1];
            }
            // Konqueror
            elseif(eregi(BROWSER::KONQUEROR,$agent))
            {
                $this->_isIe = false;
                $this->_isGecko= true;
                $val = explode(" ",stristr($agent,BROWSER::KONQUEROR));
                $val = explode("/",$val[0]);
                $bd['browser'] = $val[0];
                $bd['version'] = $val[1];
            }
            // iCab
            elseif(eregi(BROWSER::ICAB,$agent))
            {
                $val = explode(" ",stristr($agent,BROWSER::ICAB));
                $bd['browser'] = $val[0];
                $bd['version'] = $val[1];
            }
            // OmniWeb
            elseif(eregi(BROWSER::OMNIWEB,$agent))
            {
                $val = explode("/",stristr($agent,BROWSER::OMNIWEB));
                $bd['browser'] = $val[0];
                $bd['version'] = $val[1];
            }
            // Phoenix
            elseif(eregi(BROWSER::PHOENIX, $agent))
            {
                $bd['browser'] = BROWSER::PHOENIX;
                $val = explode("/", stristr($agent, BORSER::PHOENIX.'/'));
                $bd['version'] = $val[1];
            }
            // Firebird
            elseif(eregi(BROWSER::FIREBIRD, $agent))
            {
                $this->_isIe = false;
                $this->_isGecko= true;
                $bd['browser']=BROWSER::FIREBIRD;
                $val = stristr($agent, BROWSER::FIREBIRD);
                $val = explode("/",$val);
                $bd['version'] = $val[1];
            }
            // Firefox
            elseif(eregi(BROWSER::FIREFOX, $agent))
            {
                $this->_isIe = false;
                $this->_isGecko= true;
                $bd['browser']=BROWSER::FIREFOX;
                $val = stristr($agent, BROWSER::FIREFOX);
                $val = explode("/",$val);
                $bd['version'] = $val[1];
            }
            // SeaMonkey
            elseif(eregi(BROWSER::MOZILLA, $agent) && eregi(BROWSER::SEAMONKEY, $agent) )
            {
                $this->_isIe = false;
                $this->_isGecko= true;
                $bd['browser']=BROWSER::SEAMONKEY ;
                $val = stristr($agent, BROWSER::SEAMONKEY );
                $val = explode("/",$val);
                $bd['version'] = $val[1];
            }

            // Mozilla Alpha/Beta Versions
            elseif(eregi(BROWSER::MOZILLA,$agent) && eregi("rv:[0-9].[0-9][a-b]",$agent) && !eregi(BROWSER::NETSCAPE,$agent))
            {
                $this->_isIe = false;
                $this->_isGecko= true;
                $bd['browser'] = BROWSER::MOZILLA;
                $val = explode(" ",stristr($agent,"rv:"));
                eregi("rv:[0-9].[0-9][a-b]",$agent,$val);
                $bd['version'] = str_replace("rv:","",$val[0]);
            }
            // Mozilla Stable Versions
            elseif(eregi(BROWSER::MOZILLA,$agent) &&eregi('rv:[0-9]\.[0-9]',$agent) && !eregi(BROWSER::NETSCAPE,$agent))
            {
                $this->_isIe = false;
                $this->_isGecko= true;
                $bd['browser'] = BROWSER::MOZILLA;
                $val = explode(" ",stristr($agent,"rv:"));
                eregi('rv:[0-9]\.[0-9]\.[0-9]',$agent,$val);
                $bd['version'] = str_replace("rv:","",$val[0]);
            }
            // Lynx & Amaya
            elseif(eregi("libwww", $agent))
            {
                if (eregi(BROWSER::AMAYA, $agent))
                {
                    $val = explode("/",stristr($agent,BROWSER::AMAYA));
                    $bd['browser'] = BROWSER::AMAYA;
                    $val = explode(" ", $val[1]);
                    $bd['version'] = $val[0];
                }
                else
                {
                    $val = explode("/",$agent);
                    $bd['browser'] = BROWSER::LYNX;
                    $bd['version'] = $val[1];
                }
            }
            // Safari
            elseif(eregi(BROWSER::SAFARI, $agent))
            {
                $bd['browser'] = BROWSER::SAFARI;
                $bd['version'] = "";
            }
            // Netscape
            elseif(eregi(BROWSER::NETSCAPE,$agent))
            {
                $this->_isIe = false;
                $this->_isGecko= true;
                $val = explode(" ",stristr($agent,BROWSER::NETSCAPE));
                $val = explode("/",$val[0]);
                $bd['browser'] = $val[0];
                $bd['version'] = $val[1];
            }
            elseif(eregi(BROWSER::MOZILLA,$agent) && !eregi('rv:[0-9]\.[0-9]\.[0-9]',$agent))
            {
                $this->_isIe = false;
                $this->_isGecko= true;
                $val = explode(' ',stristr($agent,BROWSER::MOZILLA));
                $val = explode('/',$val[0]);
                $bd['browser'] = BROWSER::NETSCAPE;
                $bd['version'] = $val[1];
            }

            // Netejar possible bruticia al nom
            $bd['browser'] = ereg_replace("[^a-z,A-Z]", "", $bd['browser']);
            // Netejar possible bruticia a la versi&oacute;
            $bd['version'] = ereg_replace("[^0-9,.,a-z,A-Z]", "", $bd['version']);

            // AOL
            if (eregi(BROWSER::AOL, $agent))
            {
                $var = stristr($agent, BROWSER::AOL);
                $var = explode(" ", $var);
                $bd['aol'] = ereg_replace("[^0-9,.,a-z,A-Z]", "", $var[1]);
            }

            // Assignempropertats
            $this->Name = $bd['browser'];
            $this->Version = $bd['version'];
            $this->Platform = $bd['platform'];
            $this->AOL = $bd['aol'];
        }

        /**
         * Retorna el sistema operatiu
         *
         * @return string<br>
         *    <b>WINDOWS</b>     = 'win'<br>
         *     <b>WINDOWSCE</b>= 'WindowsCE'<br>
         *     <b>MAC</b>         = 'mac'<br>
         *     <b>LINUX</b>     = 'linux'<br>
         *     <b>OS2</b>         = 'OS/2'<br>
         *     <b>BEOS</b>      = 'BeOS'<br>
         */
        function get_system_operating()
        {
            return $this->Platform;
        }

        /**
         * Retorna el nom del navegador
         *
         * @return string
         *    OPERA<br>
         *     WEBTV<br>
         *     IE<br>
         *     NETPOSITIVE<br>
         *     IEPOCKET<br>
         *     GALEON<br>
         *     KONQUEROR<br>
         *     ICAB<br>
         *     OMNIWEB<br>
         *     PHOENIX<br>
         *     FIREBIRD<br>
         *     FIREFOX<br>
         *     MOZILLA<br>
         *     LYNX<br>
         *     AMAYA<br>
         *     SAFARI<br>
         *     NETSCAPE<br>
         *     AOL<br>
         *     SEAMONKEY<br>
         */
        function get_browser_name( )
        {
            return $this->Name;
        }
        /**
         * Retorna la versi&oacute; del navegador
         *
         * @return string
         */
        function get_browser_version( )
        {
            return $this->Version;
        }

        /**
         * Indica si el navegador es compatible amb Internet Explorer
         *
         * @return boolean
         */
        function is_iexplorer( )
        {
            return $this->_isIe;
        }

        /**
         * Indica si el navegador es compatible amb Mozilla/Gecko
         *
         * @return boolean
         */
        function is_gecko( )
        {
            return $this->_isGecko;
        }
    }
    $oBrowser = new BROWSER();
}
?>

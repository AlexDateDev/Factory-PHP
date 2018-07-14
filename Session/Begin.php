<?php
// ----------------------------------------------------------------------------
// Begin
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Inicia una sesion
 *
 * @version     3.0        => 24-06-2008
 */
static function begin()
{
    session_start();
    // -- Cargamos valores del portal
    // -- si no estan definidos se carga null pero no se pide login
//            if( isset($_SESSION[USUARIO::$sNombre]))
    {
        /*
        define( 'ACTUAL_ID_USUARIO',     self::read(USUARIO::$nIdUsuario));
        define( 'ACTUAL_USER_NAME',     self::read(USUARIO::$sNombre));
        //define( 'ACTUAL_ID_PERFIL',     self::read(PERFIL::$nIdPerfil));
        define( 'ACTUAL_ID_EMPRESA',     self::read('Empresa'));
        */
    }
}
        
function can_start_session(){
	if(!empty($_GET['PHPSESSID'])) {
	   return true;
	}
	$session_id = session_id();
	return empty($session_id) ? true : false;
}

?>
             
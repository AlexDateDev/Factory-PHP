<?php
/**
 * Comprueba la autenticación del usuario
 *
 * @param int $nIdUsuario
 * @param string $sNombreUsuario
 * @param string $sEmpresa
 */
function comprobar_ticket(&$nIdUsuario, &$sNombreUsuario, &$sEmpresa)
{
    $sTicket = SESSION::read('TICKET');
    if( is_null($sTicket))
    {
        SYSTEM::go_location( HTTP_LOGIN );
        // -- Finaliza
    }

    // -- Comprobación del ticket
    $sTicket = SYSTEM::decrypt_by_trasposicion($sTicket);
    list($mDateTime, $sNombreUsuario, $nIdUsuario, $sEmpresa, $sKey) = split('#',$sTicket);
    list($sToday,) = split(' ',$mDateTime);
    if( $sToday != date('d-m-Y'))
    {
        // -- Ticket incorrecto
        SYSTEM::go_location( HTTP_LOGIN );
    }
}
?>

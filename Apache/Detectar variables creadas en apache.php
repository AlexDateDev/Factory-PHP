<?php
// ----------------------------------------------------------------------------
//	Detectar variables de entorno credas desde Apache
// 	Fecha: 10/05/2015
// 	Alex Sol�
// ----------------------------------------------------------------------------


if( getenv('testserver') ){
    echo 'Servidor de desarrollo';
}
                    
?>
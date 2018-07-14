<?php

public function array_orderby()
{
    $args = func_get_args();
    $data = array_shift($args);
    foreach ($args as $n => $field) {
        if (is_string($field)) {
            $tmp = array();
            foreach ($data as $key => $row)
                $tmp[$key] = $row[$field];
            $args[$n] = $tmp;
            }
    }
    $args[] = &$data;
    call_user_func_array('array_multisort', $args);
    return array_pop($args);
}

switch($ordernarPor){
	case 'llamadas':
	case 'visitas':
	case 'emails':
		$tipo_ord = SORT_DESC;
		break;
	default:
		$tipo_ord = SORT_ASC|SORT_NATURAL|SORT_FLAG_CASE;
		break;
}
	
$this->_arrReports= $this->array_orderby($this->_arrReports, $ordernarPor, $tipo_ord );

//$arrReports= array_orderby($this->_arrReports, 'visitas', SORT_DESC,'llamadas', SORT_DESC );
//$arrReports= array_orderby($this->_arrReports, 'llamadas', SORT_DESC);
		
/*
Array
(
    [0] => Array
        (
            [cliente] => BARSAVIMA
            [asociacion] => ASOFRIO
            [estado] => CANDIDATO
            [comercial] => Roger Escobosa
            [visitas] => 0
            [llamadas] => 5
            [emails] => 0
            [cliid] => d4251ec1-1d72-2896-605b-55c33995b6cd
            [acid] => 626b079c-e7e6-8f6f-d9c1-55c338eb09ab
        )

    [1] => Array
        (
            [cliente] => DECOFR?O
            [asociacion] => ASOFRIO
            [estado] => CANDIDATO
            [comercial] => Roger Escobosa
            [visitas] => 0
            [llamadas] => 0
            [emails] => 1
            [cliid] => d42513ee-a68a-1555-6546-55c33665e939
            [acid] => 4ea16685-4f91-cc22-dd0a-55c33406fa2e
            [llamdas] => 1
        )

    [2] => Array
        (
            [cliente] => Grupo HM
            [asociacion] => Asofr?o
            [estado] => CANDIDATO
            [comercial] => N?ria Palac?n
            [visitas] => 1
            [llamadas] => 4
            [emails] => 2
            [cliid] => f329b20a-eeef-10a0-17e4-55c1e7f30deb
            [acid] => 56c2a30f-a897-60bc-0c6a-55c1dbd00647
        )

)
*/
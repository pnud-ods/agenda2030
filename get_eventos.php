<?php
include_once 'conectar.php';
$ano = $_REQUEST['ano'];
$mes = $_REQUEST['mes'];
$retorno = array();

//Busca os eventos no banco pela data de início
$sql = "select day(dat_inicio) as dia, e.dat_inicio, e.nom_evento from evento e
         where year(e.dat_inicio) = $ano
           and month(e.dat_inicio) = $mes
         order by e.dat_inicio";
$result = $conn->query($sql);

//Exibe as células vazias do começo do mês
$retorno['calendario'] = '';
$primeiro_dia_semana = date("w", strtotime("$ano/$mes/01") ) - 1;
for($i = 1; $i <= $primeiro_dia_semana; $i++){
    $retorno['calendario'] .= "<li></li>";
}

//Exibe os dias do mês consultado verificando se tem evento
$quant_dias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
$retorno['eventos'] = '';
$row = $result->fetch_assoc();
for($i = 1; $i <= $quant_dias; $i++){
    if($row['dia'] != $i){
        $retorno['calendario'] .= "<li>$i</li>";
    }
    else{
        $retorno['calendario'] .= "<li><span class=\"active\">$i</span></li>";
        while($row['dia'] == $i){
            $retorno['eventos'] .= '<div class="row" style="margin-top:50px;">';
            $retorno['eventos'] .= '<div class="col-xs-8 col-xs-offset-2 text-center">';
            $retorno['eventos'] .= '<span class="agenda-events-label">';
            $retorno['eventos'] .= $row['nom_evento'];
            $retorno['eventos'] .= '</span>';
            $retorno['eventos'] .= '<div class="border-botton-events-list"></div>';
            $retorno['eventos'] .= '</div>';
            $retorno['eventos'] .= '</div>';
            $row = $result->fetch_assoc();
        }
    }
}

//Retorna o ano e mês da consulta
$retorno['ano'] = $ano;
switch($mes){
    case 1:
        $retorno['mes'] = 'Janeiro';
        break;
    case 2:
        $retorno['mes'] = 'Fevereiro';
        break;
    case 3:
        $retorno['mes'] = 'Março';
        break;
    case 4:
        $retorno['mes'] = 'Abril';
        break;
    case 5:
        $retorno['mes'] = 'Maio';
        break;
    case 6:
        $retorno['mes'] = 'Junho';
        break;
    case 7:
        $retorno['mes'] = 'Julho';
        break;
    case 8:
        $retorno['mes'] = 'Agosto';
        break;
    case 9:
        $retorno['mes'] = 'Setembro';
        break;
    case 10:
        $retorno['mes'] = 'Outubro';
        break;
    case 11:
        $retorno['mes'] = 'Novembro';
        break;
    case 12:
        $retorno['mes'] = 'Dezembro';
        break;
    default:
        $retorno['mes'] = 'XXX';
}

$result->free();
die( json_encode($retorno, JSON_UNESCAPED_UNICODE) );


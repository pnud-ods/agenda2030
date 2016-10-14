<?php
include_once 'conectar.php';
$id_ind   = $_REQUEST['i_i'];
$ods      = $_REQUEST['o'];
$id_meta  = $_REQUEST['i_m'];
$num_meta = $_REQUEST['n_m'];
$array = array();
$array['estrutura']  = '<table style="width:100%;">';
$array['estrutura'] .= '<tbody>';
$array['estrutura'] .= '<tr style="border-top: 1px solid #cfcfcf;">';
$array['estrutura'] .= '<td style="font-size:16pt;padding:5px 10px;">';
$array['estrutura'] .= '<h3>';
$array['estrutura'] .= "<a title=\"Voltar para os Indicadores\" style=\"color:#333333;\" onclick=\"clickMeta(null, $ods, $id_meta, '$num_meta');\">";
$array['estrutura'] .= "<span class=\"glyphicon glyphicon-menu-left main_color_$ods\"></span> Voltar para os Indicadores da Meta $num_meta";
$array['estrutura'] .= '</a>';
$array['estrutura'] .= '</h3>';
$array['estrutura'] .= '</td>';
$array['estrutura'] .= '</tr>';
$array['estrutura'] .= '<tr style="border-top: 1px solid #cfcfcf;"><td>';
$sql = "select di.nom_indicador
          from $NAME_DW.dim_indicador di
         where di.seq_dim_indicador = $id_ind";
$result = $conn->query($sql);





$row = $result->fetch_assoc();
$array['estrutura'] .= "<div class=\"rot_indicador\">Indicador: {$row['nom_indicador']}</div>";
$array['estrutura'] .= '<div id="grafico"></div>';
$array['estrutura'] .= '<div id="tabela"></div>';
$array['estrutura'] .= '</td></tr>';
$array['estrutura'] .= '</tbody>';
$array['estrutura'] .= '</table>';

$sql = "select dt.num_ano,
               (select dte.nom_territorio_ptbr
                  from $NAME_DW.dim_territorio dte
                 where dte.seq_dim_territorio = dvi.seq_dim_territorio
               ) as dsc_territorio,
               (select dl.dsc_localidade
                  from $NAME_DW.dim_localidade dl
                 where dl.seq_dim_localidade = dvi.seq_dim_localidade
               ) as dsc_localidade,
               (select dgi.dsc_grupo_idade
                  from $NAME_DW.dim_grupo_idade dgi
                 where dgi.seq_dim_grupo_idade = dvi.seq_dim_grupo_idade
               ) as dsc_grupo_idade,
               dvi.ind_genero,
               dvi.vlr_indicador
          from $NAME_DW.dim_valor_indicador dvi, $NAME_DW.dim_tempo dt
         where dvi.seq_dim_indicador = '$id_ind'
           and dvi.seq_dim_tempo = dt.seq_dim_tempo
           and dt.num_ano >= 2001
         order by dvi.seq_dim_territorio desc, dsc_localidade, dsc_grupo_idade, dvi.ind_genero, dt.num_ano;";
//echo $sql;
$result = $conn->query($sql);
$titulo = '';
$corpo = '';
if( $result->num_rows > 0 ){
    $ult_ano = '';
    $ult_territorio  = '';
    $ult_localidade  = '';
    $ult_grupo_idade = '';
    $ult_genero      = '';
    $indicadores     = array();
    $variaveisColuna = array();
    $coluna1Mudou = false;
    $coluna2Mudou = false;
    $coluna3Mudou = false;
    $coluna4Mudou = false;
    while( $row = $result->fetch_assoc() ){
        if( $row['num_ano'] > $ult_ano ){
            $titulo  .= "<th>{$row['num_ano']}</th>";
            $rotulos .= $row['num_ano'] . ',';
            $ult_ano  = $row['num_ano'];
        }

        if( $ult_territorio  != $row['dsc_territorio'] or
            $ult_localidade  != $row['dsc_localidade'] or
            $ult_grupo_idade != $row['dsc_grupo_idade'] or
            $ult_genero      != $row['ind_genero'] ){
            array_push($variaveisColuna, array($row['dsc_territorio'], $row['dsc_localidade'], $row['dsc_grupo_idade'], $row['ind_genero']));
            if( $corpo != '' ){
                if(!$coluna1Mudou && $ult_territorio != $row['dsc_territorio'] )
                    $coluna1Mudou = true;
                if(!$coluna2Mudou && $ult_localidade != $row['dsc_localidade'] )
                    $coluna2Mudou = true;
                if(!$coluna3Mudou && $ult_grupo_idade != $row['dsc_grupo_idade'] )
                    $coluna3Mudou = true;
                if(!$coluna4Mudou && $ult_genero != $row['ind_genero'] )
                    $coluna4Mudou = true;

                $indicador['valores'] = substr($valores, 0, -1);
                $corpo  .= '<td class="ln">' . $indicador['valores'] . '</td></tr>';
                array_push($indicadores, $indicador);
                $valores = '';
            }
            $corpo .= '<tr>';
            $corpo .= "<td>{$row['dsc_territorio']}</td>";
            $corpo .= "<td>{$row['dsc_localidade']}</td>";
            $corpo .= "<td class=\"tp\">{$row['dsc_grupo_idade']}</td>";
            $corpo .= "<td>{$row['ind_genero']}</td>";
        }
        if( $row['vlr_indicador'] != 0 ){
            $corpo .= "<td>{$row['vlr_indicador']}</td>";
            $valores .= $row['vlr_indicador'] . ',';
        }
        else{
            $corpo .= "<td>-</td>";
            $valores .= 'null,';
        }
        $ult_territorio  = $row['dsc_territorio'];
        $ult_localidade  = $row['dsc_localidade'];
        $ult_grupo_idade = $row['dsc_grupo_idade'];
        $ult_genero      = $row['ind_genero'];
    }
    $array['tabela']  = "<table id=\"t_$id_ind\" class=\"dados\">";
    $array['tabela'] .= '<thead><tr><th>Território</th><th>Localidade</th><th>Grupo Idade</th><th>Gênero</th>';
    $array['tabela'] .= $titulo;
    $array['tabela'] .= '<th>Histograma</th></tr></thead>';
    $array['tabela'] .= '<tbody>';
    $array['tabela'] .= $corpo . '<td class="ln">' . substr($valores, 0, -1) . '</td>';
    $array['tabela'] .= '</tr></tbody></table>';
    $array['tabela'] .= '<script type="text/javascript">';
    $array['tabela'] .= "$('#t_$id_ind .ln').sparkline('html', {type:'bar'});";
    $array['tabela'] .= '</script>';
    $array['dados']['rotulos'] = substr($rotulos, 0, -1);
    $indicador['valores'] = substr($valores, 0, -1);
    array_push($indicadores, $indicador);
    foreach( $indicadores as $key => &$ind ){
        $ind['nome']  = '';
        $ind['nome'] .= ($coluna1Mudou) ? ('Território: ' . $variaveisColuna[$key]{0} . ' / ') : '';
        $ind['nome'] .= ($coluna2Mudou) ? ('Localidade: ' . $variaveisColuna[$key]{1} . ' / ') : '';
        $ind['nome'] .= ($coluna3Mudou) ? ('Idade: ' . $variaveisColuna[$key]{2} . ' / ') : '';
        $ind['nome'] .= ($coluna4Mudou) ? ('Gênero: ' . $variaveisColuna[$key]{3} . ' / ') : '';
        if( strlen($ind['nome']) == 0 ) {
            $ind['nome'] = 'Total';
        }
        else{
            $ind['nome'] = substr($ind['nome'], 0, -3);
        }
    }
    $array['dados']['indicadores'] = $indicadores;
}
else{
    $array['resultado'] = '<div>Sem dados</div>';
}
echo json_encode($array, JSON_UNESCAPED_UNICODE);
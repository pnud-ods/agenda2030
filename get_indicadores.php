<table style="width:100%;">
    <tbody>
<?php
include_once 'conectar.php';
$ods      = $_REQUEST['o'];
$id_meta  = $_REQUEST['i_m'];
$num_meta = $_REQUEST['n_m'];
?>

<tr style="border-top: 1px solid #cfcfcf;">
    <th style="padding:5px 10px;">
        <h3>Indicadores <span class="main_color_<?php echo $ods; ?>"><?php echo $num_meta; ?></span></h3>
    </th>
    <th style="min-width:100px;">
    </th>
</tr>

<?php
//Busca os indicadores de uma meta
$sql = "select di.seq_dim_indicador, di.nom_indicador
          from $NAME_DW.dim_indicador di
         where di.seq_dim_meta = $id_meta
         order by di.nom_indicador";
$result = $conn->query($sql);
if( $result->num_rows == 0 ){
    echo '<tr style="border-top: 1px solid #cfcfcf;">';
    echo "<td style=\"padding:20px 10px;\" class=\"metas-indicadores-text-color\">Não possui indicadores</td>";
    echo '</tr>' . "\n";
}
while( $row = $result->fetch_assoc() ){
    echo '<tr style="border-top: 1px solid #cfcfcf;">';
    echo "<td style=\"padding:20px 10px;\" class=\"metas-indicadores-text-color\">{$row['nom_indicador']}</td>";
    echo '<td class="text-center">';
    echo "<span class=\"main_background_color_$ods veja_mais\" onclick=\"clickIndicador({$row['seq_dim_indicador']}, $ods, $id_meta, '$num_meta');\">Veja mais</span>";
    echo '</td>';
    echo '</tr>' . "\n";
}
?>
    </tbody>
</table>
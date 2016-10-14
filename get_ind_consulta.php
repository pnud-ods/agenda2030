<?php
include_once 'conectar.php';
$id_meta = $_REQUEST['i_m'];
$array = array();
$sql = "select di.seq_dim_indicador, di.nom_indicador
          from $NAME_DW.dim_indicador di
         where di.seq_dim_meta = $id_meta
         order by di.nom_indicador;";
$result = $conn->query($sql);
if($result->num_rows == 0){
    echo '<tr>';
    echo "<td class=\"consulta-td-cell\">Não possui indicadores</td>";
    echo '<tr>';
    die;
}
while( $row = $result->fetch_assoc() ){
    echo '<tr>';
    echo "<td class=\"consulta-td-cell\"><a onclick=\"consultarIndicador({$row['seq_dim_indicador']});\">{$row['nom_indicador']}</a></td>";
    echo '<tr>';
}
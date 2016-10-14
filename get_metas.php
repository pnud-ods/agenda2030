<?php
include_once 'conectar.php';
$ods = $_REQUEST['o'];
$array = array();
$sql = "select dm.seq_dim_meta, dm.num_meta, dm.dsc_meta
          from $NAME_DW.dim_meta dm
         where dm.seq_dim_ods = $ods
         order by dm.num_meta;";
$result = $conn->query($sql);
while( $row = $result->fetch_assoc() ){
    echo '<tr>';
    echo "<td class=\"consulta-td-cell\"><a onclick=\"mudaMeta({$row['seq_dim_meta']});\">{$row['num_meta']}) {$row['dsc_meta']}</td>";
    echo '<tr>';
}

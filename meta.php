<?php
include_once 'partes.php';
include_once 'conectar.php';
$ods = $_REQUEST['ods'];
$num_ods = str_pad($ods, 2, '0', STR_PAD_LEFT);

//Busca os dados do ODS
$sql = "select do.nom_ods, do.dsc_ods, do.dsc_resumo_ods, do.dsc_odm_relacionado
          from $NAME_DW.dim_ods do
         where do.seq_dim_ods = $ods";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

getHeader();
?>
    <!-- info data container -->
    <div class="row">
        <div class="col-xs-12">
            <!-- metas container -->
            <div>
                <div class="row">
                    <div class="col-xs-12" style="padding:30px 60px 15px 60px;">
                        <table style="width:100%;">
                            <tr style="padding:10px;" >
                                <td style="">
                                    <img class="img-responsive" src="images/ods_icons/<?php echo $num_ods; ?>.png" alt="" width="145" height="145">
                                </td>
                                <td style="padding:20px 10px 0px 0px;vertical-align:top;">
                                    <p class="main_color_<?php echo $ods; ?> title-font" style="font-size:22pt;">Objetivo <?php echo $ods; ?>.</p>
                                    <p class="main_color_<?php echo $ods; ?> title-font" style="font-size:26pt;"><?php echo $row['nom_ods']; ?></p>
                                    <p style="color:#6c6c6c;font-size:18pt;font-weight:200;"><?php echo $row['dsc_ods']; ?></p>
                                </td>
                                <td style="max-width:220px;">
                                    <div >
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label>ODMs relacionados</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <?php
                                                    $odms = explode(',', $row['dsc_odm_relacionado']);
                                                    foreach($odms as $odm){
                                                        echo "<img class=\"odm\" src=\"images/odm_icons/odm_$odm.png\" style=\"width:50px;\">";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12" style="padding:0px 70px 20px 60px;">
                        <p style="color:#6c6c6c;font-size:12pt;font-weight:200;"><?php echo $row['dsc_resumo_ods']; ?></p>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 90px;">
                    <div class="col-xs-12">
                        <table style="border: 1px solid #cfcfcf;">
                            <tr style="background-color:#f5f5f5;">
                                <td style="padding-left:40px;">
                                    <h2 class="main_color_<?php echo $ods; ?>">Metas do Objetivo <?php echo $ods; ?></h2>
                                </td>
                                <td></td>
                            </tr>
                            <?php
                                $sql = "select dm.num_meta, dm.dsc_meta
                                          from $NAME_DW.dim_meta dm
                                         where dm.seq_dim_ods = $ods";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                                    echo '<tr style="border:1px solid #cfcfcf;">';
                                    echo '<td style="padding:20px 20px 20px 40px;">';
                                    echo "<span class=\"main_color_$ods\">{$row['num_meta']}</span> {$row['dsc_meta']}";
                                    echo '</td>';
                                    echo '<td style="padding:20px;">';
                                    echo "<span class=\"glyphicon glyphicon-chevron-right main_color_$ods\"></span>";
                                    echo '</td>';
                                    echo '</tr>' . "\n";
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
getFooter();
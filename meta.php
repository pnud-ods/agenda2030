<?php
$NOME_PAGINA = 'Objetivo';
include_once 'partes.php';
include_once 'conectar.php';
$ods = $_REQUEST['ods'];
$num_ods = str_pad($ods, 2, '0', STR_PAD_LEFT);

//Busca os dados do ODS
$sql = "select do.nom_ods, do.dsc_ods, do.dsc_resumo_ods, do.dsc_odm_relacionado
          from $NAME_DW.dim_ods do
         where do.seq_dim_ods = '$ods'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

//caso o parametro do número do objetivo seja invalido, finaliza a página
if( !isset($row) ){
    getHeader();
    echo '<div class="vazio" style="margin:30px;">Não foi localizado o ODS desejado.</div>';
    getFooter();
    die;
}

$NOME_PAGINA .= " $num_ods";
getHeader();
?>
<link href="css/tabela_dados.css" rel="stylesheet" type="text/css">
<link href="js/c3-0.4.11/c3.css" rel="stylesheet" type="text/css">
<script src="js/d3.v3.min.js" charset="utf-8"></script>
<script src="js/c3-0.4.11/c3.min.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="js/grafico.js"></script>
<script type="text/javascript">
    function clickMeta(obj, o, i_m, n_m) {
        if( obj !== undefined ){
            $('.ativo').removeClass('ativo');
            $(obj).addClass('ativo');
        }
        $.ajax({
            url: 'get_indicadores.php?o=' + o + '&i_m=' + i_m + '&n_m=' + n_m
        }).done(function(retorno){
            $('#cx_metas').css('width', '40%');
            var pos = $('.metas').offset().top;
            $('html, body').stop().animate({scrollTop:pos}, '1000', 'swing');
            var indicadores = $('#indicadores');
            indicadores.css('width', '60%');
            indicadores.html(retorno);
        });
    }

    function clickIndicador(i_i, o, i_m, n_m){
        $.ajax({
            url: 'get_valores.php?i_i=' + i_i + '&o=' + o + '&i_m=' + i_m + '&n_m=' + n_m,
            dataType: 'json'
        }).done(function(retorno){
            $('#indicadores').html(retorno.estrutura);
            $('#tabela').html(retorno.tabela);
            showGrafico(retorno.dados);
        });
    }
</script>
    <!-- info data container -->
    <div class="row">
        <div class="col-xs-12">
            <!-- metas container -->
            <div>
                <div class="row">
                    <div class="col-xs-12" style="padding:30px 60px 15px 60px;">
                        <table style="width:100%;">
                            <tr class="cabecalho_ods">
                                <td class="logo">
                                    <img src="images/ods_icons/<?php echo $num_ods; ?>.png" alt="" width="145" height="145">
                                </td>
                                <td class="titulo">
                                    <p class="main_color_<?php echo $ods; ?> title-font nom_ods">Objetivo <?php echo $ods; ?>.</p>
                                    <p class="main_color_<?php echo $ods; ?> title-font" style="font-size:26pt;"><?php echo $row['nom_ods']; ?></p>
                                    <p class="dsc_ods"><?php echo $row['dsc_ods']; ?></p>
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
                        <table class="metas">
                            <tr style="background-color:#f5f5f5;">
                                <td style="padding-left:40px;" colspan="2">
                                    <h2 class="main_color_<?php echo $ods; ?>">Metas do Objetivo <?php echo $ods; ?></h2>
                                </td>
                            </tr>
                            <td id="cx_metas">
                                <table style="width:100%;">
                                    <tbody>
                                    <?php
                                        $sql = "select dm.seq_dim_meta, dm.num_meta, dm.dsc_meta
                                                  from $NAME_DW.dim_meta dm
                                                 where dm.seq_dim_ods = $ods
                                                 order by substring_index(dm.num_meta, '.', -1) REGEXP '[0-9]+' desc,
                                                          lpad(substring_index(dm.num_meta, '.', -1), 2, 0) asc";
                                        $result = $conn->query($sql);
                                        while($row = $result->fetch_assoc()){
                                            echo "<tr class=\"meta\" title=\"Exibir indicadores da meta\" onclick=\"clickMeta(this, $ods, {$row['seq_dim_meta']}, '{$row['num_meta']}');\">";
                                            echo '<td class="dsc_meta">';
                                            echo "<span class=\"main_color_$ods\">{$row['num_meta']}</span> {$row['dsc_meta']}";
                                            echo '</td>';
                                            echo '<td style="padding:20px;">';
                                            echo "<span class=\"glyphicon glyphicon-chevron-right main_color_$ods\"></span>";
                                            echo '</td>';
                                            echo '</tr>' . "\n";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </td>

                            <td id="indicadores" style="width:0%;vertical-align: top;">
                            </td>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
getFooter();
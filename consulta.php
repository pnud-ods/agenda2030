<?php
include_once 'partes.php';
include_once 'conectar.php';
getHeader();
?>
<link href="css/tabela_dados.css" rel="stylesheet" type="text/css">
<link href="js/c3-0.4.11/c3.css" rel="stylesheet" type="text/css">
<script src="js/d3.v3.min.js" charset="utf-8"></script>
<script src="js/c3-0.4.11/c3.min.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="js/grafico.js"></script>
<script type="text/javascript">
    function marcaTerritorio(obj, i){
        $('#territorio').find('.glyphicon').each(function(){
            $(this).css('display', 'none');
        });
        $(obj).find('.glyphicon').css('display', 'inline-block');

    }

    function mudaODS(o){
        $('#metas').empty();
        $('#indicadores').empty();
        $.ajax({
            url: 'get_metas.php?o=' + o
        }).done(function(retorno){
            $('#metas').append(retorno);
        });
    }

    function mudaMeta(i_m){
        $('#indicadores').empty();
        $.ajax({
            url: 'get_ind_consulta.php?i_m=' + i_m
        }).done(function(retorno){
            $('#indicadores').append(retorno);
        });
    }

    function consultarIndicador(i_i){
        $('button.close').click();
        $.ajax({
            url: 'get_valores.php?s=1&i_i=' + i_i,
            dataType: 'json'
        }).done(function(retorno){
            $('#valores').html(retorno.estrutura);
            $('#tabela').html(retorno.tabela);
            showGrafico(retorno.dados);
        });
    }
</script>
<!-- info data container -->
<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
        <!-- consulta container -->
        <div style="padding:30px 0 400px 0;">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="#">Consulta</a></li>
                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                Downloads <span class="caret"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row" style="padding-top:30px;">
                <div class="col-xs-12">
                    <ul class="nav nav-pills" role="tablist">
                        <li role="presentation" class="dropdown"> <a href="#" class="dropdown-toggle" id="drop5" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                Escolha um Território <span class="caret"></span> </a>
                            <ul class="dropdown-menu" id="menu2" aria-labelledby="drop5" id="territorio">
                                <?php
                                $sql = "select dt.seq_dim_territorio, dt.nom_territorio_ptbr
                                          from $NAME_DW.dim_territorio dt
                                         order by dt.seq_dim_territorio;";
                                $result = $conn->query($sql);
                                while( $row = $result->fetch_assoc() ){
                                    echo '<li>';
                                    echo "<a onclick=\"marcaTerritorio(this, '{$row['seq_dim_territorio']}');\"><span class=\"glyphicon glyphicon-chevron-down main_color_13\" style=\"display:none;padding-right:5px;\"></span>{$row['nom_territorio_ptbr']}</a>";
                                    echo '</li>' . "\n";
                                }
                                ?>
                            </ul>
                        </li>

                        <li role="presentation"> <a role="button" aria-haspopup="true" aria-expanded="true" >
                                <span data-toggle="modal" data-target=".bs-example-modal-lg">Escolha um Indicador <span class="caret"></span> </span>
                            </a>
                        </li>
                        <li role="presentation" class="dropdown"> <a href="#" class="dropdown-toggle" id="drop5" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                Escolha um Período <span class="caret"></span> </a>
                            <ul class="dropdown-menu" id="menu2" aria-labelledby="drop5">
                                <li><a href="#">2014-2015</a></li>
                                <li><a href="#">2013-2014</a></li>
                                <li><a href="#">2012-2013</a></li>
                                <li><a href="#">2011-2012</a></li>
                                <li><a href="#">2010-2011</a></li>
                                <li><a href="#">2009-2010</a></li>
                                <li><a href="#">2008-2009</a></li>
                                <li><a href="#">2007-2008</a></li>
                                <li><a href="#">2006-2007</a></li>
                                <li><a href="#">2005-2006</a></li>
                                <li><a href="#">2004-2005</a></li>
                                <li><a href="#">2003-2004</a></li>
                                <li><a href="#">2002-2003</a></li>
                                <li><a href="#">2001-2002</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- modal container -->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="border:0px;margin-bottom:-25px;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        </div>
                        <div class="modal-body" style="padding-bottom:40px;">
                            <table style="width:100%;">
                                <tr style="border-bottom: 1px solid #ededed;">
                                    <th style="padding-bottom:10px;">
                                        Objetivos
                                    </th>
                                    <th>
                                        Metas
                                    </th>
                                    <th>
                                        Indicadores
                                    </th>
                                </tr>
                                <tr style="vertical-align: top;">
                                    <td style="width:33%;">
                                        <table class="consulta-table-grid" style="padding-top:10px;">
                                            <?php
                                            $sql = "select do.seq_dim_ods, do.nom_ods
                                                      from $NAME_DW.dim_ods do
                                                     order by do.seq_dim_ods;";
                                            $result = $conn->query($sql);
                                            while( $row = $result->fetch_assoc() ){
                                                echo '<tr>';
                                                echo "<td class=\"consulta-td-cell\"><a onclick=\"mudaODS({$row['seq_dim_ods']});\">{$row['seq_dim_ods']}. {$row['nom_ods']}</a></td>";
                                                echo '</tr>';
                                            }
                                            ?>
                                        </table>
                                    </td>
                                    <td style="width:33%;">
                                        <table class="consulta-table-grid" style="padding-top:10px;" id="metas">
                                        </table>
                                    </td>
                                    <td style="width:33%;">
                                        <table class="consulta-table-grid" style="padding-top:10px;" id="indicadores">
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./modal container -->
            <div id="valores" style="margin-top:30px;"></div>
        </div>
        <!-- ./consulta container -->
    </div>
</div>
<?php
getFooter();
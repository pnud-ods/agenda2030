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
    var carregando = false;
    function marcaFiltro(){
        if( indicador_exibido !== undefined ){
            consultarIndicador(indicador_exibido);
        }
    }

    function mudaODS(o){
        if( carregando ) return;
        carregando = true;
        var cx_metas = $('#metas');
        cx_metas.empty();
        cx_metas.addClass('carregando');
        $('#indicadores').empty();
        $.ajax({
            url: 'get_metas.php?o=' + o
        }).done(function(retorno){
            cx_metas.removeClass('carregando');
            cx_metas.append(retorno);
            carregando = false;
        });
    }

    function mudaMeta(i_m){
        if( carregando ) return;
        carregando = true;
        var cx_indicadores = $('#indicadores');
        cx_indicadores.empty();
        cx_indicadores.addClass('carregando');
        $.ajax({
            url: 'get_ind_consulta.php?i_m=' + i_m
        }).done(function(retorno){
            cx_indicadores.removeClass('carregando');
            cx_indicadores.append(retorno);
            carregando = false;
        });
    }

    var indicador_exibido;
    function consultarIndicador(i_i){
        if( carregando ) return;
        carregando = true;
        var cx_valores = $('#valores');
        cx_valores.addClass('carregando');
        cx_valores.empty();
        $('button.close').click();
        var territorios = '';
        $('#territorios input:checked').each(function(){
            territorios += ',' + $(this).attr('seq_t');
        });
        if( territorios.length == 0 ){
            alert('Pelo menos um território deve estar selecionado.');
            return;
        }
        territorios = territorios.substring(1);
        var anos = $("input[name='ano']:checked").val();
        $.ajax({
            url: 'get_valores.php?s=1&i_i=' + i_i + '&t=' + territorios + '&a=' + anos,
            dataType: 'json'
        }).done(function(retorno){
            indicador_exibido = i_i;
            cx_valores.removeClass('carregando');
            cx_valores.html(retorno.estrutura);
            if( retorno.tabela != undefined ){
                $('#tabela').html(retorno.tabela);
                showGrafico(retorno.dados);
            }
            else{
                $('#tabela').html(retorno.resultado);
            }
            carregando = false;
        });
    }
</script>
<style>
    .territorio, .ano{
        margin:5px 15px;
        display:block;
        position:relative;
    }
    .territorio label,
    .ano label{
        font-weight:400;
        cursor:pointer;
        margin-bottom:0;
        min-height:20px;
        padding-left:20px;
        display:inline-block;
        max-width:100%;
    }
    .territorio input,
    .ano input{
        margin-left:-20px;
        position:absolute;
    }
</style>
<!-- info data container -->
<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
        <!-- consulta container -->
        <div style="min-height:400px;margin:30px 0;">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="#">Consulta</a></li>
                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Downloads <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a title="Download dos Dados do Brasil" href="/downloads/Indicadores_Brasil.csv">Dados do Brasil</a></li>
                                <li><a title="Download dos Dados da América Latina" href="/downloads/Indicatodes_AmericaLatina.csv">Dados da América Latina</a></li>
                                <li><a title="Download dos Dados do Mundo" href="/downloads/Indicadores_Mundo.csv">Dados do Mundo</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row" style="padding-top:30px;">
                <div class="col-xs-12">
                    <ul class="nav nav-pills" role="tablist">
                        <li role="presentation" class="dropdown"> <a href="#" class="dropdown-toggle" id="drop5" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                Escolha um Território <span class="caret"></span> </a>
                            <ul class="dropdown-menu" id="menu2" aria-labelledby="drop5">
                                <?php
                                $sql = "select dt.seq_dim_territorio, dt.nom_territorio_ptbr
                                          from $NAME_DW.dim_territorio dt
                                         order by dt.seq_dim_territorio desc;";
                                $result = $conn->query($sql);
                                echo '<li id="territorios">';
                                while( $row = $result->fetch_assoc() ){
                                    echo "<div class=\"territorio\"><label><input type=\"checkbox\" checked=\"checked\" onclick=\"marcaFiltro();\" seq_t=\"{$row['seq_dim_territorio']}\"/> {$row['nom_territorio_ptbr']}</label></div>";
                                }
                                echo '</li>' . "\n";
                                ?>
                            </ul>
                        </li>
                        <li role="presentation"> <a role="button" aria-haspopup="true" aria-expanded="true" >
                                <span data-toggle="modal" data-target=".bs-example-modal-lg">Escolha um Indicador <span class="caret"></span> </span>
                            </a>
                        </li>

                        <li role="presentation" class="dropdown"> <a href="#" class="dropdown-toggle" id="drop5" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                Escolha um Período <span class="caret"></span></a>
                            <ul class="dropdown-menu" id="menu2" aria-labelledby="drop5">
                                <?php
                                echo '<li id="ano">';
                                echo "<div class=\"ano\"><label><input type=\"radio\" name=\"ano\" checked=\"checked\" onclick=\"marcaFiltro();\" value=\"0\"/> Todos os Anos</label></div>";
                                $passo = 5;
                                $ano_inicia = 2020;
                                for( $i = $ano_inicia; $i > 2000; $i = $i - $passo ){
                                    $i_f = ($i > date('Y')) ? date('Y') : $i - 1;
                                    $i_i = $i - $passo;
                                    echo "<div class=\"ano\"><label><input type=\"radio\" name=\"ano\" onclick=\"marcaFiltro();\" value=\"$i_i,$i_f\"/> $i_i - $i_f</label></div>";
                                }
                                echo '</li>' . "\n";
                                ?>
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
                                    <th style="padding-bottom:10px;">Objetivos</th>
                                    <th>Metas</th>
                                    <th>Indicadores</th>
                                </tr>
                                <tr style="vertical-align:top;">
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
            <div id="valores" style="margin-top:10px;"></div>
        </div>
        <!-- ./consulta container -->
    </div>
</div>
<?php
getFooter();